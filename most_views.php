<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

	<?php include 'header.php'; ?>
<body>		
	<div id='wrapper' class='clearfix'>
	<br>		
			
	<div id='boxtop'>
	<h2>Most Viewed Tapes</h2>
	<h4>The Top 15</h4>
	<br>

<?php

	$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysqli_error());


	$query2 = mysqli_query($db, "SELECT * FROM post_data, hits WHERE post_data.entry = hits.entry ORDER BY hits.count DESC LIMIT 15");
	while ($row = mysqli_fetch_assoc($query2)) {
	
	echo "<div id='results_border'>";
	
		echo"<div id='inner_border1'>";
		echo "<img style='height:150px; width:150px;' src='". $row['image'] ."' />";
		echo "</div>";
		
		echo "<div id='inner_bordertop'>";
		echo '
		' . $row['artist']. ' - ' . $row['title']. '';
		echo "</div>";
		
		echo "<div id='inner_border2'>";
		echo '<a href="musicplay.php?tape=' . $row['entry'] . '">[Play]</a><br />';
		echo"</div>";
		
		echo "<div id='inner_border2'>";
		echo '<a href="download.php?file=downloads/' . $row['download'] . '">[Download]</a><br />';
		echo"</div>";
		
		
		echo "<div id='inner_border2'>";
		echo 'Year Released:';
		echo $row['year'];
		echo"</div>";
		
		echo "<div id='inner_border2'>";
		echo 'Genre:';
		echo $row['genre'];
		echo"</div>";
		
		echo "</div>";
		}
		
		
	echo "</div>";
?>	
</div>


<div class="footer">
	<?php include 'footer.php'; ?>
</div>
	
</body>
</html>
	
	
	