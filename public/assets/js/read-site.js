var hasRead = 0;
window.addEventListener('load', function () {
	// Let's check if scribe has init'd
	/*if(!scribe) {
	    // Let the user know their browser has let them down
	    alert("Web Speech API is not supported by your browser :(");
	} else {

	        // our result callback method
	        var matchedWord = function(word) {
	          if(word.indexOf("create") >= 0)
	          {
	            alert('Create an event !');
	          }
	          else if(word.indexOf("info") >= 0)
	          {
	            alert('Show all info !');
	          }
	          else if(word.indexOf("map") >= 0)
	          {
	            if(word.indexOf("America") >= 0)
	            {
	              alert('YES !!');
	            }
	          }
	          else if(word.indexOf("read") >= 0)
	          {
	            	readPage();
	          }
	          else if(word.indexOf("pause") >= 0)
	          {
	          		pauseReading();
	          }
	          else if(word.indexOf("resume") >= 0)
	          {
	          		resumeReading();
	          }
	          else if(word.indexOf("restart") >= 0)
	          {
	          		restartReading();
	          }
	        }

		// add resultMatch callback
		scribe.addCallback('resultMatch',matchedWord);


	  scribe.enableInterimResult(true);
		scribe.enableInterimResultReturn(true);
		// tell scribe to start listening
		scribe.start();
	}*/

	var delta = 500;
	var lastKeypressTime = 0;

	var zoom_in = document.getElementById('zoom_in');
	zoom_in.addEventListener('click', zoomIn);

	var zoom_out = document.getElementById('zoom_out');
	zoom_out.addEventListener('click', zoomOut);
	
	document.body.addEventListener('keypress', function (event) {
		var code = event.which || event.keyCode;
		if (code == 82 || code == 114) 
		{
			var thisKeypressTime = new Date();
			if ( thisKeypressTime - lastKeypressTime <= delta )
			{
				restartReading();
				thisKeypressTime = 0;
			}
			else 
			{
				if(responsiveVoice.isPlaying()) 
				{
					console.log('pause');
					pauseReading();
				}
				else
				{
					if (!hasRead) 
					{
						console.log('read');
						readPage();
					}
					else
					{
						console.log('resume');
						resumeReading();
					}
				}
			}
			lastKeypressTime = thisKeypressTime;
		}
		else if (code == 43) 
		{
			zoomIn(zoom_in);
		}
		else if (code == 45)
		{
			zoomOut(zoom_out);
		}
	});

	function zoomIn(event) {
		var currentFontSize = $('html').css('font-size');
	    var currentFontSizeNum = parseFloat(currentFontSize, 10);
	    var newFontSize = currentFontSizeNum*1.2;
	    $('html').css('font-size', newFontSize);

	    if (event.target) {
	    	event.target.width *= 1.2;
	    }
	    else {
	    	event.width *= 1.2;
	    }
	   	
	   	var zoom_out = document.getElementById('zoom_out');
	   	zoom_out.width *= 1.2;
	}

	function zoomOut(event) {
		var currentFontSize = $('html').css('font-size');
    	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    	var newFontSize = currentFontSizeNum*0.8;
    	$('html').css('font-size', newFontSize);

    	if (event.target) {
	    	event.target.width *= 0.8;
	    }
	    else {
	    	event.width *= 0.8;
	    }
	   	var zoom_in = document.getElementById('zoom_in');
	   	zoom_in.width *= 0.8;
	}
});

function readPage() {
    responsiveVoice.speak($('#to-read').text(), "US English Female");
}

function pauseReading() {
	responsiveVoice.pause();
	hasRead = 1;
}

function resumeReading() {
	responsiveVoice.resume();
}

function stopReading() {
	responsiveVoice.cancel();
}

function restartReading() {
	stopReading();
	hasRead = 0;
	readPage();
}