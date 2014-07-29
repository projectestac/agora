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
		foreach ($_POST as $key => $value) {
			$parameters->set($key, $this->getParam($key));
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
		header($name . ': ' . $value);
	}
}
?>