<html>
<body>


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

// Automatically trigger the pop-up after 10 seconds

});
</script>

<style type="text/css">

.blackout {
background-color:#000;
opacity:.7;
filter:alpha(opacity=70);
height:100%;
width:100%;
position:fixed;
top:0;
left:0;
z-index:100;
display:none;
cursor:pointer;
}
.msgbox {
background-color:#ccc;
border:1px solid #ccc;
color:#000;
width:600px;
height:600px;
position:fixed;
top:20%;
left:15%;
border-radius:20px;
padding:10px;
z-index:101;
display:none;
margin-left: 20%;
overflow:auto;
}
.closeBox {
background-color:#CC0000;
color:#FFFFFF;
padding:8px;
float:right;
border-radius:3px;
cursor:pointer;
text-transform:uppercase;

}
</style>




<div class="blackout">
</div>
<div class="msgbox">
<div class="closeBox">
Close</div>
<br /><br /><br /><br />
<center>
	<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php $title = $_GET['tape'];	?>
	<title>Audio-Thirst.com Mixtape: <?php echo $title; ?></title>
	<meta name="description" content="Old and Forgotten or New and Buzzin' Mixtapes "/>
	<meta name="keywords" content="HTML, CSS, Music, Mixtapes, Free, Tracks, Download, Old, Rap, Hip Hop, Classics, audio, discography,<?php echo $title; ?> "/>
	<meta name="author" content="klwjr">	
	<link rel="stylesheet" href="/style/mainStyle.css" type="text/css"/>
	<link rel="stylesheet" href="/style/borders.css" type="text/css"/> 
	<link rel="stylesheet" href="/style/searchbox.css" type="text/css"/>
	<link rel="stylesheet" href="/style/pagnation.css" type="text/css"/>
	<link rel="stylesheet" href="/style/uploadfrom.css" type="text/css"/>
	<link rel="stylesheet" href="/style/table.css" type="text/css"/>
	<link rel="stylesheet" href="/style/player_range.css" type="text/css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />

  </head>
	
	
		


	
	
		<div id="box1">
		

		
<?php

$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysqli_error());
	
$tape = $_GET['tape'];	
$entry = $tape;
$page = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// $_SERVER['PHP_SELF']

include ( 'counter/counter.php');
addinfo($page, $entry);
	
$query = mysqli_query($db, "SELECT year, genre, artist, title, image, download, playlist FROM post_data WHERE entry='$tape'") or die (mysqli_error());
	if (mysqli_num_rows($query)===1){	
		$result = mysqli_fetch_assoc($query);
		$name = $result['artist'];
		$title = $result['title'];
		$year = $result['year'];
		$genre = $result['genre'];
		$pic = $result['image'];
		$dl = $result['download'];
		$tracks = $result['playlist'];
		
		
	}
$path = 'music/'.$tape.'/';
$dirArray = array();
 
if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
	$allowedExts = array("mp3");
	$temp = explode(".", $entry);
	$file_ext = end($temp);
        if (in_array($file_ext, $allowedExts)){
	$dirArray[] = $path.$entry;
	}
	}
	closedir($handle);
	}
	$indexCount	= count($dirArray);
	/* Print ("$indexCount files<br>\n"); */
	sort($dirArray);
	

libxml_disable_entity_loader(false);
$get = file_get_contents('playlist/'.$tracks);
$arr = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/playlist/'.$tracks.'');		

/* echo json_encode($arr->title); */





?>

<br /> 
<br />
<div id="mp3Player">

<div id="musicinfo1">

	<div id="picture1">
		<?php echo "<img style='height:125px; width:130px;' src='/".$pic."' />"; ?>
	</div>
	
	
</div>

	

 <div id="test_box">
    <audio id="music"></audio>

<!--	<div id="player_box"> -->
	<div id="info1">
	
	<?php echo $name; ?> -
	<?php echo $title; ?>
	<!-- <span> <?php echo $indexCount; ?> Tracks Found</span> -->
	</div>
	
<!--	</div> -->
	
	
	<!-- <div id="volume"></div><br>
  <div id="progressbar"></div><br> 
  <div id="playpause"></div> -->
	

 <div class="volume_box">
	<button id="last"  class="button"><img style='height:22px; width:22px;' src='/style/arrow-left.png'/></button>  
	<button id="next"  class="button"><img style='height:22px; width:22px;' src='/style/arrow-right.png'/></button>
    <button id="play"  class="button"><img style='height:22px; width:34px;' src='/style/play-button.png' /></button>
    <button id="pause"  class="button"><img style='height:22px; width:34px;' src='/style/Pause-Disabled-icon.png'/></button>

</div> 

<div class="sound_box">
	<div id="volume"></div>
</div>

<?php echo '<a href="/download.php?file=downloads/' .$dl. '">  <button class="dlbutton">Download</button>  </a><br />'; ?>	
</div>
</div>


<div id="player_box">
<div class="slider_bottom">	
	<div id="playpause"></div>	
  <div id="progressbar"></div><br> 
  <div id="playpause"></div>
</div>

	
	
<div id="info_2">
	<span id="play_info"></span>
	</div>	
