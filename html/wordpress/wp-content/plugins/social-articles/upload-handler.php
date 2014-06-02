<?php
$uploaddir ='../../uploads/';
$result = 0;   
$sizekb=filesize($_FILES['userfile']['tmp_name'])/1024;
$fileNiceName = basename($_FILES['userfile']['name']);
$fileName = time().'-'.$fileNiceName;
$fileName = strtr( $fileName,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
$fileName = preg_replace("/[^A-Za-z0-9 _\.]/","",$fileName);   
$i = strrpos($fileNiceName,".");   
$l = strlen($fileNiceName);// – $i;
$l = $l - $i;
$ext = strtolower(substr($fileNiceName,$i+1,$l));

if($ext == 'jpg'|| $ext == 'png' || $ext == 'jpg'){    
    if($sizekb < 5120){
    	$uploadfile = $uploaddir . $fileName;		
    	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {		
            $response = array();
            list($imagewidth, $imageheight, $imageType) = getimagesize($uploadfile);                	
    		if($imagewidth < 50){
    		    $response['status'] = "error";
                $response['value'] = "";
    			echo json_encode($response);
    		}else{			
                $response['status'] = "ok";
                $response['value'] = $fileName;
                echo json_encode($response);
    		}		
    	} else {
    	    $response['status'] = "error";
            $response['value'] = "Error uploading the image. Please, try again later.";
            echo json_encode($response);
        }
    }else{
        $response['status'] = "error";
        $response['value'] = "";
        echo json_encode($response);
    }	
}else{    
    $response['status'] = "error";
    $response['value'] = "The extension must be jpg, png or gif";
    echo json_encode($response);
}	
?>