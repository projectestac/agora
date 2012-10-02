<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  resize images 
 *
 * @package      Downloads
 * @version      2.4
 * @author		 Sujay Bhowmick
 * @author       Torstein Hønsi
 * @author       Christoph Erdmann
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------


/**
* class ImageResizeClass
*
* { Description :- 
*	Class to Resize jpg and png image files using gd 2.0. 
* }
*/
class ImageResizeClass
{
	var $imageName;
	var $resizedImageName;
	var $newWidth;
	var $newHeight;
	var $src_image;
	var $dest_image;

	/**
	* Method ImageResizeClass::resizeImage()
	*
	* { Description :- 
	*	This method resizes the image.
	* }
	*/
	
	function resizeImage()
	{
		$old_x = imagesx($this->src_image);
		$old_y = imagesy($this->src_image);
		
		if($old_x > $old_y)
		{
			$thumb_w = $this->newWidth;
			$thumb_h = $old_y*($this->newHeight/$old_x);
		}
		
		if($old_x < $old_y)
		{
			$thumb_w = $old_x*($this->newWidth/$old_y);
			$thumb_h = $this->newHeight;
		}
		
		if($old_x == $old_y)
		{
			$thumb_w = $this->newWidth;
			$thumb_h = $this->newHeight;
		}
		
		$this->dest_image = imagecreatetruecolor($thumb_w, $thumb_h);
		
		imagecopyresampled($this->dest_image, $this->src_image, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
		
		//let's sharpen the image a little bit'
		//$this->UnsharpMask($this->dest_image,300,.3,2);
		
		// add a magnifier to the image
		$magnifier = imagecreatefrompng('modules/Downloads/pnimages/user/viewmag.png');

		imagealphablending($this->dest_image, true);

		imagecopy($this->dest_image, $magnifier, $thumb_w-25, $thumb_h-25, 0, 0, 22, 22);
		
		imagedestroy($magnifier);

	}
	
	

	function UnsharpMask($img, $amount, $radius, $threshold)
	{
		// Attempt to calibrate the parameters to Photoshop:
		if ($amount > 500) $amount = 500;
		$amount = $amount * 0.016;
		if ($radius > 50) $radius = 50;
		$radius = $radius * 2;
		if ($threshold > 255) $threshold = 255;
	
		$radius = abs(round($radius)); 	// Only integers make sense.
		if ($radius == 0) {	return $this->dest_image; imagedestroy($this->dest_image); break;	}
		$w = imagesx($this->dest_image); $h = imagesy($this->dest_image);
		$imgCanvas = $this->dest_image;
		$imgCanvas2 = $this->dest_image;
		$imgBlur = imagecreatetruecolor($w, $h);
	
		// Gaussian blur matrix:
		//	1	2	1		
		//	2	4	2		
		//	1	2	1		

		// Move copies of the image around one pixel at the time and merge them with weight
		// according to the matrix. The same matrix is simply repeated for higher radii.
		for ($i = 0; $i < $radius; $i++)
		{
			imagecopy	  ($imgBlur, $imgCanvas, 0, 0, 1, 1, $w - 1, $h - 1); // up left
			imagecopymerge ($imgBlur, $imgCanvas, 1, 1, 0, 0, $w, $h, 50); // down right
			imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 1, 0, $w - 1, $h, 33.33333); // down left
			imagecopymerge ($imgBlur, $imgCanvas, 1, 0, 0, 1, $w, $h - 1, 25); // up right
			imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 1, 0, $w - 1, $h, 33.33333); // left
			imagecopymerge ($imgBlur, $imgCanvas, 1, 0, 0, 0, $w, $h, 25); // right
			imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 1, $w, $h - 1, 20 ); // up
			imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 0, 0, $w, $h, 16.666667); // down
			imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 0, $w, $h, 50); // center
		}
		
		$imgCanvas = $imgBlur;	
				
		// Calculate the difference between the blurred pixels and the original
		// and set the pixels
		for ($x = 0; $x < $w; $x++)
		{ // each row
			for ($y = 0; $y < $h; $y++)
			{ // each pixel
				$rgbOrig = ImageColorAt($imgCanvas2, $x, $y);
				$rOrig = (($rgbOrig >> 16) & 0xFF);
				$gOrig = (($rgbOrig >> 8) & 0xFF);
				$bOrig = ($rgbOrig & 0xFF);
				$rgbBlur = ImageColorAt($imgCanvas, $x, $y);
				$rBlur = (($rgbBlur >> 16) & 0xFF);
				$gBlur = (($rgbBlur >> 8) & 0xFF);
				$bBlur = ($rgbBlur & 0xFF);

				// When the masked pixels differ less from the original
				// than the threshold specifies, they are set to their original value.
				$rNew = (abs($rOrig - $rBlur) >= $threshold) ? max(0, min(255, ($amount * ($rOrig - $rBlur)) + $rOrig)) : $rOrig;
				$gNew = (abs($gOrig - $gBlur) >= $threshold) ? max(0, min(255, ($amount * ($gOrig - $gBlur)) + $gOrig)) : $gOrig;
				$bNew = (abs($bOrig - $bBlur) >= $threshold) ? max(0, min(255, ($amount * ($bOrig - $bBlur)) + $bOrig)) : $bOrig;
					
				if (($rOrig != $rNew) || ($gOrig != $gNew) || ($bOrig != $bNew))
				{
					$pixCol = ImageColorAllocate($this->dest_image, $rNew, $gNew, $bNew);
					ImageSetPixel($this->dest_image, $x, $y, $pixCol);
				}
			}
		}
			return $this->dest_image;
		}
		
		
}