</div>	
<br />
<div id="infobottom">
<?php echo $indexCount; ?> Tracks Found
</div>


<table id="mytable" cellspacing="0">

<tr>
 <th scope="col" abbr="Title">Title</th>
 <th scope="col" abbr="Title">Artist</th>
 <th scope="col" abbr="Download" class="nobg">Download</th>
</tr>

 

	          
	        

<script type="text/javascript">



	var title = <?php echo json_encode($arr->title); ?>; 
	var artist = <?php echo json_encode($arr->name); ?>;
	var songList = <?php echo json_encode($dirArray); ?>; 

	var i = 0;// current song index

    var audiocontainer = document.getElementById('mp3Player');
    var ae = document.getElementById('music');
	ae.src = songList[0];
	var infoDiv = document.getElementById('play_info');
    var btnLast = document.getElementById('last');
    var btnPlay = document.getElementById('play');
    var btnPause = document.getElementById('pause');
    var btnNext = document.getElementById('next'); 
	var volumeRange = document.getElementById('volume');
    var seekbar = document.getElementById('seekbar');
	
	
	$(function() {

  var $aud = $("#music"),
      $pp  = $('#playpause'),
      $vol = $('#volume'),
      $bar = $("#progressbar"),
      AUDIO= $aud[0];

  AUDIO.volume = 0.75;
  AUDIO.addEventListener("timeupdate", progress, false);

  function getTime(t) {
    var m=~~(t/60), s=~~(t % 60);
    return (m<10?"0"+m:m)+':'+(s<10?"0"+s:s);
  }

  function progress() {
    $bar.slider('value', ~~(100/AUDIO.duration*AUDIO.currentTime));
    $pp.text(getTime(AUDIO.currentTime));
  }

  $vol.slider( {
    value : AUDIO.volume*100,
    slide : function(ev, ui) {
      $vol.css({background:"hsla(180,"+ui.value+"%,50%,1)"});
      AUDIO.volume = ui.value/100; 
    } 
  });

  $bar.slider( {
    value : AUDIO.currentTime,
    slide : function(ev, ui) {
      AUDIO.currentTime = AUDIO.duration/100*ui.value;
    }
  });

  $pp.click(function() {
    return AUDIO[AUDIO.paused?'play':'pause']();
  });

});
	
	var download = <?php echo json_encode($dirArray); ?>; 
	 for (var b = 0; b < download.length; b++){
	 
		var index = b;
		document.write( '<tr><td><a href="#"  onclick="play( \''  + index + '\');">'+ title[index] +'</a></td><td>' + artist[index] + '</td><td><a href="download.php?file=downloads/'+ download[b] +'"><img style="height:25px; width:25px;" src="/style/Arrows-Down-icon.png "/></a></td></tr>'); 		
		}   
	
    ae.onplay = function () {
	
		/* 'Now playing:' + (i + 1) + ' / ' + songList.length + ' : ' + singles;  */
        infoDiv.innerHTML =  title[i];    /* ' + (i + 1) + ' / ' + songList.length + ' : */
    };  
    ae.onended = function () {
        next();
    };
    btnPlay.onclick = function () {
        //if (ae.paused)
        ae.play();
        //else ae.pause();
    };
    btnPause.onclick = function () {
        ae.pause();
    };
    btnLast.onclick = previous;
    btnNext.onclick = next;
    //ae.play(); //to start playing automatically when when page is loaded

    function previous() {
        i = (i > 0) ? i - 1 : songList.length - 1; // choose previous index
        ae.setAttribute("src", songList[i]);
        ae.play();
    }

    function next() {
		
		/*  i = (  songList.length - 1 > z) ? z += 1 : 0; // choose next index */
		i = ( i < songList.length - 1 ) ? parseInt(i) + 1  : '';
        ae.setAttribute("src", songList[i]);
         ae.play(); 
        
    }

	
	
	/*  for (var b = 0; b < songList.length; b++){
	 
		var index = b;
		document.write( '<a href="#"  onclick="play( \''  + index + '\');">'+ songList[index] +'</a><br >');   
		}    */
                             

	function play(index) {
		i = index;
		ae.setAttribute("src", songList[i]);
        ae.play();
    } 






 /* function song(entry){
	var audiocontainer = document.getElementById('mp3Player');
    var ae = document.getElementById('music');
	var infoDiv = document.getElementById('info');
	ae.src = entry;
    ae.play();
	
    p2.innerHTML="Now Playing: " + entry; 
	ae.onplay = function () {
	
		
       infoDiv.innerHTML = 'Now playing : ' + entry;
    };
	} */

	


</script>


</table>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<hr>
<br />
<br />

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
		echo"<div id='border1'>";
		echo "<img style='height:150px; width:150px;' src='/". $row['image'] ."' />";
		echo "</div>";
		
		
		echo "<div id='border2'>";
		echo '<a href="musicplay.php?tape=' . $row['entry'] . '">'. $row['artist']. ' - ' . $row['title']. '</a><br />';
		echo "</div>";
		echo"<br>";
		echo "</div>";
		}

}
}




?>



</div>

</center>
</div>

</body>
</html>