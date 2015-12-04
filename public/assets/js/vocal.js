// Let's check if scribe has init'd
console.log("ok");
if(!scribe) {
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

          }
          else if(word.indexOf("pause") >= 0)
          {

          }
          else if(word.indexOf("resume") >= 0)
          {

          }
          else if(word.indexOf("stop") >= 0)
          {

          }
        }

	// add resultMatch callback
	scribe.addCallback('resultMatch',matchedWord);


  scribe.enableInterimResult(true);
	scribe.enableInterimResultReturn(true);
	// tell scribe to start listening
	scribe.start();
}
