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
	
	<div id='feature'>
		
			<a href="featureplay.php"><button id="last"  class="featurelogo">Play Now</button></a>
		
	</div>
	
		<h5>Updated Weekly</h5>	
		<br>
		<div id="box2">
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
		echo"<br>";
		echo "<div class='borderplay'>"; 
		echo '<a href="musicplay.php?tape=' . $row['entry'] . '">[Play]</a><br />';
		echo"</div>"; 
		
		echo "<div class='borderplay'>"; 
		echo '<a href="/download.php?file=downloads/' . $row['download'] . '">[Download]</a><br />';
		echo "</div>";
	
		echo "</div>";
		}


	

?>
		</div>
		
<div id="box4">
<div id="box">
		<h3><span>More Artist</span></h3>	
		</div>
		<?php include 'sidebar.php'; ?>
		
	
		
		<div id='adbox'>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- sidead -->
			<ins class="adsbygoogle"
			style="display:inline-block;width:300px;height:250px"
			data-ad-client="ca-pub-4771622754883323"
			data-ad-slot="9267068296"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		
	
		<div id="sidebartop1">
		<h3><span>My Favorite Sites</span></h3>	
		</div>
		<div id='sidebartop1'>
		<a href="http://www.worldstarhiphop.com/videos/">WorldStarHipHop</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="http://www.niketalk.com">Niketalk</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="http://www.freeonsmash.com">OnSmash</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="http://www.itsbx.com">Boxden</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="http://mediatakeout.com/">Mediatakeout</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="https://www.youtube.com/user/djvlad">DJ Vlad TV</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="https://www.reddit.com/user/djvlad">Reddit</a><br />
		</div>
		
		<div id='sidebartop1'>
		<a href="https://www.stackoverflow.com/">Stackoverflow</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="https://buckysroom.org/">Buckys Room</a><br />
		</div>
		<div id='sidebartop1'>
		<a href="http://www.tariqradio.com/">Tariq Radio<a><br />
		</div>
		<br />
		
		
		</div>
		
		</div>
			
		
		<div class="footer">
		<?php include 'footer.php'; ?>
		</div>
		
		
</body>
</html>