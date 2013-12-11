<?php

/**
 * This class is used to send mail using common Web Service mail delivery of the Departament d'Ensenyament.
 * 
 * REQUIREMENTS:
 * - have enabled the PHP SOAP library
 * 
 * 
 * WORKDIR:
 * new mailsender -> add_message -> send_mail
 * 
 * 
 * Basic example of using this class:
 * 
 * include ('mailsender.class.php');
 * $sender  = new mailsender('XTECBLOCS', 'xtecblocs-noreply@xtec.cat', 'educacio', 'INT', true);
 * $to      = array('manuel.martinez.ortega@atsistemas.com');
 * $subject = 'Tester for the mail sender';
 * $body    = 'Testing the mailserder.class.php v.1';
 * $sender->add_message( $to, $cc, $bcc, $subject, $body);
 * $sender->send_mail();
 * 
 * 
 * @author IECISA @mmartinez
 * @version 1.2
 * 
 */

class mailsender{
	
	/**
	 * Mail adress of the allowed senders
	 */
	private $allowed_senders = array('xtec'     =>'correus_aplicacions.educacio@xtec.cat',
	                                 'gencat'   =>'correus_aplicacions.educacio@gencat.cat',
	                                 'educacio' =>'apligest@correueducacio.xtec.cat');
	/**
	 * Url of the allowed enviroments
	 */
	private $allowed_enviroments = array ('INT' => 'http://xtec-int.educacio.intranet:8080/event/ServeisComuns/intern/EnviaCorreu/a1/EnviaCorreu',
	                                      'ACC' => 'http://acc.xtec.cat:8080/event/ServeisComuns/intern/EnviaCorreu/a1/EnviaCorreu',
	                                      'PRO' => 'http://aplitic.xtec.cat:8080/event/ServeisComuns/intern/EnviaCorreu/a1/EnviaCorreu');
	/**
	 *  Other variables used
	 */
	private $idApp, $replyAddress, $sender, $enviroment, $islogger = false, $logger, $debug, $messages = array();
	
	private $error = array('idApp'           => false,
	                       'replyAddress'    => false,
	                       'sender'          => false,
	                       'enviroment'      => false,
	                       'ws_availability' => false);
	
	/**
	 * Class constructor
	 * 
	 * @param int    $idApp        -> code of the application that want to send mails
	 * @param string $replyAddress -> email address where destinataries can answer to
	 * @param string $sender       -> code of the desired sender
	 * @param string $enviroment   -> code of the desired enviroment
	 * @param bool   $log          -> set if the log are enable or disable
	 * @param bool   $logdebug     -> set if a full log is wanted or just a resume log
	 * @param string $logpath      -> set the full path where the log will be stored
	 */	
//XTEC ************ MODIFIED -> Add to the constructor a new parameter called $logpath to define where will be stored the log file
//2011.04.01 @mmartinez
	function __construct($idApp, $replyAddress = '', $sender = 'educacio', $enviroment = 'PRO', $log = false, $logdebug = false, $logpath = ''){
		//set variables
		$this->islogger = ($log)? $this->get_logger($logdebug, $logpath) : false;
//*********** ORIGINAL 
    /*function __construct($idApp, $replyAddress = '', $sender = 'educacio', $enviroment = 'PRO', $log = false, $debug = false){
		//set variables
		$this->islogger = ($log)? $this->get_logger($debug) : false;*/ 
//*********** ORIGINAL 2011.03.18 ******  Add to the constructor a new parameter called $log to switch the logger on and off
    /*function __construct($idApp, $replyAddress = '', $sender = 'educacio', $enviroment = 'PRO', $debug = false){
		//set variables
		$this->islogger    = $this->get_logger($debug); */
//*********** END

	    if ($this->islogger){
		    $this->logger->add('mailsender.class.php: Loading class...');
		}
		
		if (!$this->set_idapp($idApp)){
			exit('Mailsender need obligatory the $idApp parameter. Please set it.');
		}
		$this->set_replyAddress($replyAddress);
		$this->set_sender($sender);
		$this->set_enviroment($enviroment);
		
		if ($this->islogger){
			if (in_array(true, $this->error)){
				$this->logger->add('mailsender.class.php: Class loaded with errors');
			}else {
		        $this->logger->add('mailsender.class.php: Class loaded successfull');
			}
		}
	}
	
    /**
	 * Check if ws is available for the setted sender and enviroment.
	 * 
	 * @return bool -> true if test passed successfuly or false if not
	 */
	function test_availability (){
		
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Testing ws availability...', 'DEBUG');
		}
		
		$this->error['ws_availability'] = false;
		
