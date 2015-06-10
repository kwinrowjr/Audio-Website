<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"> 
	
	<?php include 'header.php'; ?>
	
	<div id='wrapper' class='clearfix'>
			
	
	<div id="editor">
	
		<br><legend>Artist</legend>
		
		<form action='upload.php' method="POST" enctype="multipart/form-data">
		  <input style="width:300px;" type='text' name='artist' placeholder='Enter Artist Name' maxlength="100"><br><br>
		  
		  <legend>Album</legend>
		   <input style="width:300px;" type='text' name='album' placeholder='Enter Mixtape or Album Title' maxlength="100" /><br><br>
		   
		   <legend>Year</legend>
		   <input style="width:300px;" type='text' name='year' placeholder='Enter Year Released' maxlength="100" /><br><br>
		   
		   <legend>Genre</legend>
		   <input style="width:300px;" type='text' name='genre' placeholder='Enter A Genre' maxlength="100" /><br><br>
		
			<legend>Entry</legend>
		   <input style="width:300px;" type='text' name='entry' placeholder='Enter A Genre' maxlength="100" /><br><br>
		   
		   <legend>Download</legend>
		   <input style="width:300px;" type='text' name='download' placeholder='Enter A Genre' maxlength="100" /><br><br>
		   
		   <legend>Playlist</legend>
		   <input style="width:300px;" type='text' name='playlist' placeholder='Enter A Genre' maxlength="100" /><br><br>
		   
		   <legend>Please Make a Selection:</legend>
		    <input type="radio"  name='music' value="Album"><legend>&nbsp;Album</legend><br>
		    <input type="radio"  name='music' value="Mixtape"><legend>&nbsp;Mixtape</legend><br><br>
		  
	
			 <legend>Upload Album Image</legend>
			 <div class="custom_file_upload">
			<input style="width:225px;" type="file" class="file" name="file">
			<div class="file_upload">
			<input type="submit" name="Submit" value=" Submit ">
		</div>
		</div>
	
		</form>
		
	
	</div>
	</div>
	
		<footer class="footer">
		<?php include 'footer.php'; ?>
		</footer>
		
	

</body>
</html>
