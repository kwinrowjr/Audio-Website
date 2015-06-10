
<!DOCTYPE html>
<html>

	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php $title = $_GET['tape'];	?>
	<title>Audio-Thirst.com Mixtape: <?php echo $title; ?></title>
	<meta name="description" content="Old and Forgotten or New and Buzzin' Mixtapes "/>
	<meta name="keywords" content="HTML,CSS,Music,Mixtapes,Free,Tracks,Download,Old,Rap,Hip Hop,Classics,audio,discography,<?php echo $title; ?> "/>
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
	
  </head>
	
	<div id="header">
		<div id='search_container'>
			<form method="post" action="/search" id="searchbox2">
			<input name="term" type="text" size="40" placeholder="Search Site....." />
			</form>
		</div>
		
	<div id="under_logo">
	<div class="pw-widget pw-size-medium pw-counter-show">			
		<a class="pw-button-facebook"></a>			
		<a class="pw-button-twitter"></a>			
		<a class="pw-button-email"></a>			
		<a class="pw-button-post"></a>		
	</div>
		<script src="http://i.po.st/static/v3/post-widget.js#publisherKey=8t7p3bn3ffluvtn8t21f&retina=true" type="text/javascript"></script>
	</div>

	<div id="logo">
	<img border="0" src="/style/logotop.png" alt="logo" width="200" height="30">
	</div>

	
	<div id="navi">
	<div class='nav'>
		<ul>
			
			<li class='active'><a href='/index.php'><img style='height:24px; width:24px;' src='/style/home.png' /></a></li>
			<li class='active'><a href='/composer'>Artists</a></li>
			<li class='active'><a href='/tapes'>All Mixtapes</a></li>
			<li class='active'><a href='/most_views.php'>Most Viewed</a></li>
		</ul>
		</div>
	</div>
	
	
	

	</div>

	<body>	
		<div id='wrapper' class='clearfix'>
		<div id="box1">
		
	<div id="adbox">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- top banner small -->
	<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-4771622754883323"
     data-ad-slot="3888722296"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</div>
		
<?php

$db = mysqli_connect("localhost","kwinrow_admin","northboi23", "kwinrow_storage")or die (mysqli_error());
	
$tape = $_GET['tape'];	
$entry = $tape;
$page = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// $_SERVER['PHP_SELF']

include ( 'counter/counter.php');
addinfo($page, $entry);
	
