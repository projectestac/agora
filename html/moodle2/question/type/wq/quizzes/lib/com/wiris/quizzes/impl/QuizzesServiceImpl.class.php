<?php

class com_wiris_quizzes_impl_QuizzesServiceImpl implements com_wiris_quizzes_api_QuizzesService{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->protocol = com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST;
		$this->url = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL);
		$this->useCache = true;
	}}
	public function isCacheMiss($response) {
		return $this->isFault($response) && StringTools::startsWith($this->getFaultMessage($response), "CACHEMISS");
	}
	public function getServiceUrl() {
		$url = $this->url;
		if($this->protocol === com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST) {
			$url .= "/rest";
		}
		return $url;
	}
	public function stripWebServiceEnvelope($data) {
		if($this->protocol === com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST) {
			$startTagName = "doProcessQuestionsResponse";
			$start = _hx_index_of($data, "<" . $startTagName . ">", null) + strlen($startTagName) + 2;
			$end = _hx_index_of($data, "</" . $startTagName . ">", null);
			$data = _hx_substr($data, $start, $end - $start);
		}
		return $data;
	}
	public function webServiceEnvelope($data) {
		if($this->protocol === com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST) {
			$data = "<doProcessQuestions>" . $data . "</doProcessQuestions>";
		}
		return $data;
	}
	public function getFaultMessage($response) {
		if($this->protocol === com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST) {
			$start = _hx_index_of($response, "<fault>", null) + 7;
			$end = _hx_index_of($response, "</fault>", null);
			$msg = _hx_substr($response, $start, $end - $start);
			return com_wiris_util_xml_WXmlUtils::htmlUnescape($msg);
		}
		return $response;
	}
	public function isFault($response) {
		if($this->protocol === com_wiris_quizzes_impl_QuizzesServiceImpl::$PROTOCOL_REST) {
			return _hx_index_of($response, "<fault>", null) !== -1;
		}
		return false;
	}
	public function callQuizzesService($postData) {
		$http = null;
		if(com_wiris_settings_PlatformSettings::$IS_JAVASCRIPT) {
			$url = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL);
			$http = new com_wiris_quizzes_impl_HttpImpl($url);
			$http->setParameter("service", "quizzes");
			$http->setParameter("rawpostdata", "true");
			$http->setParameter("postdata", $postData);
			$http->setHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
		} else {
			$url = $this->getServiceUrl();
			$http = new com_wiris_quizzes_impl_MaxConnectionsHttpImpl($url);
			$http->setHeader("Connection", "close");
			$http->setHeader("Content-Type", "text/xml; charset=UTF-8");
			$http->setPostData($postData);
		}
		$http->request(true);
		$response = $http->response;
		return $response;
	}
	public function executeMultiple($mqr) {
		$s = new com_wiris_util_xml_XmlSerializer();
		$cache = $this->useCache;
		$i = 0;
		while($cache && $i < $mqr->questionRequests->length) {
			$q = _hx_array_get($mqr->questionRequests, $i)->question;
			$cache = $cache && $q->hasId();
			$i++;
			unset($q);
		}
		$response = $this->callService($s, $mqr, $cache);
		if($this->isCacheMiss($response)) {
			$cache = false;
			$response = $this->callService($s, $mqr, $cache);
		}
		if($this->isFault($response)) {
			throw new HException("Remote exception: " . $this->getFaultMessage($response));
		}
		$response = $this->stripWebServiceEnvelope($response);
		$res = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->newMultipleResponseFromXml($response);
		if(!$cache && $this->useCache) {
			$k = null;
			{
				$_g1 = 0; $_g = $res->questionResponses->length;
				while($_g1 < $_g) {
					$k1 = $_g1++;
					$rsq = _hx_array_get($res->questionResponses, $k1)->results->pop();
					_hx_array_get($mqr->questionRequests, $k1)->question->setId($rsq->id);
					unset($rsq,$k1);
				}
			}
		}
		return $res;
	}
	public function callService($s, $mqr, $cache) {
		$s->setCached($cache);
		if(!$cache && $this->useCache) {
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
		$response = $this->callQuizzesService($postData);
		return $response;
	}
	public function execute($req) {
		$reqi = $req;
		$mqr = new com_wiris_quizzes_impl_MultipleQuestionRequest();
		$mqr->questionRequests = new _hx_array(array());
		$mqr->questionRequests->push($reqi);
		$mqs = $this->executeMultiple($mqr);
		if($mqs->questionResponses->length === 0) {
			return new com_wiris_quizzes_impl_QuestionResponseImpl();
		} else {
			return $mqs->questionResponses[0];
		}
	}
	public $useCache;
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
	static $PROTOCOL_REST = 0;
	function __toString() { return 'com.wiris.quizzes.impl.QuizzesServiceImpl'; }
}
