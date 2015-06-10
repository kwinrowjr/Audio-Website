
	


<?php

$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysqli_error());
		



	 
	
	

		
		$query = mysqli_query($db, "SELECT DISTINCT artist FROM post_data ORDER BY RAND() LIMIT 10");
		
	



		while ($row = mysqli_fetch_assoc($query)) {
		 
		echo "<div id='trackbar'>";
	
		/* echo"<div id='inner_border1'>";
		echo "<img style='height:150px; width:150px;' src='". $row['image'] ."' />";
		echo "</div>"; */
		
		echo "<div id='sidebartop'>";
		echo '<a href="/artist_search.php?artist=' . $row['artist']. '">' . $row['artist']. '</a><br />';
		echo "</div>";
		
		echo "</div>";
		
		
		
		
	
	
		
		
		}
		echo "<div id='sidebar'>";
		echo "<div id='sidebarbottom'>";
		echo '<a href="/artist.php">View All Artist</a><br />';
		echo "</div>";
		echo "</div>";
		
		
		




?>


	

	
		
