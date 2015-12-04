function initialize() {
	earth = new WE.map('earth_div');
	WE.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
	  attribution: '© OpenStreetMap contributors'
	}).addTo(earth);

	/*allEvents = [];

	allMarkers=[];*/
}

// Après la réception de l'info 

// $("#myInput").trigger("change")

