<?php

class com_wiris_util_xml_WXmlUtils {
	public function __construct(){}
	static function getElementContent($element) {
		$sb = new StringBuf();
		if($element->nodeType == Xml::$Document || $element->nodeType == Xml::$Element) {
			$i = $element->iterator();
			while($i->hasNext()) {
				$sb->add($i->next()->toString());
			}
		}
		return $sb->b;
	}
	static function getElementsByAttributeValue($nodeList, $attributeName, $attributeValue) {
		$nodes = new _hx_array(array());
		while($nodeList->hasNext()) {
			$node = $nodeList->next();
			if($node->nodeType == Xml::$Element && $attributeValue === com_wiris_util_xml_WXmlUtils::getAttribute($node, $attributeName)) {
				$nodes->push($node);
			}
			unset($node);
		}
		return $nodes;
	}
	static function getElementsByTagName($nodeList, $tagName) {
		$nodes = new _hx_array(array());
		while($nodeList->hasNext()) {
			$node = $nodeList->next();
			if($node->nodeType == Xml::$Element && $node->getNodeName() === $tagName) {
				$nodes->push($node);
			}
			unset($node);
		}
		return $nodes;
	}
	static function getElements($node) {
		$nodes = new _hx_array(array());
		$nodeList = $node->iterator();
		while($nodeList->hasNext()) {
			$item = $nodeList->next();
			if($item->nodeType == Xml::$Element) {
				$nodes->push($item);
			}
			unset($item);
		}
		return $nodes;
	}
	static function getDocumentElement($doc) {
		$nodeList = $doc->iterator();
		while($nodeList->hasNext()) {
			$node = $nodeList->next();
			if($node->nodeType == Xml::$Element) {
				return $node;
			}
			unset($node);
		}
		return null;
	}
	static function getAttribute($node, $attributeName) {
		$value = $node->get($attributeName);
		if($value === null) {
			return null;
		}
		if(com_wiris_settings_PlatformSettings::$PARSE_XML_ENTITIES) {
			return com_wiris_util_xml_WXmlUtils::htmlUnescape($value);
		}
		return $value;
	}
	static function setAttribute($node, $name, $value) {
		if($value !== null && com_wiris_settings_PlatformSettings::$PARSE_XML_ENTITIES) {
			$value = com_wiris_util_xml_WXmlUtils::htmlEscape($value);
		}
		$node->set($name, $value);
	}
	static function getNodeValue($node) {
		$value = $node->getNodeValue();
		if($value === null) {
			return null;
		}
		if(com_wiris_settings_PlatformSettings::$PARSE_XML_ENTITIES && $node->nodeType == Xml::$PCData) {
			return com_wiris_util_xml_WXmlUtils::htmlUnescape($value);
		}
		return $value;
	}
	static function createPCData($node, $text) {
		if(com_wiris_settings_PlatformSettings::$PARSE_XML_ENTITIES) {
			$text = com_wiris_util_xml_WXmlUtils::htmlEscape($text);
		}
		return Xml::createPCData($text);
	}
	static function htmlEscape($input) {
		$output = str_replace("&", "&amp;", $input);
		$output = str_replace("<", "&lt;", $output);
		$output = str_replace(">", "&gt;", $output);
		$output = str_replace("\"", "&quot;", $output);
		return $output;
	}
	static function htmlUnescape($input) {
		$output = "";
		$start = 0;
		$position = _hx_index_of($input, "&", $start);
		while($position !== -1) {
			$output .= _hx_substr($input, $start, $position - $start);
			if(_hx_char_at($input, $position + 1) === "#") {
				$startPosition = $position + 2;
				$endPosition = _hx_index_of($input, ";", $startPosition);
				if($endPosition !== -1) {
					$number = _hx_substr($input, $startPosition, $endPosition - $startPosition);
					if(StringTools::startsWith($number, "x")) {
						$number = "0" . $number;
					}
					$charCode = Std::parseInt($number);
					$output .= com_wiris_util_xml_WXmlUtils_0($charCode, $endPosition, $input, $number, $output, $position, $start, $startPosition);
					$start = $endPosition + 1;
					unset($number,$charCode);
				} else {
					$output .= "&";
					$start = $position + 1;
				}
				unset($startPosition,$endPosition);
			} else {
				$output .= "&";
				$start = $position + 1;
			}
			$position = _hx_index_of($input, "&", $start);
		}
		$output .= _hx_substr($input, $start, strlen($input) - $start);
		$output = str_replace("&lt;", "<", $output);
		$output = str_replace("&gt;", ">", $output);
		$output = str_replace("&quot;", "\"", $output);
		$output = str_replace("&amp;", "&", $output);
		return $output;
	}
	static $entities;
	static function parseXML($xml) {
		$xml = com_wiris_util_xml_WXmlUtils::filterMathMLEntities($xml);
		$x = Xml::parse($xml);
		return $x;
	}
	static function serializeXML($xml) {
		$s = $xml->toString();
		$s = com_wiris_util_xml_WXmlUtils::filterMathMLEntities($s);
		return $s;
	}
	static function filterMathMLEntities($text) {
		com_wiris_util_xml_WXmlUtils::initEntities();
		$sb = new StringBuf();
		$i = 0;
		$n = strlen($text);
		while($i < $n) {
			$c = _hx_char_code_at($text, $i);
			if($c === 60 && $i + 12 < $n && _hx_char_code_at($text, $i + 1) === 33) {
				if(_hx_substr($text, $i, 9) === "<![CDATA[") {
					$e = _hx_index_of($text, "]]>", $i);
					if($e !== -1) {
						$sb->add(_hx_substr($text, $i, $e - $i + 3));
						$i = $e + 3;
						continue;
					}
					unset($e);
				}
			}
			if($c > 127) {
				$d = $c;
				if(com_wiris_settings_PlatformSettings::$UTF8_CONVERSION) {
					$j = 0;
					$c = 128;
					do {
						$c = $c >> 1;
						$j++;
					} while(($d & $c) !== 0);
					$d = $c - 1 & $d;
					while(--$j > 0) {
						$i++;
						$c = _hx_char_code_at($text, $i);
						$d = ($d << 6) + ($c & 63);
					}
					unset($j);
				}
				$sb->add("&#" . _hx_string_rec($d, "") . ";");
				unset($d);
			} else {
				$sb->b .= chr($c);
				if($c === 38) {
					$i++;
					$c = _hx_char_code_at($text, $i);
					if(com_wiris_util_xml_WXmlUtils::isNameStart($c)) {
						$name = new StringBuf();
						$name->b .= chr($c);
						$i++;
						$c = _hx_char_code_at($text, $i);
						while(com_wiris_util_xml_WXmlUtils::isNameChar($c)) {
							$name->b .= chr($c);
							$i++;
							$c = _hx_char_code_at($text, $i);
						}
						$ent = $name->b;
						if($c === 59 && com_wiris_util_xml_WXmlUtils::$entities->exists($ent)) {
							$val = com_wiris_util_xml_WXmlUtils::$entities->get($ent);
							$sb->add("#");
							$sb->add($val);
							unset($val);
						} else {
							$sb->add($name);
						}
						unset($name,$ent);
					} else {
						if($c === 35) {
							$sb->b .= chr($c);
							$i++;
							$c = _hx_char_code_at($text, $i);
							if($c === 120) {
								$hex = new StringBuf();
								$i++;
								$c = _hx_char_code_at($text, $i);
								while(com_wiris_util_xml_WXmlUtils::isHexDigit($c)) {
									$hex->b .= chr($c);
									$i++;
									$c = _hx_char_code_at($text, $i);
								}
								$hent = $hex->b;
								if($c === 59) {
									$dec = Std::parseInt("0x" . $hent);
									$sb->add("" . _hx_string_rec($dec, ""));
									unset($dec);
								} else {
									$sb->add("x");
									$sb->add($hent);
								}
								unset($hex,$hent);
							}
						}
					}
					$sb->b .= chr($c);
				}
			}
			$i++;
			unset($c);
		}
		return $sb->b;
	}
	static function isNameStart($c) {
		if(65 <= $c && $c <= 90) {
			return true;
		}
		if(97 <= $c && $c <= 122) {
			return true;
		}
		if($c === 95 || $c === 58) {
			return true;
		}
		return false;
	}
	static function isNameChar($c) {
		if(com_wiris_util_xml_WXmlUtils::isNameStart($c)) {
			return true;
		}
		if(48 <= $c && $c <= 57) {
			return true;
		}
		if($c === 46 || $c === 45) {
			return true;
		}
		return false;
	}
	static function isHexDigit($c) {
		if($c >= 48 && $c <= 57) {
			return true;
		}
		if($c >= 65 && $c <= 70) {
			return true;
		}
		if($c >= 97 && $c <= 102) {
			return true;
		}
		return false;
	}
	static function initEntities() {
		if(com_wiris_util_xml_WXmlUtils::$entities === null) {
			$e = com_wiris_util_xml_WEntities::$MATHML_ENTITIES;
			com_wiris_util_xml_WXmlUtils::$entities = new Hash();
			$start = 0;
			$mid = null;
			while(($mid = _hx_index_of($e, "@", $start)) !== -1) {
				$name = _hx_substr($e, $start, $mid - $start);
				$mid++;
				$start = _hx_index_of($e, "@", $mid);
				if($start === -1) {
					break;
				}
				$value = _hx_substr($e, $mid, $start - $mid);
				$num = Std::parseInt("0x" . $value);
				com_wiris_util_xml_WXmlUtils::$entities->set($name, "" . _hx_string_rec($num, ""));
				$start++;
				unset($value,$num,$name);
			}
		}
	}
	static function getText($xml) {
		if($xml->nodeType == Xml::$PCData) {
			return $xml->getNodeValue();
		}
		$r = "";
		$iter = $xml->iterator();
		while($iter->hasNext()) {
			$r .= com_wiris_util_xml_WXmlUtils::getText($iter->next());
		}
		return $r;
	}
	static function copyXml($elem) {
		return com_wiris_util_xml_WXmlUtils::importXml($elem, $elem);
	}
	static function importXml($elem, $model) {
		$n = null;
		if($elem->nodeType == Xml::$Element) {
			$n = Xml::createElement($elem->getNodeName());
			$keys = $elem->attributes();
			while($keys->hasNext()) {
				$key = $keys->next();
				$n->set($key, $elem->get($key));
				unset($key);
			}
			$children = $elem->iterator();
			while($children->hasNext()) {
				$n->addChild(com_wiris_util_xml_WXmlUtils::importXml($children->next(), $model));
			}
		} else {
			if($elem->nodeType == Xml::$Document) {
				$n = com_wiris_util_xml_WXmlUtils::importXml($elem->firstElement(), $model);
			} else {
				if($elem->nodeType == Xml::$CData) {
					$n = Xml::createCData($elem->getNodeValue());
				} else {
					if($elem->nodeType == Xml::$PCData) {
						$n = Xml::createPCData($elem->getNodeValue());
					} else {
						throw new HException("Unsupported node type: " . Std::string($elem->nodeType));
					}
				}
			}
		}
		return $n;
	}
	static function indentXml($xml, $space) {
		$depth = 0;
		$opentag = new EReg("^<([\\w-_]+)[^>]*>\$", "");
		$autotag = new EReg("^<([\\w-_]+)[^>]*/>\$", "");
		$closetag = new EReg("^</([\\w-_]+)>\$", "");
		$res = new StringBuf();
		$end = 0;
		$start = null;
		$text = null;
		while($end < strlen($xml) && ($start = _hx_index_of($xml, "<", $end)) !== -1) {
			$text = $start > $end;
			if($text) {
				$res->add(_hx_substr($xml, $end, $start - $end));
			}
			$end = _hx_index_of($xml, ">", $start) + 1;
			$aux = _hx_substr($xml, $start, $end - $start);
			if($autotag->match($aux)) {
				$res->add("\x0A");
				$i = null;
				{
					$_g = 0;
					while($_g < $depth) {
						$i1 = $_g++;
						$res->add($space);
						unset($i1);
					}
					unset($_g);
				}
				$res->add($aux);
				unset($i);
			} else {
				if($opentag->match($aux)) {
					$res->add("\x0A");
					$i = null;
					{
						$_g = 0;
						while($_g < $depth) {
							$i1 = $_g++;
							$res->add($space);
							unset($i1);
						}
						unset($_g);
					}
					$res->add($aux);
					$depth++;
					unset($i);
				} else {
					if($closetag->match($aux)) {
						$depth--;
						if(!$text) {
							$res->add("\x0A");
							$i = null;
							{
								$_g = 0;
								while($_g < $depth) {
									$i1 = $_g++;
									$res->add($space);
									unset($i1);
								}
								unset($_g);
							}
							unset($i);
						}
						$res->add($aux);
					} else {
						haxe_Log::trace("WARNING! malformed XML at character " . _hx_string_rec($end, "") . ":" . $xml, _hx_anonymous(array("fileName" => "WXmlUtils.hx", "lineNumber" => 498, "className" => "com.wiris.util.xml.WXmlUtils", "methodName" => "indentXml")));
						$res->add($aux);
					}
				}
			}
			unset($aux);
		}
		return trim($res->b);
	}
	function __toString() { return 'com.wiris.util.xml.WXmlUtils'; }
}
function com_wiris_util_xml_WXmlUtils_0(&$charCode, &$endPosition, &$input, &$number, &$output, &$position, &$start, &$startPosition) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($charCode);
		return $s->toString();
	}
}
