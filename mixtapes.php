<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

	<?php include 'header.php'; ?>
<body>		
	<div id='wrapper' class='clearfix'>
		
	<br>		
			
	<div id='boxtop'>
	<h2>All Mixtapes</h2>


<?php

$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysqli_error());
		



	/*
	Get the letter user clicked on and assign it a variable 
	Always sanitize user's submited input !!!!!!!
	*/
	$sort = isset($_GET['firstLetter']) ? filter_input(INPUT_GET, 'firstLetter',FILTER_SANITIZE_URL) : "" ;
	if($sort == "") {
	$sql = mysqli_query($db, "SELECT * FROM post_data WHERE type= 'mixtape'");
		}else{
	$sql = mysqli_query($db, "SELECT * FROM post_data WHERE type= 'mixtape' and title LIKE '$sort%' ORDER BY title ASC");
		}
	for ($i = 48; $i < 58; $i++) {
    printf('<a href="%s?firstLetter=%s">%s</a> | ', $_SERVER['PHP_SELF'] , chr($i), chr($i));
    }
	for ($i = 65; $i < 91; $i++) {
		printf('<a href="%s?firstLetter=%s">%s</a> | ', $_SERVER['PHP_SELF'] , chr($i), chr($i));
		}
		printf('<a href="%s">ALL</a>  ', $_SERVER['PHP_SELF'] );
	echo "<br>" ;

	$rowcount = mysqli_num_rows($sql);

	echo"</div>";

	
	$rowsperpage = 20;
	// find out total pages
	$totalpages = ceil($rowcount / $rowsperpage);

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



	echo "<div id='boxtop'>";
	echo"<br>";
	echo "<h4><b style='color:#000000' >  $rowcount Result(s) Found</b></h4>" ;
	echo"<br>";
	echo"<br>";


	 
	
	
	$c = 1;
	if ($rowcount > 0 ) {
		
		$query = mysqli_query($db, "SELECT * FROM post_data WHERE title LIKE '$sort%' and type='mixtape' ORDER BY id DESC $limit");
		while ($row = mysqli_fetch_assoc($query)) {
		 
		echo "<div id='results_border'>";
	
		echo"<div id='inner_border1'>";
		echo "<img style='height:150px; width:150px;' src='/". $row['image'] ."' />";
		echo "</div>";
		
		echo "<div id='inner_bordertop'>";
		echo '
		' . $row['artist']. ' - ' . $row['title']. '';
		echo "</div>";
		
		echo "<div id='inner_border2'>";
		echo '<a href="musicplay.php?tape=' . $row['entry'] . '">[Play]</a><br />';
		echo"</div>";
		
		echo "<div id='inner_border2'>";
		echo '<a href="/download.php?file=downloads/' . $row['download'] . '">[Download]</a><br />';
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
		}
		
	echo "</div>";


	/******  build the pagination links ******/
	echo "<div id='pages'>";
	echo "<div class='pagination'>";
	
	// range of num links to show
	$range = 20;

	// if not on page 1, don't show back links
	if ($currentpage > 1) {
	   // show << link to go back to page 1
	  /*  echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1' ><<</a> ";
	   // get previous page num
	   $prevpage = $currentpage - 1;
	   // show < link to go back to 1 page
	   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage' ><</a> "; */
	} // end if 
	
	

	// loop to show links to range of pages around current page
	for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
	   // if it's a valid page number...
	   if (($x > 0) && ($x <= $totalpages)) {
		  // if we're on current page...
		  if ($x == $currentpage) {
			 // 'highlight' it but don't make a link
			  echo " <div class='pagination'>$x</div> ";
		  // if not current page...
		  } else {
			 // make it a link
			 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x' >$x</a> ";
		  } // end else
	   } // end if 
	} // end for
	

	
if (($currentpage != $totalpages)) {
	  /*  // get next page
	    $nextpage = $currentpage + 1;
		// echo forward link for next page 
	   echo " <a  href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage' >></a> ";
	   // echo forward link for lastpage
	   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages' >>></a> ";  */
	} // end if	
	// if not on last page, show forward and last page links        
	
	/****** end build pagination links ******/
	// end if

	 echo "</div>";	
	echo"</div>";
	
?>


</div>
	

		
		<div class="footer">
		<?php include 'footer.php'; ?>
		</div>
		
		
 </body>
</html>