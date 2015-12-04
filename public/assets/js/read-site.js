window.addEventListener('load', function () {
	var hasRead = 0;
	var delta = 500;
	var lastKeypressTime = 0;

	var zoom_in = document.getElementById('zoom_in');
	zoom_in.addEventListener('click', function (event) {
		var currentFontSize = $('html').css('font-size');
	    var currentFontSizeNum = parseFloat(currentFontSize, 10);
	    var newFontSize = currentFontSizeNum*1.2;
	    $('html').css('font-size', newFontSize);

	   	event.target.width *= 1.2;
	   	var zoom_out = document.getElementById('zoom_out');
	   	zoom_out.width *= 1.2;
	});

	var zoom_out = document.getElementById('zoom_out');
	zoom_out.addEventListener('click', function (event) {
		var currentFontSize = $('html').css('font-size');
    	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    	var newFontSize = currentFontSizeNum*0.8;
    	$('html').css('font-size', newFontSize);

    	event.target.width *= 1.2;
	   	var zoom_in = document.getElementById('zoom_in');
	   	zoom_in.width *= 1.2;
	});
	
	document.body.addEventListener('keypress', function (event) {
		var code = event.which || event.keyCode;
		if (code == 82 || code == 114) {
			var thisKeypressTime = new Date();
			if ( thisKeypressTime - lastKeypressTime <= delta )
			{
				stopReading();
				hasRead = 0;
				readPage();
				thisKeypressTime = 0;
			}
			else 
			{
				if (!responsiveVoice.isPlaying()  && !hasRead) 
				{
					readPage();
				}
				else if(responsiveVoice.isPlaying()) 
				{
					pauseReading();
					hasRead = 1;
				}
				else if (!responsiveVoice.isPlaying() && hasRead)
				{
					resumeReading();
				}
			}
			lastKeypressTime = thisKeypressTime;
		}
	});

	function readPage() {
    	responsiveVoice.speak($('#to-read').text(), "US English Female");
    }

    function pauseReading() {
    	responsiveVoice.pause();
    }

    function resumeReading() {
    	responsiveVoice.resume();
    }

    function stopReading() {
    	responsiveVoice.cancel();
    }
});