class ImageResizeJpeg extends ImageResizeClass
{
	/**
	* Method ImageResizeJpeg::ImageResizeJpeg()
	*
	* { Description :- 
	*	This method is a constructor for the ImageResizeJpeg (Subclass for JPEG image resizing).
	* }
	*/
	
	function ImageResizeJpeg($imageName, $resizedImageName, $newWidth, $newHeight)
	{
		$this->imageName = $imageName;
		$this->resizedImageName = $resizedImageName;
		$this->newWidth = $newWidth;
		$this->newHeight = $newHeight;
		// get the image
		$this->getResizedImageJpeg();
	}
	
	/**
	* Method ImageResizeJpeg::getResizedImage()
	*
	* { Description :- 
	*	This method puts the resized image in the specified destination.
	* }
	*/
	
	function getResizedImageJpeg()
	{
		$this->src_image = imagecreatefromjpeg($this->imageName);
		$this->resizeImage();
		imagejpeg($this->dest_image, $this->resizedImageName);
	}
}	

class ImageResizePng extends ImageResizeClass
{
	/**
	* Method ImageResizePng::ImageResizePng()
	*
	* { Description :- 
	*	This method is a constructor for the ImageResizePng (Subclass for Png image resizing).
	* }
	*/
	
	function ImageResizePng($imageName, $resizedImageName, $newWidth, $newHeight)
	{
		$this->imageName = $imageName;
		$this->resizedImageName = $resizedImageName;
		$this->newWidth = $newWidth;
		$this->newHeight = $newHeight;
		// get the image
		$this->getResizedImagePng();
	}
	
	
	/**
	* Method ImageResizePng::getResizedImage()
	*
	* { Description :- 
	*	This method puts the resized image in the specified destination.
	* }
	*/
	
	function getResizedImagePng()
	{
		$this->src_image = imagecreatefrompng($this->imageName);
		$this->resizeImage();
		imagepng($this->dest_image, $this->resizedImageName);
	}
}

class ImageResizeGif extends ImageResizeClass
{
	/**
	* Method ImageResizeGif::ImageResizeGif()
	*
	* { Description :- 
	*	This method is a constructor for the ImageResizeGif (Subclass for Gif image resizing).
	* }
	*/
	
	function ImageResizeGif($imageName, $resizedImageName, $newWidth, $newHeight)
	{
		$this->imageName = $imageName;
		$this->resizedImageName = $resizedImageName;
		$this->newWidth = $newWidth;
		$this->newHeight = $newHeight;
		// get the image
		$this->getResizedImageGif();
	}
	
	
	/**
	* Method ImageResizeGif::getResizedImage()
	*
	* { Description :- 
	*	This method puts the resized image in the specified destination.
	* }
	*/
	
	function getResizedImageGif()
	{
		$this->src_image = imagecreatefromgif($this->imageName);
		$this->resizeImage();
		imagegif($this->dest_image, $this->resizedImageName);
	}
}
?>