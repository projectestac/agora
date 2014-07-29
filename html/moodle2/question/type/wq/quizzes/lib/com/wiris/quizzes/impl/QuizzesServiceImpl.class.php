<?php

class com_wiris_quizzes_impl_QuizzesServiceImpl implements com_wiris_quizzes_api_QuizzesService{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->protocol = com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST;
		$this->url = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL);
	}}
	public function getServiceUrl() {
		$url = $this->url;
		if($this->protocol === com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST) {
			$url .= "/rest";
		}
		return $url;
	}
	public function webServiceEnvelope($data) {
		if($this->protocol === com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST) {
			$data = "<doProcessQuestions>" . $data . "</doProcessQuestions>";
		}
		return $data;
	}
	public function callService($mqr, $cache, $listener, $async) {
		$s = new com_wiris_util_xml_XmlSerializer();
		$s->setCached($cache);
		if(!$cache && com_wiris_quizzes_impl_QuizzesServiceImpl::$USE_CACHE) {
			$j = null;
			{
				$_g1 = 0; $_g = $mqr->questionRequests->length;
				while($_g1 < $_g) {
					$j1 = $_g1++;
					_hx_array_get($mqr->questionRequests, $j1)->processes->push(new com_wiris_quizzes_impl_ProcessStoreQuestion());
					unset($j1);
				}
			}
		}
		$postData = $this->webServiceEnvelope($s->write($mqr));
		$http = null;
		$httpl = new com_wiris_quizzes_impl_HttpToQuizzesListener($listener, $mqr, $this, $async);
		$config = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration();
		if(com_wiris_settings_PlatformSettings::$IS_JAVASCRIPT || com_wiris_settings_PlatformSettings::$IS_FLASH) {
			$url = $config->get(com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL);
			$http = new com_wiris_quizzes_impl_HttpImpl($url, $httpl);
			$http->setParameter("service", "quizzes");
			$http->setParameter("rawpostdata", "true");
			$http->setParameter("postdata", $postData);
			$http->setHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
		} else {
			$url = $this->getServiceUrl();
			$http = new com_wiris_quizzes_impl_MaxConnectionsHttpImpl($url, $httpl);
			$http->setHeader("Content-Type", "text/xml; charset=UTF-8");
			$http->setHeader("Referer", $config->get(com_wiris_quizzes_api_ConfigurationKeys::$REFERER_URL));
			$http->setPostData($postData);
		}
		$http->setAsync($async);
		$http->request(true);
	}
	public function executeMultipleImpl($mqr, $listener, $async) {
		$cache = com_wiris_quizzes_impl_QuizzesServiceImpl::$USE_CACHE;
		$i = 0;
		while($cache && $i < $mqr->questionRequests->length) {
			$q = _hx_array_get($mqr->questionRequests, $i)->question;
			$cache = $cache && $q->hasId();
			$i++;
			unset($q);
		}
		$this->callService($mqr, $cache, $listener, $async);
	}
	public function executeMultiple($mqr) {
		$listener = new com_wiris_quizzes_impl_QuizzesServiceSyncListener();
		$this->executeMultipleImpl($mqr, $listener, false);
		return $listener->mqs;
	}
	public function executeMultipleAsync($req, $listener) {
		$this->executeMultipleImpl($req, $listener, true);
	}
	public function singleResponse($mqs) {
		if($mqs->questionResponses->length === 0) {
			return new com_wiris_quizzes_impl_QuestionResponseImpl();
		} else {
			return $mqs->questionResponses[0];
		}
	}
	public function multipleRequest($req) {
		$reqi = $req;
		$mqr = new com_wiris_quizzes_impl_MultipleQuestionRequest();
		$mqr->questionRequests = new _hx_array(array());
		$mqr->questionRequests->push($reqi);
		return $mqr;
	}
	public function executeAsync($req, $listener) {
		$mqr = $this->multipleRequest($req);
		$this->executeMultipleAsync($mqr, new com_wiris_quizzes_impl_QuizzesServiceSingleListener($listener));
	}
	public function execute($req) {
		$mqr = $this->multipleRequest($req);
		$mqs = $this->executeMultiple($mqr);
		return $this->singleResponse($mqs);
	}
	public $protocol;
	public $url;
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
	static $USE_CACHE = true;
	static $PROTOCOL_REST = 0;
	function __toString() { return 'com.wiris.quizzes.impl.QuizzesServiceImpl'; }
}
