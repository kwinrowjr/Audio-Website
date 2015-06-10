<!DOCTYPE html> 
<html>

	 <?php include 'header.php'; ?>	
<body>		
		<div id='wrapper' class='clearfix'>
		<br>
		
		
		

	

<?php
	
			$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysql_error());
		
			
				// find out how many rows are in the table 
		$sql = mysqli_query($db, "SELECT * FROM post_data WHERE type= 'mixtape'") or mysql_error();
		$result = mysqli_fetch_array($sql);
		$result = $result[0];

		// number of rows to show per page
		$rowsperpage = 20;
		// find out total pages
		$totalpages = ceil($result / $rowsperpage);

		// get the current page or set a default
		if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
		   // cast var as int
		   $currentpage = (int) $_GET['currentpage'];
		} else {
		   // default page num
		   $currentpage = 1;
		} // end if

		// if current page is greater than total pages...
		if ($currentpage > $totalpages) {
		   // set current page to last page
		   $currentpage = $totalpages;
		} // end if
		// if current page is less than first page...
		if ($currentpage < 1) {
		   // set current page to first page
		   $currentpage = 1;
		} // end if

		// the offset of the list, based on current page 
		$limit = 'LIMIT ' .($currentpage - 1) * $rowsperpage .',' .$rowsperpage;
		//$offset = ($currentpage - 1) * $rowsperpage;
		
		
		$query = mysqli_query($db, "SELECT * FROM post_data WHERE type= 'mixtape' ORDER BY id DESC LIMIT 15") or die (mysqli_error());
		  
		  /* if ($fname != "." && $fname != "..") */
		
		while ($row = mysqli_fetch_assoc($query)){	

	

		
		
		
			
			
		/* $query = mysql_query("SELECT * FROM post_data WHERE entry='$entry'") or die (mysql_error());
		if (mysql_num_rows($query)===1){	
		$result = mysql_fetch_assoc($query);
		$data = $result['entry'];  */
		
		echo "<div id='results_border'>";
	
		echo"<div id='inner_border1'>";
		echo "<img style='height:150px; width:150px;' src='". $row['image'] ."' />";
		echo "</div>";
		
		echo "<div id='inner_bordertop'>";
		echo '
		' . $row['artist']. ' - ' . $row['title']. '';
		echo "</div>";
		
		echo "<div id='inner_border2'>";
		echo '<a href="musicplayer.php?album=' . $row['download'] . '">[Download]</a><br />';
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

?>
		</div>
		
		<br>
		<br>
		
		<div class="footer">
		<?php include 'footer.php'; ?>
		</div>
		
		
</body>
</html>