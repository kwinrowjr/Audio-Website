
<?php
$name = addslashes($name);
$title = addslashes($title);
$query = mysqli_query($db, "SELECT * FROM post_data WHERE artist='$name' and title != '$title' ORDER BY id LIMIT 10") or die (mysqli_error());
$rowcount = mysqli_num_rows($query);

	if ($rowcount > 0 ) {
	if($rowcount = 0){
							
		echo "<h4>No results found</h4>";
		
	}else{

	echo "<h4>More Mixtapes from: " .$name. "</h4>";
		  /* if ($fname != "." && $fname != "..") */
		
		while ($row = mysqli_fetch_assoc($query)){	
			
			
		/* $query = mysql_query("SELECT * FROM post_data WHERE entry='$entry'") or die (mysql_error());
		if (mysql_num_rows($query)===1){	
		$result = mysql_fetch_assoc($query);
		$data = $result['entry'];  */
		
		echo "<div class='border_bottom'>";
		echo"<div id='bottompicborder1'>";
		echo "<img style='height:100px; width:100px;' src='/". $row['image'] ."' />";
		echo "</div>";
		
		
		echo "<div id='picborder2'>";
		echo '<a href="musicplay.php?tape=' . $row['entry'] . '">'. $row['artist']. ' - ' . $row['title']. '</a><br />';
		echo "</div>";
		echo"<br>";
		echo "</div>";
		}

}
}
		
		
		




?>


	

	
		
