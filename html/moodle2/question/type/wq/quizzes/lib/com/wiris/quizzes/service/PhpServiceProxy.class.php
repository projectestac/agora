<?php

class com_wiris_quizzes_service_PhpServiceProxy {
	
	public static function dispatch() {
		$proxy = new com_wiris_quizzes_service_PhpServiceProxy();
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$proxy->doGet();
		}else if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$proxy->doPost();
		}
	}
	
	private function getReferer() {
		$referer = ((!empty($_SERVER['HTTPS']))?'https://':'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
		if(isset($_SERVER['QUERY_STRING'])) {
			$referer .= '?' . $_SERVER['QUERY_STRING'];
		}
		return $referer;
	}
	
	private function doPost() {
		$conf = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration();
		$conf->set(com_wiris_quizzes_api_ConfigurationKeys::$REFERER_URL, $this->getReferer());
		
		$res = new com_wiris_quizzes_service_PhpHttpResponse();
		
		$parameters = new Hash();
		// Standard post parameters.
		foreach ($_POST as $key => $value) {
			$parameters->set($key, $this->getParam($key));
		}
		// Uploaded files.
		foreach ($_FILES as $key => $file) {
			if ($file['size'] > 0) {
				if ($file['size'] > com_wiris_quizzes_service_ServiceRouter::$MAX_UPLOAD_SIZE) {
					$res->sendError(400, "File too big.");
				}
				$content = '';
				$fh = fopen($file['tmp_name'], 'rb');
				if ($fh !== false) {
					while (!feof($fh)) {
						$content .= fread($fh, 4096);
					}
					fclose($fh);
				}
				$parameters->set($key, $content);
			}
		}
		
		$service = new com_wiris_quizzes_service_ServiceRouter();
		$service->service($parameters, $res);
	}
		
	private function doGet() {
		$_POST = $_GET;
		$this->doPost();
	}
	
	private function getParam($name) {
		//Be comaptible with both magic_quotes on and off.
		if(!isset($_POST[$name])) return null;
		return get_magic_quotes_gpc() ? stripslashes($_POST[$name]) : $_POST[$name];
	}
}

class com_wiris_quizzes_service_PhpHttpResponse implements com_wiris_quizzes_service_HttpResponse {
	private $headers = array();
	
	function close() {
		//Nothing!
	}
	function writeString($s) {
		echo $s;
	}
	function writeBinary($data) {
		$this->writeString($data->toString());
	}
	function sendError($num, $message) {
		header($_SERVER["SERVER_PROTOCOL"] . ' ' . $num . ' ' . $message);
		header('Status: ' . $num . ' ' . $message);
		die();
	}
	function setHeader($name, $value) {
		$headers[$name] = $value;
		header($name . ': ' . $value);
	}
	function getHeader($name) {
		isset($headers[$name]) ? $headers[$name] : null;
	}
}
?>