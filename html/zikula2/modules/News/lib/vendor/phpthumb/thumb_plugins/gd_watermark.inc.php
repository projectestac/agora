class GdWatermarkLib
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

public function createWatermark ($watermark, $that)
{
// bring stuff from the parent class into this class...
$this->parentInstance = $that;
$this->currentDimensions = $this->parentInstance->getCurrentDimensions();

$width = $this->currentDimensions['width'];
$height = $this->currentDimensions['height'];

$watermarksize = getimagesize($watermark);
$dest_x = $width - $watermarksize[0] - 5;
$dest_y = $height - $watermarksize[1] - 5;
//$watermark = imagecreatefrompng($watermark);

$pathinfo = pathinfo($watermark);
$var1 = $pathinfo['extension'];
$var2 = "png";
$var3 = "jpeg";
$var4 = "jpg";
$var5 = "gif";
if(strcasecmp($var1, $var2) == 0){
$watermark = @imagecreatefrompng($watermark);
}elseif((strcasecmp($var1, $var3) == 0) || (strcasecmp($var1, $var4) == 0)){
$watermark = @imagecreatefromjpeg($watermark);
}elseif(strcasecmp($var1, $var5) == 0){
$watermark = @imagecreatefromgif($watermark);
}

imagecopy($this->parentInstance->getOldImage(), $watermark, $dest_x, $dest_y, 0, 0, $watermarksize[0], $watermarksize[1]);

return $that;
}
}

$pt = PhpThumb::getInstance();
$pt->registerPlugin('GdWatermarkLib','gd');