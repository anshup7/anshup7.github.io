var map;
var drawingManager;
var polygon;
var marker_locs;

// function loadStreetViewService(map, marker, infowindow) //the street view service function
// {
// 	var streetViewService = new google.maps.StreetViewService();
// 	var radius = 50;
// 	var position = marker.position
// 	streetViewService.getPanoramaByLocation(position, radius, function (data, status){
// 		if (status == google.maps.StreetViewStatus.OK) {
// 		  	var nearStreetViewLocation = data.location.latLng;
// 		  	var heading = google.maps.geometry.spherical.computeHeading(
// 			    nearStreetViewLocation, position);
// 			    infowindow.setContent('<div>' + marker.title + '</div><div id="pano"></div>');
// 		    var panoramaOptions = {
// 		      position: nearStreetViewLocation,
// 		      pov: {
// 		        heading: heading,
// 		        pitch: 30
// 		      }
// 		    }

// 	    var panorama = new google.maps.StreetViewPanorama(
//             document.getElementById('pano'), panoramaOptions);

// 		} else {
//               infowindow.setContent('<div>' + marker.title + '</div>' +
//                 '<div>No Street View Found</div>');
//           }

//     });
// }

function searchWithinPolygon(marker_locs)
{
	var latLng;
	var marker;

	marker_locs.positions.forEach(function (param) {
		latlng = {lat: param.lat, lng: param.lng};
		marker = param.marker_ref;
		if(google.maps.geometry.poly.containsLocation(latlng, polygon)) {
			marker.setMap(map);
		} else {
			marker.setMap(null);
		}
	});
}


function toggleDrawing(manager) 
{
	if(manager.map){
		manager.setMap(null);
		if(polygon) {
			polygon.setMap(null);
		}
	} else {
		manager.setMap(map);
	}
}

function initMap() 
{

	 map = new google.maps.Map(document.getElementById("map"), {
					center: {lat: 28.6433, lng: 77.3827},
					zoom: 12
				});

	 drawingManager = new google.maps.drawing.DrawingManager({
	 		drawingMode: google.maps.drawing.OverlayType.POLYGON,
	 		drawingControl: true,
	 		drawingControlOptions: {
	 			position: google.maps.ControlPosition.TOP_LEFT,
	 			drawingModes: [
	 					 google.maps.drawing.OverlayType.POLYGON
	 			]
	 		}
	   });
	 var styles = [
	 			{
	 				featureType: 'road.highway',
	 				elementType: 'geometry.fill',
	 				stylers: [
	 					 {color: 'green'}
	 				]
	 			}
	 ];

	 marker_locs = {  // Add details here to see the marker in application
	 	positions: [ 
	 	            {lat: 28.6433, lng: 77.3827, address: "F-805 Nirala Eden Park(My home)", id: "1"},
	 	            {lat: 28.6469, lng: 77.3707, address: "St. Teresa school(I studied Here)", id: "2"},
	 	            {lat: 28.6387, lng: 77.3606, address: "Aditya Mall(My movie Place)", id: "3"},
	 	            {lat: 28.6403, lng: 77.3615, address: "My Gym Place", id: "4"},
	 	            {lat: 28.6469, lng: 77.2195, address: "Connought Place(My favorite Destination)", id: "5"}

	 			   ]
	 }

	 marker_locs.positions.forEach(function(loc) {
			 	var marker = new google.maps.Marker({
			 	position: {lat: loc.lat, lng: loc.lng},
			 	map: map,
			 	styles: styles,
			 	mapTypeControl: false,
			 	animation: google.maps.Animation.DROP,
			 	title: loc.address
		 	}); 

			loc.infoWindow = new google.maps.InfoWindow({
	 						content: loc.address
	 						});

			marker.addListener('click', function() {
					loc.infoWindow.open(map, this);
					if(this.getAnimation() !== null) {
						 this.setAnimation(null);
					} else {
          				this.setAnimation(google.maps.Animation.BOUNCE);
        			  }

					});


			// loadStreetViewService(map, marker, loc.infoWindow);
			loc.marker_ref = marker;
	 });

	 // document.getElementById('toggle_drawing').addEventListener('click', function() {
	 // 	toggleDrawing(drawingManager);
	 // });

	 google.maps.event.addListener(drawingManager, 'overlaycomplete', function() {
	 	if(polygon){
	 		polygon.setMap(null);
	 	}

	 	drawingManager.setDrawingMode(null);
	 	polygon = event.overlay;
	 	polygon.setEditable(true);
	 	searchWithinPolygon(marker_locs);  //Sent the positions to this function for performing the search

	 	polygon.getPath().addListener('set_at', searchWithinPolygon);
	 	polygon.getPath().addListener('insert_at', searchWithinPolygon);
	 });
	 

	 // var infoWindow = new google.maps.InfoWindow({
	 // 	content: "I live in F-805 Nirala's Eden Park(201014)",
	 // });

	// marker.addListener('click', function() {
	// 	infoWindow.open(map, marker);
	// });
	//map.fitBounds(map.getBounds());
}