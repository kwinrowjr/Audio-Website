


<?php 


		  
		$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysql_error());
		
			
				// find out how many rows are in the table 
		$sql = mysqli_query($db, "SELECT * FROM post_data WHERE type= 'album'") or mysql_error();
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
		
		
		$query = mysqli_query($db, "SELECT * FROM post_data WHERE type= 'album' ORDER BY id DESC LIMIT 12") or die (mysqli_error());
		  
		  /* if ($fname != "." && $fname != "..") */
		
		
		while ($row = mysqli_fetch_assoc($query)){	
			
			
		/* $query = mysql_query("SELECT * FROM post_data WHERE entry='$entry'") or die (mysql_error());
		if (mysql_num_rows($query)===1){	
		$result = mysql_fetch_assoc($query);
		$data = $result['entry'];  */
		
		echo "<div class='border'>";
		echo"<div id='border1'>";
		echo "<img style='height:200px; width:200px;' src='". $row['image'] ."' />";
		echo "</div>";
		
		
		echo "<div id='border2'>";
		echo '
		' . $row['artist']. ' - ' . $row['title']. '';
		echo "</div>";
		echo"<br>";
		echo "<div class='borderplay'>"; 
		echo '<a href="musicplayer.php?album=' . $row['entry'] . '">[Play]</a><br />';
		echo"</div>"; 
		echo "</div>";
		

		
		}
		
		
			
				
				
        
		

// $newstamp is the time for the latest file
// $newname is the name of the latest file
// print last mod.file - format date as you like  

          
/* print $newname . " - " . date( "Y/m/d", $newstamp);  */

	

?>
		
