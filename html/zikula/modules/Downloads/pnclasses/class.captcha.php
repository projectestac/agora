<?php

	/*
		Jax Captcha Class v1.o1 - Copyright (c) 2005, Andreas John aka Jack (tR)
		This program and it's moduls are Open Source in terms of General Public License (GPL) v2.0
	
		class.captcha.php 		(captcha class module)
		
		Last modification: 2006-08-30
	*/
	
	class captcha
	{
		var $session_key = null;
		var $temp_dir    = null;
		var $width       = 200;
		var $height      = 100;
		var $jpg_quality = 85;
		
		
		/**
		 * Constructor - Initializes Captcha class!
		 *
		 * @param string $session_key
		 * @param string $temp_dir
		 * @return captcha
		 */
		function captcha( $session_key, $temp_dir )
		{
			$this->session_key = $session_key;
			$this->temp_dir    = $temp_dir;
		}
		
				
		/**
		 * Generates Image file for captcha
		 *
		 * @param string $location
		 * @param string $char_seq
		 * @return unknown
		 */
		function _generate_image( $location, $char_seq )
		{
	
			$num_chars = strlen($char_seq);
			
			$img = imagecreatetruecolor( $this->width, $this->height );
			// creates two variables to store color
    		$background = imagecolorallocate($im, rand(180, 250), rand(180, 250), rand(180, 250));
			// fill image with bgcolor
    		imagefill($im, 0, 0, $background);
    		
			$blend = imagealphablending($img, 1);
			$trans = imagecolortransparent( $img );
			

			
			// generate background of randomly built ellipses
			for ($i=1; $i<=50; $i++)
			{
				$r = round( rand( 0, 127 ) );
				$g = round( rand( 0, 127 ) );
				$b = round( rand( 0, 127 ) );
				$color = imagecolorallocate( $img, $r, $g, $b );
				imagefilledellipse( $img,round(rand(0,$this->width)), round(rand(0,$this->height)), round(rand(0,$this->width/16)), round(rand(0,$this->height/4)), $color );	
			}
			
			$start_x = round($this->width / $num_chars);
			$max_font_size = $start_x;
			$start_x = round(0.5*$start_x);
			$max_x_ofs = round($max_font_size*0.9);
			
			// set each letter with random angle, size and color
			for ($i=0;$i<=$num_chars;$i++)
			{
				$r = round( rand( 127, 255 ) );
				$g = round( rand( 127, 255 ) );
				$b = round( rand( 127, 255 ) );
				$y_pos = ($this->height/2)+round( rand( 5, 20 ) );
				
				$fontsize = round( rand( 18, $max_font_size) );
				$color = imagecolorallocate( $img, $r, $g, $b);
				$presign = round( rand( 0, 1 ) );
				$angle = round( rand( 0, 25 ) );
				if ($presign==true) $angle = -1*$angle;
				
				ImageTTFText( $img, $fontsize, $angle, $start_x+$i*$max_x_ofs, $y_pos, $color, 'modules/Downloads/pnclasses/dutchb.ttf', substr($char_seq,$i,1) );
			}
			
			// create image file
			imagejpeg( $img, $location, $this->jpg_quality );
			//flush();
			imagedestroy( $img );
				
			return true;
		}
		
		
		/**
		 * Returns name of the new generated captcha image file
		 *
		 * @param unknown_type $num_chars
		 * @return unknown
		 */
		function get_pic( $num_chars=8 )
		{
			// define characters of which the captcha can consist
			$alphabet = array( 
				'A','B','C','D','E','F','G','H','I','J','K','L','M',
				'N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
				'1','2','3','4','5','6','7','8','9','0' );
				
			$max = sizeof( $alphabet );
			
			// generate random string
			$captcha_str = '';
			for ($i=1;$i<=$num_chars;$i++) // from 1..$num_chars
			{
				// choose randomly a character from alphabet and append it to string
				$chosen = rand( 1, $max );
				$captcha_str .= $alphabet[$chosen-1];
			}
			
			// generate a picture file that displays the random string
			if ( $this->_generate_image( $this->temp_dir.'/'.'cap_'.md5( strtolower( $captcha_str )).'.jpg' , $captcha_str ) )
			{
				$fh = fopen( $this->temp_dir.'/'.'cap_'.$this->session_key.'.txt', "w" );
				fputs( $fh, md5( strtolower( $captcha_str ) ) );
				return( md5( strtolower( $captcha_str ) ) );
			}
			else 
			{
				return false;
			}
		}
		
		/**
		 * check hash of password against hash of searched characters
		 *
		 * @param string $char_seq
		 * @param integer $cptid
		 * @param string $tmp_dir_path
		 * @return boolean
		 */
		function verify( $char_seq, $cptid, $tmp_dir_path )
		{
			$fh = fopen( $tmp_dir_path.'/'.'cap_'.$cptid.'.txt', "r" );
			$hash = fgets( $fh );
			
			if (md5(strtolower($char_seq)) == $hash)
				return true;
			else 
				return false;			
		}		
	}


?>