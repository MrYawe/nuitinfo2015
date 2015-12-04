if (annyang) {
  console.log('ok2');
  // Let's define our first command. First the text we expect, and then the function it should call
  var commands = {
    'Hello': function() {
      alert('WHAO');
    }
  };

  // Add our commands to annyang
  annyang.addCommands(commands);

  // Start listening. You can call this here, or attach this call to an event, button, etc.
  annyang.start();
}
