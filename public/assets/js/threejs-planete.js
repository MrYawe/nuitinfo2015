function initialize() {
	earth = new WE.map('earth_div');
	WE.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
	  attribution: '© OpenStreetMap contributors'
	}).addTo(earth);

	allEvents = [];

	// Tous les types : 
	/*Natural disasters
		Earthquakes
		Tsunamis
		Storms
		Flood
		Avalanches
		Volcanic eruption
	Technological hazards
		Plant explosion
		Pollution
	Human hazards
		Attacks
		Hostage taking*/

	var intermEvents = eventsInterm.replace(/&quot;/g, '"');
	var typesEvents = jQuery.parseJSON(intermEvents);

	allMarkers=[];
}

// Après la réception de l'info 

// $("#myInput").trigger("change")

