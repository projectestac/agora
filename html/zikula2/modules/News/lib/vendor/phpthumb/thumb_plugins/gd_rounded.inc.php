<?php
//Based on http://911-need-code-help.blogspot.com/2009/05/generate-images-with-round-corners-on.html
//(Comments in spanish, sorry!)

class GdRoundedLib

{
/**
* Instance of GdThumb passed to this class
*
* @var GdThumb
*/
protected $parentInstance;
protected $currentDimensions;
protected $workingImage;
protected $newImage;
protected $options;
public

function createRounded($color_rounded = 'FFFFFF', $radio_rounded = 10, &$that)
{

// bring stuff from the parent class into this class...

$this->parentInstance = $that;
$this->currentDimensions = $this->parentInstance->getCurrentDimensions();
$this->workingImage = $this->parentInstance->getWorkingImage();

// Parametros

$this->color_rounded = $color_rounded;
$this->radio_rounded = $radio_rounded;
$canvas_width = $this->currentDimensions['width'];
$canvas_height = $this->currentDimensions['height'];

// Crea una imagen de forma cuadrada

$corner_image = imagecreatetruecolor($this->radio_rounded, $this->radio_rounded);

// Pinta la figura de negro

$clear_colour = imagecolorallocate($corner_image, 0, 0, 0);

// La pinta del color que seleccionamos

$solid_colour = imagecolorallocate($corner_image, hexdec(substr($this->color_rounded, 0, 2)) , hexdec(substr($this->color_rounded, 2, 2)) , hexdec(substr($this->color_rounded, 4, 2)));

// Crea la transparencia

imagecolortransparent($corner_image, $clear_colour);
imagefill($corner_image, 0, 0, $solid_colour);

// Crea un eclipse

imagefilledellipse($corner_image, $this->radio_rounded, $this->radio_rounded, $this->radio_rounded * 2, $this->radio_rounded * 2, $clear_colour);

// Copia y une la imagen

imagecopymerge($this->workingImage, $corner_image, 0, 0, 0, 0, $this->radio_rounded, $this->radio_rounded, 100);

// La da vuelta

$corner_image = imagerotate($corner_image, 90, 0);

// Copia y une la imagen

imagecopymerge($this->workingImage, $corner_image, 0, $canvas_height - $this->radio_rounded, 0, 0, $this->radio_rounded, $this->radio_rounded, 100);

// La da vuelta

$corner_image = imagerotate($corner_image, 90, 0);

// Copia y une la imagen

imagecopymerge($this->workingImage, $corner_image, $canvas_width - $this->radio_rounded, $canvas_height - $this->radio_rounded, 0, 0, $this->radio_rounded, $this->radio_rounded, 100);

// La da vuelta

$corner_image = imagerotate($corner_image, 90, 0);

// Copia y une la imagen

imagecopymerge($this->workingImage, $corner_image, $canvas_width - $this->radio_rounded, 0, 0, 0, $this->radio_rounded, $this->radio_rounded, 100);

imagedestroy( $corner_image );

// Devuelve la imagen

return $that;
}
}

$pt = PhpThumb::getInstance();
$pt->registerPlugin('GdRoundedLib', 'gd');
?>