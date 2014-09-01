<?php

class com_wiris_quizzes_service_ServiceRouter {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		if(com_wiris_quizzes_service_ServiceRouter::$router === null) {
			com_wiris_quizzes_service_ServiceRouter::$router = $this->getRouter();
		}
		if(com_wiris_quizzes_service_ServiceRouter::$serviceMimes === null) {
			com_wiris_quizzes_service_ServiceRouter::$serviceMimes = $this->getMimes();
		}
	}}
	public function sendFile($s, $res) {
		try {
			$data = haxe_io_Bytes::ofData($s->readBinary());
			$res->setHeader("Content-Length", "" . _hx_string_rec($data->length, ""));
			$res->writeBinary($data);
			$res->close();
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$t = $_ex_;
			{
				$res->sendError(500, "Unable to read file.");
			}
		}
	}
	public function sendQuizzesJS($s, $res) {
		$js = $s->read();
		$res->writeString("(function(){\x0A");
		$res->writeString($js);
		$res->writeString("\x0A");
		$res->writeString(com_wiris_quizzes_service_ServiceTools::appendQuizzesJS());
		$res->writeString("})();");
		$res->close();
	}
	public function service($parameters, $res) {
		if(!$parameters->exists("service")) {
			$res->sendError(400, "Missing \"service\" parameter.");
			return;
		}
		$service = $parameters->get("service");
		if($service === "resource" || $service === "cache") {
			if(!$parameters->exists("name")) {
				$res->sendError(400, "Missing \"name\" parameter.");
			}
			$name = $parameters->get("name");
			$res->setHeader("Content-Type", com_wiris_quizzes_service_ServiceTools::getContentType($name));
			$res->setHeader("Cache-Control", "max-age=1800");
			$s = null;
			if($service === "resource") {
				$s = com_wiris_system_Storage::newResourceStorage($name);
			} else {
				$s = com_wiris_system_Storage::newStorage(com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR) . "/" . $name);
			}
			if($name === "quizzes.js") {
				$this->sendQuizzesJS($s, $res);
			} else {
				$this->sendFile($s, $res);
			}
		} else {
			if($service === "echo") {
				if(!$parameters->exists("data")) {
					$res->sendError(400, "Missing \"data\" parameter.");
					return;
				}
				$data = $parameters->get("data");
				if($parameters->exists("filename")) {
					$filename = $parameters->get("filename");
					$res->setHeader("Content-Type", com_wiris_quizzes_service_ServiceTools::getContentType($filename));
					$res->setHeader("Content-Disposition", "attachment; filename=\"" . $filename . "\"");
				} else {
					$res->setHeader("Content-Type", "text/plain");
				}
				$res->writeString($data);
				$res->close();
			} else {
				$url = null;
				$post = null;
				$postdata = null;
				$mime = null;
				$http = null;
				if($service === "url") {
					$url = $parameters->get("url");
					if(!$this->allowedURL($url)) {
						$res->sendError(400, "URL not allowed.");
					}
					$http = new com_wiris_quizzes_impl_MaxConnectionsHttpImpl($url, new com_wiris_quizzes_service_ServiceRouterListener($res));
					$res->setHeader("Content-Type", $this->getUrlMime($url));
					$post = false;
				} else {
					if(!com_wiris_quizzes_service_ServiceRouter::$router->exists($service)) {
						$res->sendError(400, "Service \"" . $service . "\" not found.");
						return;
					} else {
						$url = com_wiris_quizzes_service_ServiceRouter::$router->get($service);
						$post = true;
						$rawpostdata = $parameters->exists("rawpostdata") && $parameters->get("rawpostdata") === "true";
						$http = new com_wiris_quizzes_impl_MaxConnectionsHttpImpl($url, new com_wiris_quizzes_service_ServiceRouterListener($res));
						$res->setHeader("Content-Type", com_wiris_quizzes_service_ServiceRouter::$serviceMimes->get($service));
						if($rawpostdata) {
							$postdata = $parameters->get("postdata");
							$http->setPostData($postdata);
							$mime = "text/plain";
						} else {
							$mime = "application/x-www-form-urlencoded";
							$keys = $parameters->keys();
							while($keys->hasNext()) {
								$key = $keys->next();
								if(!($key === "service") && !($key === "rawpostdata")) {
									$http->setParameter($key, $parameters->get($key));
								}
								unset($key);
							}
						}
					}
				}
				$http->setHeader("Referer", com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$REFERER_URL));
				$http->setHeader("Accept-Charset", "utf-8");
				if($post) {
					$http->setHeader("Content-Type", $mime . ";charset=utf-8");
				}
				$http->request($post);
			}
		}
	}
	public function getUrlMime($url) {
		$it = com_wiris_quizzes_service_ServiceRouter::$router->keys();
		while($it->hasNext()) {
			$service = $it->next();
			if(StringTools::startsWith($url, com_wiris_quizzes_service_ServiceRouter::$router->get($service))) {
				return com_wiris_quizzes_service_ServiceRouter::$serviceMimes->get($service);
			}
			unset($service);
		}
		return null;
	}
	public function allowedURL($url) {
		$it = com_wiris_quizzes_service_ServiceRouter::$router->keys();
		while($it->hasNext()) {
			if(StringTools::startsWith($url, com_wiris_quizzes_service_ServiceRouter::$router->get($it->next()))) {
				return true;
			}
		}
		return false;
	}
	public function getMimes() {
		$mimes = new Hash();
		$mimes->set("render", "image/png");
		$mimes->set("quizzes", "application/xml");
		$mimes->set("grammar", "text/plain");
		return $mimes;
	}
	public function getRouter() {
		$cfg = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration();
		$router = new Hash();
		$router->set("render", $cfg->get(com_wiris_quizzes_api_ConfigurationKeys::$EDITOR_URL) . "/render");
		$router->set("quizzes", $cfg->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL) . "/rest");
		$router->set("grammar", $cfg->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL) . "/grammar");
		return $router;
	}
	static $router;
	static $serviceMimes;
	static $MAX_UPLOAD_SIZE = 1048576;
	function __toString() { return 'com.wiris.quizzes.service.ServiceRouter'; }
}
