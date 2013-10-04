<?php

class com_wiris_quizzes_service_ServiceRouter {
	public function __construct() { 
	}
	static function getRouter() {
		$cfg = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration();
		$router = new Hash();
		$router->set("render", $cfg->get(com_wiris_quizzes_api_ConfigurationKeys::$EDITOR_URL) . "/render");
		$router->set("quizzes", $cfg->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL) . "/rest");
		$router->set("grammar", $cfg->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL) . "/grammar");
		return $router;
	}
	static function allowedURL($url) {
		$router = com_wiris_quizzes_service_ServiceRouter::getRouter();
		$it = $router->keys();
		while($it->hasNext()) {
			if(StringTools::startsWith($url, $router->get($it->next()))) {
				return true;
			}
		}
		return false;
	}
	function __toString() { return 'com.wiris.quizzes.service.ServiceRouter'; }
}
