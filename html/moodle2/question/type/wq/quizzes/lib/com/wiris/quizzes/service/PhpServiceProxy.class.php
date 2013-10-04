<?php

class com_wiris_quizzes_service_PhpServiceProxy {
	
	//Hash<String> 'name' => 'url'
	private $router;
	
	public static function dispatch() {
		$proxy = new com_wiris_quizzes_service_PhpServiceProxy();
		$proxy->init();
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$proxy->doGet();
		}else if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$proxy->doPost();
		}
	}
	
	private function init() {
		$this->router = com_wiris_quizzes_service_ServiceRouter::getRouter();	
	}
	
	private function doPost() {
		//Get parameters
		$service = $this->getParam('service');
		if ($service == null) {
			$this->sendError(400, 'Missing "service" parameter.');
		}
		if ($service == 'resource' || $service == 'cache') {
			$name = $this->getParam('name');
			if(empty($name)) {
				$this->sendError(400, 'Missing "name" parameter.');
			}
			if(strpos($name, '/')!== FALSE || strpos($name, '\\')!=FALSE) {
				$this->sendError(400, 'Invalid "name" parameter.');
			}
			header('Content-Type: ' . com_wiris_quizzes_service_ServiceTools::getContentType($name));
			header('Cache-Control: max-age=1800');
			if ($service == 'resource'){
				$storage = com_wiris_system_Storage::newResourceStorage($name);
			} else {
				$cachepath = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR);
				$storage = com_wiris_system_Storage::newStorage($cachepath . '/' . $name);
			}
			if( $name == 'quizzes.js') {
				$this->sendQuizzesJS($storage);
			}else{
				$this->sendFile($storage);
			}
		} else {
			$this->route($service);
		}
	}
	private function doGet() {
		$_POST = $_GET;
		$this->doPost();
	}
	
	private function route($service) {
		if ($service == 'url') {
			$url = $this->getParam('url');
			if(!com_wiris_quizzes_service_ServiceRouter::allowedURL($url)){
				$this->sendError(400, 'URL not allowed.');
			}
			$post = false;
		}else if (!$this->router->exists($service)){
			$this->sendError(400, 'Service "'+$service+'" not found.');
		} else {
			$url = $this->router->get($service);
			$post = true;
			$rawpostdata = $this->getParam('rawpostdata');
			//Build query
			if($rawpostdata!=null && strtolower($rawpostdata) == 'true') {
				$postdata = $this->getParam('postdata');
				$mime = 'text/plain';
			}
			else{
				$mime = 'application/x-www-form-urlencoded';
				$uri = '';
				foreach(array_keys($_POST) as $key) {
					if($key != 'service' && $key != 'rawpostdata'){
						if(strlen($uri)>0) $uri .= '&';
						$uri .= urlencode($key);
						$uri .= '=';
						$uri .= urlencode($this->getParam($key));
					}
				}
				$postdata = $uri;
			}
		}
		
		//Call service
		$referer = ((!empty($_SERVER['HTTPS']))?'https://':'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
		if(isset($_SERVER['QUERY_STRING'])) {
			$referer .= '?' . $_SERVER['QUERY_STRING'];
		}
		$context = stream_context_create();
		stream_context_set_option($context, 'http', 'method', $post ? 'POST' : 'GET');
		if ($post) {
			stream_context_set_option($context, 'http', 'header', 'Connection: close'."\r\n".
																  'Content-Type: '.$mime.'; charset=UTF-8'."\r\n".
																  'Referer: ' . $referer ."\r\n");
			stream_context_set_option($context, 'http', 'content', $postdata);
		}
		stream_context_set_option($context, 'http', 'timeout', 20);
		
		$response = @file_get_contents($url, false, $context);
		if($response === false) {
			$this->sendError(500, 'Error connectiong with service.');
		}
		echo $response;
	}
	
	private function sendFile($storage) {
		$response = $storage->readBinary();
		header("Content-Length: ".strlen($response));
		echo $response;
	}
	
	private function sendQuizzesJS($storage) {
		$js = $storage->read();
		echo '(function(){'."\n";
		echo $js;
		echo "\n";
		echo com_wiris_quizzes_service_ServiceTools::appendQuizzesJS();
		echo '})();';
	}
	
	private function sendError($code, $string){
		header($_SERVER["SERVER_PROTOCOL"] . ' '.$code.' '.$string);
		header('Status: '.$code.' '.$string);
		die();
	}
	
	private function getParam($name) {
		//Be comaptible with both magic_quotes on and off.
		if(!isset($_POST[$name])) return null;
		return get_magic_quotes_gpc() ? stripslashes($_POST[$name]) : $_POST[$name];
	}
}
?>