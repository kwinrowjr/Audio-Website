

<script type="text/javascript">
// Function to select next song
		function Next()
		 {
		  var oAudio = document.getElementById('myaudio');
		  var btn = document.getElementById('play');
		  var lb = document.getElementById('mylist');
		  var curfile= lb.value;
		  var count=lb.options.length
		  
		  //arrTexts = new Array();
		            if(curfile!=lb.options[count-2].value){
		  			for(i=0; i<lb.options.length; i++){
		   			//arrTexts[i] = lb.options[i].value;
		   			if(curfile==lb.options[i].value){
		   	 			//if(i!=lb.options.length){
			     			j=i+1;
		         			oAudio.src=lb.options[j].value;
			     			oAudio.play();
			     			lb.options[j].selected=true;
			     			btn.textContent = "Pause";
			 
			  			}
						}
						}
						else{
							window.alert("This is the last song");
							oAudio.pause();
			    			btn.textContent="Play";
			
			   				}			
					 		
			
	     }
		 }
		 
		 </script>