<?php
$path = 'images/absen/';
if ($handle = opendir($path)) {
    $i=0;
    while (false !== ($file = readdir($handle))) { 
        $filelastmodified = filemtime($path . $file);
        //24 hours in a day * 3600 seconds per hour
        if((time() - $filelastmodified) > 24*3600*5)
        {
           
           if(file_exists($path.$file)) {
            $file_ext = pathinfo($path.$file, PATHINFO_EXTENSION);
			echo ($file_ext);
			echo $path.$file." ".$filelastmodified."<br>";
            $i++;
            unlink($path . $file);
               
           }
            
        }

    }
    echo $i;
    closedir($handle); 
}
?>