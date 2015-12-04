function initialize() {
	var earth = new WE.map('earth_div');
	WE.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
	  attribution: '© OpenStreetMap contributors'
	}).addTo(earth);

	var allEvents = [];

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

	console.log(typesEvents);
	/*var test = jQuery.parseJSON(typesEvents);
	console.log("tamer");*/


	var stringEarthquake = "Earthquake";
	var stringTsunami = "Tsunami";
	var stringStorm = "Storm";
	var stringFlood = "Flood";
	var stringAvalanche = "Avalanche";
	var stringVolcanicEruption = "Volcanic Eruption";
	var stringPlantExplosion = "Plant Explosion";
	var stringPollution = "Pollution";
	var stringAttack = "Attack";
	var stringHostageTaking = "Hostage Taking";

	// couleurs en fonction du type

	var couleurs = { stringEarthquake : '/assets/img/marker_brun.png', stringTsunami : '/assets/img/marker_blue.png', stringStorm :'/assets/img/marker_grisfonce.png', stringFlood : '/assets/img/marker_blueclair.png', stringAvalanche : '/assets/img/marker_grisclair.png', stringVolcanicEruption : '/assets/img/marker_redfonce.png', stringPlantExplosion : '/assets/img/marker_jaune.png', stringPollution : '/assets/img/marker_vert.png', stringAttack : '/assets/img/marker_red.png', stringHostageTaking : '/assets/img/marker_orange.png'};

	// objets : x = longitude, y = latitude

	// objets séisme

	var seisme1 = { x:48.49 , y:7.68, type: "Earthquake", ville: "London"};
	allEvents.push(seisme1);

	// objets tsunami

	var tsunami1 = { x: 26, y:-1, type: stringTsunami, ville: "Iran"};
	allEvents.push(tsunami1);

	// création des marqueurs après avoir reçu les objets

	var allMarkers=[];
	console.log(couleurs);

	for(var i=0; i<allEvents.length; i++) {
		typeEvent = allEvents[i].type;
		var marker = WE.marker([allEvents[i].x, allEvents[i].y], couleurs.typeEvent).addTo(earth);
    	marker.bindPopup("<b>" + allEvents[i].type + "</b><br>" + allEvents[i].ville, {maxWidth: 150, closeButton: true}).openPopup();	
		allMarkers.push(marker);
	}

	
}

// Après la réception de l'info 

// $("#myInput").trigger("change")

