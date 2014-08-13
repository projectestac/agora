<?php

class com_wiris_quizzes_api_ConfigurationKeys {
	public function __construct(){}
	static $WIRIS_URL = "quizzes.wiris.url";
	static $EDITOR_URL = "quizzes.editor.url";
	static $SERVICE_URL = "quizzes.service.url";
	static $PROXY_URL = "quizzes.proxy.url";
	static $CACHE_DIR = "quizzes.cache.dir";
	static $MAXCONNECTIONS = "quizzes.maxconnections";
	static $HTTPPROXY_HOST = "quizzes.httpproxy.host";
	static $HTTPPROXY_PORT = "quizzes.httpproxy.port";
	static $HTTPPROXY_USER = "quizzes.httpproxy.user";
	static $HTTPPROXY_PASS = "quizzes.httpproxy.pass";
	static $CONFIGURATION_FILE = "quizzes.configuration.file";
	static $REFERER_URL = "quizzes.referer.url";
	function __toString() { return 'com.wiris.quizzes.api.ConfigurationKeys'; }
}
