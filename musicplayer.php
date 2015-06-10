<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-us"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en-us"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en-us"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-us"> <!--<![endif]-->

		

	<?php 

	$album = $_GET['album'];
	$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysqli_error());
	
	
	$query = mysqli_query($db, "SELECT artist, title, image FROM post_data WHERE entry='$album'") or die (mysqli_error());
	if (mysqli_num_rows($query)===1){	
		$result = mysqli_fetch_assoc($query);
		$name = $result['artist'];
		$title = $result['title'];
		$pic = $result['image'];
	}
	?>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta charset="utf-8">
	
	


	<title>Now Playing (album) <?php echo $name; ?> - <?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/jquery-ui.css" type="text/css" media="all">
	<link rel="stylesheet" href="style/mainStyle.css" />
	<link rel="stylesheet" href="style/searchbox.css" />
	<link rel="stylesheet" href="style/borders.css" /> 
	<!-- Date: 2011-04-08 -->
	<link rel="stylesheet" href="mp3player/player/css/styles.css" type="text/css" media="all" />
	<!-- <link rel="stylesheet" href="mp3player/player/css/blackandwhite.css" type="text/css" media="all" /> -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
	<script src="/js/libs/modernizr-2.6.2.min.js"></script>
	<script type="text/javascript" src="mp3player/player/mp3playerplugin.js"></script> 
</head>
<body>


	<div id="header">
	
	
	
	<div id="under_logo">
	
	<div class="pw-widget pw-size-medium pw-counter-show">			
	<a class="pw-button-facebook"></a>			
	<a class="pw-button-twitter"></a>			
	<a class="pw-button-email"></a>			
	<a class="pw-button-post"></a>		
</div>
<script src="http://i.po.st/static/v3/post-widget.js#publisherKey=8t7p3bn3ffluvtn8t21f&retina=true" type="text/javascript"></script>
	</div>
	
	<div id='search_container'>
			<form method="post" action="searchpagnation.php" id="searchbox2">
			<input name="term" type="text" size="40" placeholder="Search Site....." />
			</form>
		</div>

	<div id="logo">
	<img border="0" src="/style/logo.png" alt="logo" width="200" height="30">
	
	</div>
	
	<div class='nav'>
		<ul>
			
			<li class='active'><a href='index.php'>Home</a></li>
			<li class='active'><a href='albums.php'>Albums</a></li>
			<li class='active'><a href='mixtapes.php'>Mixtapes</a></li>
		</ul>
		</div>
	
	

	</div>
	
	
	

	
	<div id='wrapper' class='clearfix'>
	
	<br>
	

	<div id="musicinfo">
	<div id="picture">

	<?php echo "<img style='height:200px; width:200px;' src='".$pic."' />"; ?>

	</div>
	<div id="info">
	<?php echo $name; ?> -
	<?php echo $title; ?>
	</div>
	</div>


<div id="mp3Player" data-folder="music/<?php echo $album; ?>">

</div>

	
</div>
<footer class="footer">

<?php include 'footer.php'; ?>
</footer>


 </body>
</html>