$query = mysqli_query($db, "SELECT artist, title, image, download, playlist FROM post_data WHERE entry='$tape'") or die (mysqli_error());
	if (mysqli_num_rows($query)===1){	
		$result = mysqli_fetch_assoc($query);
		$name = $result['artist'];
		$title = $result['title'];
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
<div id="musicinfo">
	
	<div id="info">
	<?php echo $name; ?> -
	<?php echo $title; ?>
	
	</div>
	<div id="picture">

	<?php echo "<img style='height:200px; width:200px;' src='/".$pic."' />"; ?>
	
	</div>
	<h5> <?php echo $indexCount; ?> Tracks Found</h5>
	<?php echo '<h5><a href="/download.php?file=downloads/' .$dl. '">[Download]</a><br /></h5>'; ?>


</div>
<br />
<br />
	 
	

 <div class="mp3Player">
    <audio id="music"></audio>
	<br />
	<div id="player_box">
	
	<div id="info2">
	Now playing: <span id="play_info"></span>
	</div>
	<label id="lblTime"> 0:00:00 </label> 
	<div class="slider_bottom">
	<input type="range" step="any" id="seekbar" onchange="ChangeTheTime()"/>
	</div>
	</div>
	
	
	
	<br />
	<div class="volume_box">
	<button id="last"  class="button"><img style='height:28px; width:28px;' src='/style/arrow-left.png'/></button>  
	<button id="next"  class="button"><img style='height:28px; width:28px;' src='/style/arrow-right.png'/></button>
    <button id="play"  class="button"><img style='height:28px; width:40px;' src='/style/play-button.png' /></button>
    <button id="pause"  class="button"><img style='height:28px; width:40px;' src='/style/Pause-Disabled-icon.png'/></button>
	<button id="btnMute"  class="button" onclick="UnMuteNow()"><img style='height:28px; width:40px;' src='/style/listen.png'/></button> 
	<button id="btnMute"  class="button" onclick="MuteNow()"><img style='height:28px; width:40px;' src='/style/mute.png'/></button>
	<div class="slider">
	<input type="range" min="0" max="1" step="0.1" id="volume" value="1" onchange="ChangeVolume()"/>
	</div>
	</div>
	<br />
	
	
	
	
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
	
	
	        window.onload = function () {
          // (false is for bubbling and true is for event capturing)
          ae.addEventListener('timeupdate', UpdateTheTime, false);
          ae.addEventListener('durationchange', SetSeekBar, false);
          volumeRange.value = ae.volume;

        }
		

		$("#volume").slider({
    value : 75,
    step  : 1,
    range : 'min',
    min   : 0,
    max   : 100,
    slide : function(){
        var value = $("#volume").slider("value");
        document.getElementById("ae").volume = (value / 100);
    }
});
		
	   function ChangeVolume() {

           var myVol = volumeRange.value;

           ae.volume = myVol;

           if (myVol == 0) {

               ae.muted = true;

           } else {

               ae.muted = false;

           }

       }
	 function SetSeekBar() {

         seekbar.min = 0;
         seekbar.max = ae.duration;

     }

    // fires when seekbar is changed

	function ChangeTheTime() {
       ae.currentTime = seekbar.value;

   }
	 // executes when audio plays and the time is updated in the audio element, this writes the current duration elapsed in the label element

    function UpdateTheTime() {

           var sec = ae.currentTime;

           var h = Math.floor(sec / 3600);

           sec = sec % 3600;

           var min = Math.floor(sec / 60);

           sec = Math.floor(sec % 60);

           if (sec.toString().length < 2) sec = "0" + sec;

           if (min.toString().length < 2) min = "0" + min;

           document.getElementById('lblTime').innerHTML = h + ":" + min + ":" + sec;

 

           seekbar.min = ae.startTime;

           seekbar.max = ae.duration;

           seekbar.value = ae.currentTime;

       }


  // executes when Mute button is clicked

  function MuteNow() {
			
          ae.muted = true;
          volumeRange.value = 0;


  }
  
  function UnMuteNow(){
  

          ae.muted = false;

          volumeRange.value = ae.volume;
		  
		  //document.write("<img style='height:28px; width:40px;' src='/style/mute.png'/>");

  
  }

	
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

	
	$(function () {

    //Store frequently elements in variables
    var slider = $('#slider'),
        tooltip = $('.tooltip');

    //Hide the Tooltip at first
    tooltip.hide();

    //Call the Slider
    slider.slider({
        //Config
        range: "min",
        min: 1,
        value: 35,

        start: function (event, ui) {
            tooltip.fadeIn('fast');
        },

        change: function (event, ui) {
            var value = slider.slider('value');
            setVolumeImage(value);
        },

        //Slider Event
        slide: function (event, ui) { //When the slider is sliding

            var value = slider.slider('value');
            setVolumeImage(value);
            tooltip.css('left', value).text(ui.value); //Adjust the tooltip accordingly
        },

        stop: function (event, ui) {
            tooltip.fadeOut('fast');
        }
    });


    function setVolumeImage(value) {
        volume = $('ae.volume');
        if (value <= 5) {
            volume.css('background-position', '0 0');
        } else if (value <= 25) {
            volume.css('background-position', '0 -25px');
        } else if (value <= 75) {
            volume.css('background-position', '0 -50px');
        } else {
            volume.css('background-position', '0 -75px');
        }
    }
});

</script>


</table>
</div>

<div id="box4">
<div id="box">
<h3><span>More Mixtapes</span></h3>	
</div>
<?php include 'tracksidebar.php'; ?>

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
</div>
</div>

<div class="footer">
	<?php include 'footer.php'; ?>
</div>
		
</body>
</html>