		//check if there are any previous error
		if (in_array(true, $this->error)){
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Test ws availability KO, there are errors width idApp, replyAddress, sender or enviroment.', 'ERROR');
		    }
		    return false;
		}
		
		$xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:cor="http://www.gencat.cat/educacio/sscc/correu">
            <soapenv:Body>
                <cor:PeticioDisponibilitat>
                    <from>'.$this->sender.'</from>
                </cor:PeticioDisponibilitat>
            </soapenv:Body>
        </soapenv:Envelope>';
		
		if ($this->debug){
			$this->logger->add('mailsender.class.php: Test ws availability values: sender -> '.$this->sender.', url ->'.$this->enviroment, 'DEBUG');
		}	
		
		try {
			
			//get_wsdl
			$wsdl = $this->get_wsdl($this->enviroment);
			if (!$wsdl){
                if ($this->islogger){
                	$this->logger->add('mailsender.class.php: Test ws availability KO. wsdl', 'ERROR');
                }
				$this->error['ws_availability'] = true;
				return false;
			}

			//invoke soap client
		    $soapclient = @new soapclient($wsdl, array('trace' => 1, 'connection_timeout' => 120));
		     if ($this->debug){
                	$this->logger->add('mailsender.class.php: Test ws availability instance soapclient OK', 'DEBUG');
                }

		    set_time_limit(120);

		    //call the ws method
		    $response = $soapclient->__doRequest(utf8_encode($xml), $this->enviroment.'?wsdl', 'disponibilitat', SOAP_1_1, 0);
		    
		    if ($this->debug){
		    	$this->logger->add('mailsender.class.php: Test ws availability doRequest OK', 'DEBUG');
		   	    $this->logger->add('mailsender.class.php: Test ws availability request: "'."\n".'<![CDATA['.$xml.']]!>"', 'DEBUG');
		   	    $this->logger->add('mailsender.class.php: Test ws availability response: "'."\n".'<![CDATA['.$response.']]!>"', 'DEBUG');
		    }
		    
		} catch (SoapFault $e){
			
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Test ws availability KO, '.$e->faultstring, 'ERROR');
		    }
		        
		    $this->error['ws_availability'] = true;
		    return false;
		    
		}
		
		if (empty($response)){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Test availability KO, response is empty', 'ERROR');
			}
			return false;
		}
		
		//parse response
		if ($response = simplexml_load_string($response)){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Test availability KO, response parsing fails.', 'ERROR');
			}
			return false;
		}
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Test availability response parsed OK', 'DEBUG');
		}
		
		$response = $response->children('env', true);		
		$response = $response->Body[0]->children("ans1", true);		
		$response = $response->RespostaDisponibilitat[0]->children();
		
		//parse ws response		
		if ($response->status == "OK"){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Test ws availability OK');
			}
			return true;
		}
		
		$error_message = 'Unknown';
		
		if (isset($response->message) && !empty($response->message)){
			$error_message = $response->message;
		}
		
		if ($this->islogger){
		    $this->logger->add('mailsender.class.php: Test ws availability KO. '.$error_message, 'ERROR');
		}
		    
		$this->error['ws_availability'] = true;
		
		return false;
	}
    
    /**
	 * Send mail with al the messages loaded previously
	 * 
	 * @return array -> resume of the messages sended
	 */
	function send_mail (){
		
	   if ($this->islogger){
			$this->logger->add('mailsender.class.php: Sending mails...');
		}
		
		//check if there are any previous error
		if (in_array(true, $this->error)){
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Send mail KO, there are errors width idApp, sender, replyAddress, enviroment or ws availability.', 'ERROR');
		    }
		    return false;
		}
		
		//check ws availability
		if (!$this->test_availability()){
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Send mail KO. test_availability');
		    }
			return false;
		}
		
		//prepare xml to be send
		if (!$xml = $this->get_messages()){
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Send mail KO. xml');
		    }
			return false;
		}
		
// XTEC ************ ADDED -> Test the charset to do conversions
// 2011.03.16 @mmartinez
		//test the charset of the xml
		$xml_charset = $this->get_charset($xml);
		if ($xml_charset != 'UTF_8'){
			$xml = utf8_encode($xml);
		}
