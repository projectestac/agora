<?php 
function recursive_remove_directory($directory, $empty=FALSE)
{
    if(substr($directory,-1) == '/')
       {
         $directory = substr($directory,0,-1);
     }
     if(!file_exists($directory) || !is_dir($directory))
     {
         return FALSE;
     }elseif(is_readable($directory))
     {
         $handle = opendir($directory);
         while (FALSE !== ($item = readdir($handle)))
         {
             if($item != '.' && $item != '..')
             {
                 $path = $directory.'/'.$item;
                if(is_dir($path)) 
                 {
                     recursive_remove_directory($path);
                 }else{
                     unlink($path);
                 }
             }
         }
         closedir($handle);
         if($empty == FALSE)
         {
             if(!rmdir($directory))
             {
                 return FALSE;
             }
         }
     }
     return TRUE;
}

function recurseCopy($src, $dst) 
{    
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurseCopy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}
