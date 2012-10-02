<?php
 /**
  * This class takes, process, save and show log during the live of the object monitored
  * 
  * 
  * @author IECISA @mmartinez
  * @version 1.1
  * 
  */

  class log4p{
  	
  	/**
  	 * Variables to use
  	 */
  	private $log = array(), $savetofile,$savetofilepath;
  	
  	/**
  	 * Class constructor
  	 * 
  	 * @param bool $savetofile -> set the functionality savetofile on or off
  	 * @param string $savetofilepath -> path and file name where the log have to be saved when $state is set to true
  	 */
  	function __construct($savetofile = false, $savetofilepath = ''){
  		$this->savetofile = $this->loadsavetofile($savetofile, $savetofilepath);
  	}
  	
  	/**
  	 * Class destructor
  	 * 
  	 * Used to close de file pointer
  	 */
  	function __destruct(){
  		$this->add('log4p.class.php: trying to close file log pointer', 'DEBUG');
  		if (!fclose($this->filelogpointer)){
  			$this->add('Logger: trying to close file log pointer failed');
  		}
  		
  		$this->savetofile = false;
  		$this->add('log4p.class.php: file log closed');
  	}
  	
  	/**
  	 * Add entry to the log
  	 * 
  	 * @param string $str  -> log entry text
   	 * @param string $type -> posible values ERROR, WARNING, INFO
  	 */
  	function add ($str, $type = 'INFO*'){
  		//alowed type values
  		$types_allowed = array('ERROR', 'WARNING', 'INFO*', 'DEBUG');
  		
  		if (!in_array($type, $types_allowed)){
  		    $type = 'UNKNOWN';	
  		}
  		
  		//add log to our variable
  		$this->log[] = date('[Y-m-d H:i:s] ').'   *'.$type.'*   '.$str;
  		
  		//save log to file if its switched on
  		if ($this->savetofile){
  			$this->addtofile($this->log[count($this->log)-1]);
  		}
  		
  		return;
  	}
  	
  	/**
  	 * Save log entry in a file
  	 * 
  	 * @param string $str       -> log entry text
  	 * @param string $delimiter -> characters used to diference one line from other
  	 */
  	private function addtofile ($str = '', $delimiter = "\n"){
  		
  		//check if parameter is not empty
  		if (empty($str)){
  			return false;
  		}
  		
  	    //save in file
  		if (!fwrite($this->filelogpointer, $str.$delimiter)){
  			$this->savetofile = false;
  			$this->add('log4p.class.php: addtofile cant write in log file. Save to file has been switch to off.', 'ERROR');
  			return false;
  		}
  		
  		return true;
  	}
  	
  	/**
  	 * Convert log array to a string using the defined delimiter
  	 * 
  	 * @param  string $delimiter -> characters used to diference one line from other
  	 * @return string            -> string with all the entries in log separated by the delimeter
  	 */
  	function get_log ($delimiter = '\n'){
  		
  		if (empty($this->log)){
  			return false;
  		}
  		
  		return implode($delimiter, $this->log);
  		
  	}
  	
  	/**
  	 * Function that put the saver on or off if savetofilepath exits and is writable
  	 * 
  	 * @param  bool   $state          -> set the function savetofile on or off
  	 * @param  string $savetofilepath -> path and file name where the log have to be saved when $state is set to true
  	 * @param  string $delimiter      -> characters used to diference one line from other
  	 * @return bool                   -> true if saver could be switched to on or false if not
  	 */
  	function loadsavetofile ($state = false, $savetofilepath = '', $delimiter = "\n"){
  		
  		//check if parameters are set to true and are correct
  		if ($state == false || $savetofilepath == ''){
  			$this->add('log4p.class.php: its off becouse the parameters to switch it on sets it', 'WARNING');
  		    return false;
  		}
  		
  		//prepare savetofilepath parameter
  		$savetofilepath = str_replace('\\', '/', $savetofilepath); 		
  		$filepatharray = explode("/", $savetofilepath);
  		
// XTEC *********** DELETED -> Take out becouse now the receive the full path
// 2011.04.01 @mmartinez
		/*//get actuall path
  		$pwd = dirname(__FILE__);
  		$pwd = str_replace('\\', '/', $pwd);
  		//go one folder up
  		$pwdarray = explode ('/', $pwd);*/
//*********** END
  		$pwd = "";
  		
// XTEC ************ MODIFIED -> Parse the new full path
// 2011.04.01 @mmartinez
  		for ($i=0;$i<count($filepatharray)-1;$i++){
  			$pwd .= $filepatharray[$i].'/';
  		}
  	    $pwd = substr($pwd, 0, strlen($pwd)-1);
//************ ORIGINAL
		/*for ($i=0;$i<count($pwdarray)-1;$i++){
  			$pwd .= $pwdarray[$i].'/';
  		}*/
//*********** END

  		//check if exits log folder
// XTEC ************ MODIFIED -> Take the new full path
// 2011.04.01 @mmartinez
  		if (!is_dir($pwd)){
  			if (!mkdir($pwd)){
//*********** ORIGINAL
		/*if (!is_dir($pwd.$filepatharray[count($filepatharray)-2])){
  			if (!mkdir($pwd.$filepatharray[count($filepatharray)-2])){*/
//*********** END

  				$this->add('log4p.class.php: folder not exits and its imposible to create it', 'WARNING');
  				return false;
  			}
  		}
  		
  		//open or create log file 
// XTEC ************ MODIFIED -> Take the new full path
// 2011.04.01 @mmartinez
  		if (!$file = fopen($savetofilepath, "a+")){
//*********** ORIGINAL
		/*if (!$file = fopen($pwd.$savetofilepath, "a+")){*/
//*********** END
  			$this->add('log4p.class.php: file not exits and its imposible to create it', 'WARNING');
  			return false;
  		}
  		
  		//test if its posible to save in file
  		if (!fwrite($file, $delimiter)){
  			$this->add('log4p.class.php: imposible to write in log file. Save to file has been switch to off.', 'ERROR');
  			return false;
  		}
  		
  		$this->filelogpointer = $file;
  		$this->savetofile = true;
  		$this->add('log4p.class.php: loaded correctly in '.$savetofilepath);
  		return true;
  	}
  }
?>