//************* END

	    try {
	    				
			//get_wsdl
			$wsdl = $this->get_wsdl($this->enviroment);
			if (!$wsdl){
				if ($this->islogger){
				    $this->logger->add('mailsender.class.php: Send mail KO. wsdl');
			    }
				return false;
			}
			
			//invoke soap client
		    $soapclient = @new soapclient($wsdl, array('trace' => 1, 'connection_timeout' => 120));
	        if ($this->debug){
				$this->logger->add('mailsender.class.php: Send mail instanced soapclient OK', 'DEBUG');
			}
			
			set_time_limit(120);
			
		    //call the ws method
		    $response = $soapclient->__doRequest($xml, $this->enviroment.'?wsdl', 'enviament', SOAP_1_1, 0);
		    
		    if ($this->debug){
		    	$this->logger->add('mailsender.class.php: Send mail doRequest OK', 'DEBUG');
		   	    $this->logger->add('mailsender.class.php: Send mail request value: <![CDATA['.$xml.']]!>', 'DEBUG');
		   	    $this->logger->add('mailsender.class.php: Send mail response value: <![CDATA['.$response.']]!>', 'DEBUG');
		    }
		    
		} catch (SoapFault $e){
			
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Send mail KO, '.$e->faultstring, 'ERROR');
		    }
		    return false;
		    
		}
		
		if (empty($response)){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Send mail KO, response is empty', 'ERROR');
			}
			return false;
		}
		
		//parse response
		if ($response = simplexml_load_string($response)){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Send mail KO, response parsing fails.', 'ERROR');
			}
			return false;
		}
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Send mail response parsed OK', 'DEBUG');
		}
		
		$response = $response->children('env', true);		
		
		
		if (isset($response->Body[0]->Fault[0])){
			$response = $response->Body[0]->Fault[0]->children();
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Send mail KO, '.$response->faultstring, 'ERROR');
			}
			return false;
		}
		$response = $response->Body[0]->children("ans1", true);	
		$response = $response->RespostaEnviament[0]->children();
		
		//process response
		if ($response->status == 'KO'){
		    if ($this->islogger){
		    	$responsemessage = (!empty($response->message))? $response->message : '';
			    $this->logger->add('mailsender.class.php: Send mail KO, ws response with KO. Reason: '.$responsemessage, 'ERROR');
		    }
		}
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Send mail OK, ws response with OK', 'DEBUG');
		}
		
		//process each message
		$return = array();
		$errors = 0;
		foreach ($response->respostaCorreu as $respostaCorreu){ 
			
			$responsemessage = (!empty($respostaCorreu->message))? $respostaCorreu->message : '' ;
			$return[] = array('id' => $respostaCorreu->id, 'status' => $respostaCorreu->status, 'message' => $responsemessage);
			
			if ($respostaCorreu->status == 'KO'){
				if ($this->logger){
				    $this->logger->add('mailsender.class.php: Send mail response message '.$respostaCorreu->id.' response with KO. Reason: '.$responsemessage, 'WARNING');
				}
				$errors ++;
				continue;
			}
			
			if ($this->debug){
				$this->logger->add('mailsender.class.php: Send mail response message '.$respostaCorreu->id.' response with OK', 'DEBUG');
			}
		}		
	    if ($this->logger){
		    $this->logger->add('mailsender.class.php: Send mail response messages resume: '.(count($return)-$errors).' OK, '.$errors.' KO, '.count($return).' Total');
		}
		
		//unset requested messagedd
		$this->messages = '';
		
		return $return;
		
	}

// XTEC ************* ADDED -> new method to add_message by object
// 2011.04.04 @mmartinez
	/**
	 * Add message object to mailsender
	 * 
	 * @param object $message -> Object with the message to add
	 * @return bool           -> true if all ok, false if not
	 */
	function add ($message = null){
		
		if (empty($message)){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: add parameter is empty', 'ERROR');
			}
			return false;
		}
		
		$attach = $message->get_attach();
		
		 return $this->add_message($message->get_to(), $message->get_cc(), $message->get_bcc(), $message->get_subject(), $message->get_bodyContent(),
		$attach[0], $attach[1], $attach[2], $attach[3], $message->get_bodyType());
	}
