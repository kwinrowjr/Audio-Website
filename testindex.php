<!DOCTYPE html> 
<html>

	 <?php include 'header.php'; ?>	
<body>	
	
	<div id='wrapper' class='clearfix'>
		<div id="yearlogo">
		<div id="yeartop">
		Search by Year:
		</div>
		<?php
		$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysql_error());
		$query = mysqli_query($db, "SELECT DISTINCT year FROM post_data ORDER BY year ASC LIMIT 15") or die (mysqli_error());
	
	
		while ($row = mysqli_fetch_assoc($query)){	
		
		
		echo "<div id='yeartop'>";
		echo '<a href="/year_search.php?release=' . $row['year']. '">' . $row['year']. '</a><br />';
		echo "</div>";
	
		}
		
			echo "</div>";
		
		?>
		
		
	<div id='adbox'>
	
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- adtop2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:90px"
     data-ad-client="ca-pub-4771622754883323"
     data-ad-slot="6165497890"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	
	</div>

		
		<br>
		<script src="http://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">

//This is the function that closes the pop-up
function endBlackout(){
$(".blackout").css("display", "none");
$(".msgbox").css("display", "none");
}

//This is the function that starts the pop-up
function strtBlackout(){
$(".msgbox").css("display", "block");
$(".blackout").css("display", "block");
}

//Sets the buttons to trigger the blackout on clicks
$(document).ready(function(){
$("#btn1").click(strtBlackout); // open if btn is pressed
$(".blackout").click(endBlackout); // close if click outside of popup
$(".closeBox").click(endBlackout); // close if close btn clicked



});
</script>



		<div id="box25">
		<div id="mainbox">
		<h6>Recent Mixtapes</h6>	
		</div>
		<br>
		<br>
		<p> All mixtapes are available for download. Each mixtape track can be downloaded individually</p>
		<p> Each mixtape can also be streamed for free</p>
		
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
		
		echo "<div class='border'>";
		echo"<div id='border1'>";
		echo "<img style='height:150px; width:150px;' src='/". $row['image'] ."' />";
		echo "</div>";
		
		
		echo "<div id='border2'>";
		echo '
		' . $row['artist']. ' - ' . $row['title']. '';
		echo "</div>";
		echo"<br />";
	
		
		
		
		echo "<div class='borderplay'>"; 
		echo '<a href="musictest.php?tape=' . $row['entry'] . '">[Play]</a>'; 
		echo"</div>"; 
		
		echo "<div class='borderplay2'>"; 
		echo '<a href="/download.php?file=downloads/' . $row['download'] . '">[Download]</a><br />';
		echo "</div>";
	
		echo "</div>";
		}


	

?>
<div class="blackout">
</div>
<div class="msgbox">
<div class="closeBox">
Close</div>
<br /><br /><br /><br />
<center>
	<?php include 'musictest.php'; ?>	
</center>
</div>
	<img style='height:30px; width:900px;' src='/style/separator.png' />
	<div id="boxbottom">
	<div id="mainbox1">
		<h6>More Artist</h6>	
		</div>	
		<?php 

			$query = mysqli_query($db, "SELECT DISTINCT artist, image FROM post_data ORDER BY RAND() LIMIT 10");
			$rowcount = mysqli_num_rows($query);

			if ($rowcount > 0 ) {
			if($rowcount = 0){
							
			echo "<h5>No results found</h5>";
		
			}else{
			
			echo "<h5>More Artist</h5>";
		  /* if ($fname != "." && $fname != "..") */
		
			while ($row = mysqli_fetch_assoc($query)){	
			
			
		/* $query = mysql_query("SELECT * FROM post_data WHERE entry='$entry'") or die (mysql_error());
		if (mysql_num_rows($query)===1){	
		$result = mysql_fetch_assoc($query);
		$data = $result['entry'];  */
		
		echo "<div class='border_bottom'>";
		echo"<div id='border1'>";
		echo "<img style='height:150px; width:150px;' src='/". $row['image'] ."' />";
		echo "</div>";
		
		
		echo "<div id='border2bottom'>";
		echo '<a href="musicplay.php?tape=' . $row['entry'] . '">'. $row['artist']. '</a><br />';
		echo "</div>";
		echo"<br>";
		echo "</div>";
		}

}
}




?>
</div>
</div>

		
		</div>
			
		
		<div class="footer">
		<?php include 'footer.php'; ?>
		</div>
		
		
</body>
</html>
