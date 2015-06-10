






<?php
/*code created by Sliver
sliver85@gmail.com
This program is freeware, but please leave my name on it.*/
$dir="./music/Da Drought 3/";
if (is_dir($dir)) {
$fd = @opendir($dir);
while (($part = @readdir($fd)) == true) {
if ($part != "." && $part != "..") {
$file_array[]=$part;
}
}
if ($fd == true) {
closedir($fd);
}
}
sort($file_array);
reset($file_array);



for($i=0;$i<count($file_array);$i++) {
$npart=$file_array[$i];
if (strstr($npart,".mp3")) {
$name=str_replace(".mp3","",$npart);




/* echo '<tr><td>'; <a href="playlist.php?album=' .$npart. '"></a>';  */
echo'<a href="'.$npart.'">'.$name.'</a>';

/* echo '<audio controls>';
echo '<source src="/music/Da Drought 3/'.$npart.'" type="audio/mpeg">';
echo '</audio>'; */


   

      
	
     

echo'<br>';

}
}


?>