//************ END
	/**
	 * Add messages to the request xml
	 * 
	 * @param array $to                 -> list of email address to send message to
	 * @param array $cc                 -> list of email address to send message copy to
	 * @param array $bcc                -> list of email address to send message hidden copy to
	 * @param string $subject           -> subject of the message to be send
	 * @param string $bodyContent       -> content of the message to be send
	 * @param array $attachfilenames    -> list of attached files name to be send
	 * @param array $attachfilepaths    -> list of attached files paths to be send
	 * @param array $attachfilecontents -> list of attached binary code to be send
	 * @param array $attachmimetypes    -> list of attached mime type files to be send to
	 * @param string $bodyType   		-> content type of the body (text/plain or text/html)
	 * @return bool                     -> true if added was successfull or false if not
	 */
	function add_message($to = array(), $cc = array(), $bcc = array(), $subject = '', $bodyContent = '', $attachfilenames = array(), $attachfilepaths = array(), $attachfilecontents = array(), $attachmimetypes = array(), $bodyType = 'text/plain'){
		
		$cntmsg = count($this->messages)+1; 
		
		//check if there are destinataris
		$parameters = array('to', 'cc', 'bcc');
		$errorcnt = 0;
		$errorstr = '';
		foreach ($parameters as $parameter){
			if (empty(${$parameter})){
				$errorcnt++;
			}
		}
		if ($errorcnt == count($parameters)){
			$errorstr .= 'Parameters $to, $cc and $bcc are empty, and there isnt any destinatary';
		}
		
		//check if there are body contents
		$parameters = array('subject', 'bodyContent', 'bodyType');
	    foreach ($parameters as $parameter){
			if (empty(${$parameter})){
				$errorstr .= (!empty($errorstr))? ', ' : '';
				$errorstr .= 'parameter $'.$parameter.' is empty';
				continue;
			}
			if ($parameter == 'bodyType' && ${$parameter} != 'text/plain' && ${$parameter} != 'text/html'){
				$errorstr .= 'parameter bodyType is incorrect, it must be "text/plain" or "text/html"';
			}
		}
		
		//if the are errors add message to logger and stop add messages
		if ($errorstr != ''){
			if ($this->logger){
				$this->logger->add('mailsender.class.php: Add message '.$cntmsg.' KO, '.$errorstr, 'ERROR');
			}
			return false;
		}
		
		//set xml
		$message = '                    <correu>
		                  <from>'.$this->sender.'</from>
		                  <replyAddresses>
		                      <address>'.$this->replyAddress.'</address>
		                  </replyAddresses>
		                  <destinationAddresses>';        
        foreach ($to as $t){
            $message .= '                          <destination>
                                  <address>'.$t.'</address>
                                  <type>TO</type>
                            </destination>';
        }
	    foreach ($cc as $c){
            $message .= '                      <destination>
                                           <address>'.$c.'</address>
                                           <type>CC</type>
                                         </destination>';
        }
	    foreach ($bcc as $bc){
            $message .= '                      <destination>
                                                   <address>'.$bc.'</address>
                                                   <type>BCC</type>
                                               </destination>';
        }

// XTEC ************ ADDED -> Test the charset to do conversions
// 2011.03.16 @mmartinez
        //Test de subject and bodyContent subject
        $subject_charset = $this->get_charset($subject);
        if ($subject_charset != 'UTF_8'){
        	$subject = utf8_encode($subject);
        }
	    $body_charset = $this->get_charset($bodyContent);
        if ($body_charset != 'UTF_8'){
        	$bodyContent = utf8_encode($bodyContent);
        }	
//************ END

        $message .= '                     </destinationAddresses>
                             <subject><![CDATA['.$subject.']]></subject>
                             <mailBody>
                                  <bodyType>'.$bodyType.'</bodyType>
                                  <bodyContent><![CDATA['.$bodyContent.']]></bodyContent>
                             </mailBody>';
        
        if (!empty($attachfilenames) && (!empty($attachfilepaths) || (!empty($attachfilecontents) && !empty($attachmimetypes)))){
        	$cnt = 0;
	        $message .= "\n".'        <attachments>';
	        foreach ($attachfilenames as $attachfilename){
	        	if (empty($attachfilename) || (empty($attachfilepaths[$cnt]) && empty($attachfilecontents[$cnt]) && empty($attachmimetypes[$cnt]))){
	        		$cnt++;
	        		continue;
	        	}
	        
	        	$message .= "\n".'<attachment>'."\n";
	        	if (!empty($attachfilepaths[$cnt])){
	        	    //file is posted in a path of the server
	        	    
	        		//check that file exits
                    if (!is_file($attachfilepaths[$cnt])){
                    	$cnt++;
                    	$message = substr($message, 0, strlen($message)-14);
                        if ($this->islogger){
	                		$this->logger->add('mailsender.class.php: Add attachfile '.$cnt.' to message '.$cntmsg.' KO, attachfilepath is not a valid path. Cancel add to messages', 'ERROR');
	                	}
                    	return false;
                    }
	                $message .= '<fileName>'.$attachfilename.'</fileName>
	                    <filePath>'.$attachfilepaths[$cnt].'</filePath>';
	        	}else if (!empty($attachfilecontents[$cnt])){
	        		//file is in base64 bin mode
	                $message .= '
	                    <fileName><![CDATA['.$attachfilename.']]></fileName>
	                    <attachmentContent>';
	                if (is_file($attachfilecontents[$cnt])){
	                	//get file type and set it to $attachmimetypes[$cnt]
	                	
//XTEC ************	MODIFIED -> Call to the new method added to get file mime type
//2011.03.18 @mmartinez
                        $attachmimetypes[$cnt] = $this->get_mime_type($attachfilecontents[$cnt]);
//************** ORIGINAL
	                	/*if (function_exists('finfo_file')) {  
					        $finfo = finfo_open(FILEINFO_MIME_TYPE);
					        $attachmimetypes[$cnt] = finfo_file($finfo, $attachfilecontents[$cnt]);
					        finfo_close($finfo);
					    } else if (require_once('lib/mime.php')){
					  	    $attachmimetypes[$cnt] = mime_content_type($attachfilecontents[$cnt]);
					    }else {
					  	    $file = escapeshellarg($attachfilecontents[$cnt]);
					  	    $attachmimetypes[$cnt] = shell_exec("file -bi " . $file);     
					    }*/
//************** END
					    
	                	$attachfilecontents[$cnt] = base64_encode(fread(fopen($attachfilecontents[$cnt], 'r'), filesize($attachfilecontents[$cnt])));
	                	
	                } else if (empty($attachmimetypes[$cnt])){
	                	if ($this->islogger){
	                		$this->logger->add('mailsender.class.php: Add message '.$cntmsg.' KO, attachmimetypes not found for attach '.($cnt+1).'. Cancell add messages.', 'ERROR');
	                	}
	                	return false;
	                }
	                $message .= '        <fileContent>'.$attachfilecontents[$cnt].'</fileContent>
	                        <mimeType>'.$attachmimetypes[$cnt].'</mimeType>
	                    </attachmentContent>';
	        	} else {
	        		$message = substr($message, 0, strlen($message)-14);
	        		continue;
	        	}
	            $message .= "\n".'</attachment>';
	            $cnt++;
	        }
	        
	        $message .= "\n".'</attachments>';
        }
                                      
        $message .= "\n".'</correu>';
		
        //add to messages array
		$this->messages[] = $message;		
	    if ($this->debug){
	    	    $cnt = count($this->messages);
				$this->logger->add('mailsender.class.php: Add message '.$cnt.' OK, message: "'."\n".'<![CDATA['.$message.']]>"', 'DEBUG');
			}
		return true;
	}
		
	/**
	 * Print de log generated by the class
	 * 
	 * @return string -> full string with the log
	 */
	function print_log(){
		
		if ($this->islogger && $log = $this->logger->get_log('<br>')){
		    echo '<br><br><b>Log generated on '.date("d-m-Y H:i:s").':</b><br>'.$log;
		}
		
		return;
	}
	
