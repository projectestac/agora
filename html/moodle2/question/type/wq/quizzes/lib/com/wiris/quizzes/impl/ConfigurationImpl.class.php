<?php

class com_wiris_quizzes_impl_ConfigurationImpl implements com_wiris_quizzes_api_Configuration{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->properties = new Hash();
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$WIRIS_URL, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_WIRIS_URL);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$EDITOR_URL, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_EDITOR_URL);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_SERVICE_URL);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_PROXY_URL);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_CACHE_DIR);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$MAXCONNECTIONS, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_MAXCONNECTIONS);
		$this->properties->set(com_wiris_quizzes_impl_ConfigurationImpl::$CONFIG_FILE, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_CONFIG_FILE);
		$this->properties->set(com_wiris_quizzes_impl_ConfigurationImpl::$CONFIG_CLASS, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_CONFIG_CLASS);
		$this->properties->set(com_wiris_quizzes_impl_ConfigurationImpl::$CONFIG_CLASSPATH, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_CONFIG_CLASSPATH);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$HTTPPROXY_HOST, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_HTTPPROXY_HOST);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$HTTPPROXY_PORT, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_HTTPPROXY_PORT);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$HTTPPROXY_USER, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_HTTPPROXY_USER);
		$this->properties->set(com_wiris_quizzes_api_ConfigurationKeys::$HTTPPROXY_PASS, com_wiris_quizzes_impl_ConfigurationImpl::$DEF_HTTPPROXY_PASS);
		if(!com_wiris_settings_PlatformSettings::$IS_JAVASCRIPT) {
			try {
				$ini = com_wiris_util_sys_IniFile::newIniFileFromFilename(com_wiris_quizzes_impl_ConfigurationImpl::$DEF_DIST_CONFIG_FILE);
				$this->setAll($ini->getProperties());
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
					throw new HException("Could not read the configuration file \"" . com_wiris_quizzes_impl_ConfigurationImpl::$DEF_DIST_CONFIG_FILE . "\".");
				}
			}
			$classpath = $this->get(com_wiris_quizzes_impl_ConfigurationImpl::$CONFIG_CLASSPATH);
			if(!($classpath === "")) {
				com_wiris_quizzes_impl_ClasspathLoader::load($classpath);
			}
			$className = $this->get(com_wiris_quizzes_impl_ConfigurationImpl::$CONFIG_CLASS);
			if(!($className === "")) {
				try {
					$config = Type::createInstance(Type::resolveClass($className), new _hx_array(array()));
					$keys = new _hx_array(array(com_wiris_quizzes_api_ConfigurationKeys::$WIRIS_URL, com_wiris_quizzes_api_ConfigurationKeys::$EDITOR_URL, com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL, com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL, com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR, com_wiris_quizzes_api_ConfigurationKeys::$MAXCONNECTIONS));
					$i = null;
					{
						$_g1 = 0; $_g = $keys->length;
						while($_g1 < $_g) {
							$i1 = $_g1++;
							$value = $config->get($keys[$i1]);
							if($value !== null) {
								$this->properties->set($keys[$i1], $value);
							}
							unset($value,$i1);
						}
					}
				}catch(Exception $»e) {
					$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
					$e2 = $_ex_;
					{
						throw new HException("Could not find the Configuration class \"" . $className . "\".");
					}
				}
			}
			$file = $this->properties->get(com_wiris_quizzes_impl_ConfigurationImpl::$CONFIG_FILE);
			if(com_wiris_system_Storage::newStorage($file)->exists() || com_wiris_system_Storage::newResourceStorage($file)->exists()) {
				try {
					$ini = com_wiris_util_sys_IniFile::newIniFileFromFilename($file);
					$this->setAll($ini->getProperties());
				}catch(Exception $»e) {
					$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
					$e2 = $_ex_;
					{
						throw new HException("Could not read configuration file \"" . $file . "\".");
					}
				}
			}
		}
	}}
	public function jsEscape($text) {
		$text = str_replace("\\", "\\\\", $text);
		$text = str_replace("\"", "\\\"", $text);
		$text = str_replace("\x0A", "\\n", $text);
		$text = str_replace("\x0D", "\\r", $text);
		$text = str_replace("\x09", "\\t", $text);
		return $text;
	}
	public function getJSConfig() {
		$sb = new StringBuf();
		$prefix = "com.wiris.quizzes.impl.ConfigurationImpl.";
		$sb->add($prefix . "DEF_WIRIS_URL" . " = \"" . $this->jsEscape($this->get(com_wiris_quizzes_api_ConfigurationKeys::$WIRIS_URL)) . "\";\x0A");
		$sb->add($prefix . "DEF_EDITOR_URL" . " = \"" . $this->jsEscape($this->get(com_wiris_quizzes_api_ConfigurationKeys::$EDITOR_URL)) . "\";\x0A");
		$sb->add($prefix . "DEF_SERVICE_URL" . " = \"" . $this->jsEscape($this->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL)) . "\";\x0A");
		$sb->add($prefix . "DEF_PROXY_URL" . " = \"" . $this->jsEscape($this->get(com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL)) . "\";\x0A");
		$sb->add($prefix . "DEF_CACHE_DIR" . " = \"" . $this->jsEscape($this->get(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR)) . "\";\x0A");
		$sb->add($prefix . "DEF_MAXCONNECTIONS" . " = \"" . $this->jsEscape($this->get(com_wiris_quizzes_api_ConfigurationKeys::$MAXCONNECTIONS)) . "\";\x0A");
		return $sb->b;
	}
	public function get($key) {
		return $this->properties->get($key);
	}
	public function setAll($props) {
		$it = $props->keys();
		while($it->hasNext()) {
			$key = $it->next();
			$this->properties->set($key, $props->get($key));
			unset($key);
		}
	}
	public function load($text) {
		$ini = com_wiris_util_sys_IniFile::newIniFileFromString($text);
		$this->setAll($ini->getProperties());
	}
	public $properties;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $CONFIG_FILE = "quizzes.configuration.file";
	static $DEF_CONFIG_FILE = "configuration.ini";
	static $DEF_DIST_CONFIG_FILE = "integration.ini";
	static $CONFIG_CLASS = "quizzes.configuration.class";
	static $DEF_CONFIG_CLASS = "";
	static $CONFIG_CLASSPATH = "quizzes.configuration.classpath";
	static $DEF_CONFIG_CLASSPATH = "";
	static $DEF_WIRIS_URL = "http://www.wiris.net/demo/wiris";
	static $DEF_EDITOR_URL = "http://www.wiris.net/demo/editor";
	static $DEF_SERVICE_URL = "http://www.wiris.net/demo/quizzes";
	static $DEF_PROXY_URL = "quizzes/service.php";
	static $DEF_CACHE_DIR = "/var/wiris/cache";
	static $DEF_MAXCONNECTIONS = "20";
	static $DEF_HTTPPROXY_HOST = "";
	static $DEF_HTTPPROXY_PORT = "8080";
	static $DEF_HTTPPROXY_USER = "";
	static $DEF_HTTPPROXY_PASS = "";
	static $config;
	static function getInstance() {
		if(com_wiris_quizzes_impl_ConfigurationImpl::$config === null) {
			com_wiris_quizzes_impl_ConfigurationImpl::$config = new com_wiris_quizzes_impl_ConfigurationImpl();
		}
		return com_wiris_quizzes_impl_ConfigurationImpl::$config;
	}
	function __toString() { return 'com.wiris.quizzes.impl.ConfigurationImpl'; }
}
