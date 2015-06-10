<!DOCTYPE html> 
<html>
<body>	
	<?php include 'header.php'; ?>
	
	<div id='wrapper' class='clearfix'>
			
			<h1>Albums are listed Alphabetically</h1>
	


<?php

$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysqli_error());
		


echo "<div id='box1top'>";
	/*
	Get the letter user clicked on and assign it a variable 
	Always sanitize user's submited input !!!!!!!
	*/
	$sort = isset($_GET['firstLetter']) ? filter_input(INPUT_GET, 'firstLetter',FILTER_SANITIZE_URL) : "" ;
	if($sort == "") {
	$sql = mysqli_query($db, "SELECT * FROM post_data ORDER BY title ASC ") ;
		}else{
	$sql = mysqli_query($db, "SELECT * FROM post_data WHERE title LIKE '$sort%' ORDER BY title ASC") ;
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



	
	echo"<br>";
	echo "<h4><b style='color:#000000' >  $rowcount Result(s) Found</b></h4>" ;
	echo"<br>";
	echo"<br>";

	echo"<table cellspacing=\"0\">";

	$c = 1;
	if ($rowcount > 0 ) {
		$query = mysqli_query($db, "SELECT * FROM post_data WHERE title LIKE '$sort%'ORDER BY id DESC $limit") ;
		while ($row = mysqli_fetch_assoc($query)) {
	 echo"<tr>";	  
      echo"<td>";
		/* echo"<img style='height:40px; width:40px;' src='". $row['image'] ."' />"; */
	  echo"gygygggygy";
	  echo"</td>";
	 
	   
	  echo"<td>";
	  echo '<a href="musicplayer.php?album=' . $row['entry'] . '">
		' . $row['artist']. ' - ' . $row['title']. '</a><br />';
	  echo"</td>";
    echo"</tr>";
			 
		}
		}
 
	echo"</table>";
	echo"</div>";

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

?>
</div>

	
</div>
		
		<div class="footer">
		<?php include 'footer.php'; ?>
		</div>
		
		
 </body>
</html>