////////////////////////////////////////////////////////
//////////          SET/GET FUNCTIONS          /////////
////////////////////////////////////////////////////////
	
	/**
	 * Check and set idApp
	 * 
	 * @param string $idApp -> code of the application that is been using this class
	 * @return bool         -> true if all ok or false if not
	 */
	private function set_idapp($idApp = ''){
		
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Checking idApp...', 'DEBUG');
		}
		
		$this->error['idApp'] = false;
		
		if (empty($idApp)){
			if ($this->islogger){
			    $this->logger->add('mailsender.class.php: IdApp KO, parameter is empty', 'ERROR');
		    }
		    $this->error['idApp'] = true;
		    return false;
		}
		
	    if ($this->islogger){
			$this->logger->add('mailsender.class.php: IdApp OK, setted to "'.$idApp.'"');
		}
		
		$this->idApp = $idApp;
		return true;
	}
	
	/**
	 * Check and set replyAddress
	 * 
	 * @param string $replyAddres -> email address where destinataris can reply to
	 * @return bool               -> true if all ok or false if not
	 */
	function set_replyAddress($replyAddress = ''){
		
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Checking replyAddress...', 'DEBUG');
		}
		
		$this->error['replyAddress'] = false;

//XTEC ************ ADD -> Improved control of well-formed email
//2011.03.18 @mmartinez
		$replyAddress=trim($replyAddress);
        $replyAddress=strtolower($replyAddress);
        $replyAddress=addslashes($replyAddress);
//********** END

//XTEC ************ MODIFY -> Improved control of well-formed email
//2011.03.18 @mmartinez
		if (!eregi("^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9]+@[a-zA-Z0-9]+[a-zA-Z0-9-]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$", $replyAddress)){
//*********** ORIGINAL
        //if (!preg_match('/^[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,4}$/',$replyAddress)){
//*********** END
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: ReplyAddress KO, "'.$replyAddress.'" is not a valid email address', 'ERROR');
		    }
		    $this->error['replyAddress'] = true;
		    return false;
		}
		
	    if ($this->islogger){
			$this->logger->add('mailsender.class.php: ReplyAddress: OK, setted to "'.$replyAddress.'"');
		}
		$this->replyAddress = $replyAddress;
		return true;
	}
	
	/**
	 * Check if the sender is allowed and set it
	 * 
	 * @param  string $sender -> code of the desired sender
	 * @return string         -> true if all ok or false if not
	 */	
	function set_sender($sender = ''){
		
		if ($this->debug){
			$this->logger->add('mailsender.class.php: Checking sender...', 'DEBUG');
		}
		
		$this->error['sender'] = false;
		
		if (!array_key_exists($sender, $this->allowed_senders)){
			if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Sender KO, "'.$sender.'" is not a valid sender', 'ERROR');
		    }		
		    $this->error['sender']  = true;
		    $this->sender =  null;
		    return false;
		}
		
		if ($this->islogger){
		    $this->logger->add('mailsender.class.php: Sender OK, setted to "'.$sender.'"');
		}
		$this->sender = $this->allowed_senders[$sender];
		return true;	    
	}
	
	/**
	 * Check if isset the desired enviroment, else denie any activity
	 * 
	 * @param string $enviroment -> code of the desired enviroment
	 * @return string            -> ws url of the desired enviroment
	 */
	function set_enviroment($enviroment = ''){
		
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Checking enviroment...', 'DEBUG');
		}
		
		$this->error['enviroment'] = false;
		
		if (!array_key_exists($enviroment, $this->allowed_enviroments)){
		    if ($this->islogger){
			    $this->logger->add('mailsender.class.php: Enviroment KO, "'.$enviroment.'" is not a valid enviroment', 'ERROR');
		    }
		    $this->error['enviroment'] = true;
		    $this->enviroment          = null;
		    return false;
		}		
		
		if ($this->islogger){
			$this->logger->add('mailsender.class.php: Enviroment OK, setted to "'.$enviroment.'"');
		}
		$this->enviroment = $this->allowed_enviroments[$enviroment];
		return true;
	}
	
	/**
	 * Function to get messages than convert array to string
	 * 
	 * @return string -> full XML to be send
	 */
	function get_messages(){

		//check that messages are not empty
		if (empty($this->messages)){
			if ($this->logger){
				$this->logger->add('mailsender.class.php: Get messages KO, variable messages is empty');
			}
			return false;
		}
		
		$messages = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:cor="http://www.gencat.cat/educacio/sscc/correu">
		    <soapenv:Body>
		        <cor:PeticioEnviament>
                    <idApp>'.$this->idApp.'</idApp>';
		
		//convert array to string
		$messages .= implode("", $this->messages);
		
		$messages .= '</cor:PeticioEnviament>
             </soapenv:Body>
        </soapenv:Envelope>';
	    if ($this->debug){
			$this->logger->add('mailsender.class.php: Send mail XML creation OK'."\n".'"<![CDATA['.$messages.']]>"', 'DEBUG');
		}
		
		//return string
		return $messages;
	}
	
	/**
	 * Function to take out wsdl and take out de portType that make php crash
	 * 
	 * @param string $url -> url where the class will take de wsdl file
	 * @return string     -> path to the local wsdl or false if failed
	 */
	private function get_wsdl($url = null){
        
		if ($this->debug){
			$this->logger->add('mailsender.class.php: Getting wsdl...', 'DEBUG');
		}
		
		//check if local wsdl exits
		$enviroment_code = array_keys($this->allowed_enviroments, $url);
		$current_file = dirname(__FILE__).'/wsdl/wsdl-'.$enviroment_code[0].'.wsdl';
		if (is_file($current_file)){
			if ($this->debug){
			    $this->logger->add('mailsender.class.php: Get WSDL OK, already exits', 'DEBUG');
			}
			return $current_file;
		}
		
		//check if $url is empty 
		if (empty($url)){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Get wsdl KO, $url is empty', 'ERROR');
			}
			return false;
		}
		
		//get wsdl
		if (!$curl=curl_init()){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Get wsdl KO, curl_init fails', 'ERROR');        
			}
			return false;
		}
	    curl_setopt($curl, CURLOPT_URL, $url.'?wsdl');     
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_HEADER, false);    
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);  
	    if (!$contents = curl_exec($curl)){
	    	if ($this->islogger){
	    		$this->logger->add('mailsender.class.php: Get wsdl KO, curl_exec fails', 'ERROR');
	    	}
	    	return false;
	    }
	    curl_close($curl);	    
	    if ($this->debug){
	    	$this->logger->add('mailsender.class.php: Get wsdl taked OK', 'DEBUG');
	    }
		
	    //takeout from <portType... to </portType>
	    if ($inipos = strpos($contents, '<portType')){
	    	$newcontents = substr($contents, 0, $inipos);
	    	$contents = substr($contents, $inipos);
	    	if ($endpos = strpos($contents, '</portType>')){
	    		$newcontents .= substr($contents, $endpos+11);
	    	}
	    }
	    if ($this->debug){
	    	$this->logger->add('mailsender.class.php: Get wsdl stripped OK', 'DEBUG');
	    }
		
	    //openfile to save the downloaded wsdl
		if (!$f = fopen($current_file, 'w+')){
			if ($this->islogger){
				$this->logger->add('mailsender.class.php: Get wsdl KO, imposible to open "wsdl-'.$enviroment_code[0].'.wsdl" file', 'ERROR');
			}
			return false;
		}
		
		if (!fwrite($f, $newcontents)){
		    if ($this->islogger){
				$this->logger->add('mailsender.class.php: Get wsdl KO, imposible to write in "wsdl-'.$enviroment_code[0].'.wsdl" file', 'ERROR');
			}
			return false;
		}
	    if ($this->debug){
	    	$this->logger->add('mailsender.class.php: Get wsdl saved OK', 'DEBUG');
	    }
		
	    if ($this->debug){
		    $this->logger->add('mailsender.class.php: Get WSDL OK', 'DEBUG');
		}
		
		return $current_file;
	}
	
// XTEC ************ ADDED -> Method to test the charset of the given string
// 2011.03.16 @mmartinez

	/**
	 * Get charset of the given string
	 * 
	 * @param  string $str -> string to test
	 * @return string      -> possible values: UTF_8, ISO_8859_1, ASCII
	 */
	private function get_charset ($str = ''){
		
		$c = 0;
	    $ascii = true;
	    for ($i = 0;$i<strlen($str);$i++) {
	        $byte = ord($str[$i]);
	        if ($c>0) {
	            if (($byte>>6) != 0x2) {
	                return 'ISO_8859_1';
	            } else {
	                $c--;
	            }
	        } elseif ($byte&0x80) {
	            $ascii = false;
	            if (($byte>>5) == 0x6) {
	                $c = 1;
	            } elseif (($byte>>4) == 0xE) {
	                $c = 2;
	            } elseif (($byte>>3) == 0x14) {
	                $c = 3;
	            } else {
	                return 'ISO_8859_1';
	            }
	        }
	    }
	    return ($ascii) ? 'ASCII' : 'UTF_8';
	}
//*********** END

// XTEC ************ ADDED -> Method to get the mime type of a given file
// 2011.03.16 @mmartinez
    /**
     * 
     * Method to get the mime type of a given file
     * 
     * 
     * 
     * @param string $fn -> absolute path to the file
     * @return string    -> mime type of the given file
     */
	function get_mime_type($fn){
		
		static $mime_magic_data;

      #-- fallback
      $type = false;

      #-- read in first 3K of given file
      if (is_dir($fn)) {
         return("httpd/unix-directory");
      }
      elseif (is_resource($fn) || ($fn = @fopen($fn, "rb"))) {
         $bin = fread($fn, $maxlen=3072);
         fclose($fn);
      }
      elseif (!file_exists($fn)) {
         return false;
      }
      else {
         return("application/octet-stream");   // give up
      }

      #-- use PECL::fileinfo when available
      if (function_exists("finfo_buffer")) {
         if (!isset($mime_magic_data)) {
            $mime_magic_data = finfo_open(MAGIC_MIME);
         }
         $type = finfo_buffer($bin);
         return($type);
      }
      
      #-- read in magic data, when called for the very first time
      if (!isset($mime_content_type)) {
         if (file_exists($fn = ini_get("mime_magic.magicfile")) || file_exists($fn = "./lib/magic.mime") || file_exists($fn = "../lib/magic.mime"))
         {
            $mime_magic_data = array();

            #-- read in file
            $f = fopen($fn, "r");
            $fd = fread($f, 1<<20);
            fclose($f);
            $fd = str_replace("       ", "\t", $fd);

            #-- look at each entry
            foreach (explode("\n", $fd) as $line) {

               #-- skip empty lines
               if (!strlen($line) or ($line[0] == "#") or ($line[0] == "\n")) {
                  continue;
               }

               #-- break into four fields at tabs
               $l = preg_split("/\t+/", $line);
               @list($pos, $typestr, $magic, $ct) = $l;
#print_r($l);

               #-- ignore >continuing lines
               if ($pos[0] == ">") {
                  continue;
               }
               #-- real mime type string?
               $ct = strtok($ct, " ");
               if (!strpos($ct, "/")) {
                  continue;
               }

               #-- mask given?
               $mask = 0;
               if (strpos($typestr, "&")) {
                  $typestr = strtok($typestr, "&");
                  $mask = strtok(" ");
                  if ($mask[0] == "0") {
                     $mask = ($mask[1] == "x") ? hexdec(substr($mask, 2)) : octdec($mask);
                  }
                  else {
                     $mask = (int)$mask;
                  }
               }

               #-- strip prefixes
               if ($magic[0] == "=") {
                  $magic = substr($magic, 1);
               }

               #-- convert type
               if ($typestr == "string") {
                  $magic = stripcslashes($magic);
                  $len = strlen($magic);
                  if ($mask) { 
                     continue;
                  }
               }
               #-- numeric values
               else {

                  if ((ord($magic[0]) < 48) or (ord($magic[0]) > 57)) {
#echo "\nmagicnumspec=$line\n";
#var_dump($l);
                     continue;  #-- skip specials like  >, x, <, ^, &
                  }

                  #-- convert string representation into int
                  if ((strlen($magic) >= 4) && ($magic[1] == "x")) {
                     $magic = hexdec(substr($magic, 2));
                  }
                  elseif ($magic[0]) {
                     $magic = octdec($magic);
                  }
                  else {
                     $magic = (int) $magic;
                     if (!$magic) { continue; }   // zero is not a good magic value anyhow
                  }

                  #-- different types               
                  switch ($typestr) {

                     case "byte":
                        $len = 1;
                        break;
                        
                     case "beshort":
                        $magic = ($magic >> 8) | (($magic & 0xFF) << 8);
                     case "leshort":
                     case "short":
                        $len = 2;
                        break;
                     
                     case "belong":
                        $magic = (($magic >> 24) & 0xFF)
                               | (($magic >> 8) & 0xFF00)
                               | (($magic & 0xFF00) << 8)
                               | (($magic & 0xFF) << 24);
                     case "lelong":
                     case "long":
                        $len = 4;
                        break;

                     default:
                        // date, ldate, ledate, leldate, beldate, lebelbe...
                        continue;
                  }
               }
               
               #-- add to list
               $mime_magic_data[] = array($pos, $len, $mask, $magic, trim($ct));
            }
         }
//echo "mime_magic_data = "; print_r($mime_magic_data);
      }
      
      
      #-- compare against each entry from the mime magic database
      foreach ($mime_magic_data as $def) {

         #-- entries are organized as follows
         list($pos, $len, $mask, $magic, $ct) = $def;
         
         #-- ignored entries (we only read first 3K of file for opt. speed)
         if ($pos >= $maxlen) {
            continue;
         }

         $slice = substr($bin, $pos, $len);
         #-- integer comparison value
         if ($mask) {
            $value = hexdec(bin2hex($slice));
            if (($value & $mask) == $magic) {
               $type = $ct;
               break;
            }
         }
         #-- string comparison
         else {
            if ($slice == $magic) {
               $type = $ct;
               break;
            }
         }
      }// foreach
      
      #-- built-in defaults
      if (!$type) {
      
         #-- some form of xml
         if (strpos($bin, "<"."?xml ") !== false) {
            return("text/xml");
         }
         #-- html
         elseif ((strpos($bin, "<html>") !== false) || (strpos($bin, "<HTML>") !== false)
         || strpos($bin, "<title>") || strpos($bin, "<TITLE>")
         || (strpos($bin, "<!--") !== false) || (strpos($bin, "<!DOCTYPE HTML ") !== false)) {
            $type = "text/html";
         }
         #-- mail msg
         elseif ((strpos($bin, "\nReceived: ") !== false) || strpos($bin, "\nSubject: ")
         || strpos($bin, "\nCc: ") || strpos($bin, "\nDate: ")) {
            $type = "message/rfc822";
         }
         #-- php scripts
         elseif (strpos($bin, "<"."?php") !== false) {
            return("application/x-httpd-php");
         }
         #-- plain text, C source or so
         elseif (strpos($bin, "function ") || strpos($bin, " and ")
         || strpos($bin, " the ") || strpos($bin, "The ")
         || (strpos($bin, "/*") !== false) || strpos($bin, "#include ")) {
            return("text/plain");
         }

         #-- final fallback
         else {
            $type = "application/octet-stream";
         }
      }
      
      

      #-- done
      return $type;		
	}
//*********** END

    /**
	 * Check if isset the logger class, else denie any log
	 * 
	 * @param bool $debug  -> activate debug mode or not
	 * @param string $path -> absolute path where file log wil be stored
	 * @return bool        -> true if logger could be loaded or false if not
	 */
//XTEC*********** MODIFIED -> Add parameter to define $path
// 2011.04.01 @mmartinez
	private function get_logger($debug = false, $path = ''){
//*********** ORIGINAL
	//private function get_logger($debug = false){
//*********** END
		
		if (!@include_once('log4p.class.php')){
		    $this->logger = false;
		    $this->debug  = false;
		    return false;
		}		
//XTEC ************ ADDED -> Just get actuall path when there isn't any path defined
// 2011.04.01 @mmartinez
		//set default path location
		if (empty($path)){
			//get actuall path
	  		$pwd = dirname(__FILE__);
	  		$pwd = str_replace('\\', '/', $pwd);
	  		//go one folder up
	  		$pwdarray = explode ('/', $pwd);
	  		$pwd = "";
		    for ($i=0;$i<count($pwdarray)-1;$i++){
	  			$pwd .= $pwdarray[$i].'/';
	  		}
			$path = $pwd.'log/mailsender.log';
		}
//************* END

// XTEC *********** MODIFIED -> Take the full path recived
// 2011.04.01 @mmartinez
		$this->logger = new log4p(true, $path);
//*********** ORIGINAL
		//$this->logger = new log4p(true, $pwd.'log/mailsender.log');*/
//*********** END

		if ($debug){		    	
		    $this->debug = $debug;
		}
		return true;
	}
}
?>
