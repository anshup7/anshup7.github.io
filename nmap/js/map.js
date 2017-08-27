var map;
var marker_locs = new Object();
var loc = new Object();
var marker_under_animation = null;
var previous_loc = null;

function initMap() {

    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 28.6433,
            lng: 77.3827
        },
        zoom: 12
    });




    marker_locs = { // Add details here to see the marker in application
        positions: [{
                lat: 28.6433,
                lng: 77.3827,
                address: "F-805 Nirala Eden Park(My home)",
                id: "1"
            },
            {
                lat: 28.6469,
                lng: 77.3707,
                address: "St. Teresa school(I studied Here)",
                id: "2"
            },
            {
                lat: 28.6387,
                lng: 77.3606,
                address: "Aditya Mall(My movie Place)",
                id: "3"
            },
            {
                lat: 28.6403,
                lng: 77.3615,
                address: "My Gym Place",
                id: "4"
            },
            {
                lat: 28.6469,
                lng: 77.2195,
                address: "Connought Place(My favorite Destination)",
                id: "5"
            }

        ]
    }

    marker_locs.positions.forEach(function (loc) {
        var marker = new google.maps.Marker({
            position: {
                lat: loc.lat,
                lng: loc.lng
            },
            map: map,
            animation: google.maps.Animation.DROP,
            title: loc.address
        });

        loc.infoWindow = new google.maps.InfoWindow({
            content: loc.address
        });

         

        loc.marker_ref = marker;
    });

}

function findMarkerContainer(id) {
    
    marker_locs.positions.forEach(function (values) {
		if(id === values.id) {
			objectContainer.object = values;
		}
	});

}

function markerInit (id) {
	        //findMarkerContainer(id);  //Find the associated property object of the Marker.
	        marker_locs.positions.forEach(function (values) {
							if(id === values.id) {
								loc = values;
								return;
							}
					});
	        var reference = loc.marker_ref;
            loc.infoWindow.open(map, reference);

            if (marker_under_animation !== null) {
            	
            	if(marker_under_animation === reference) {
            		reference.setAnimation(null);
            		loc.infoWindow.close(map, reference);
            		marker_under_animation = null;
            		previous_loc = null;
            		return;
            	}
            	previous_loc.infoWindow.close(map, marker_under_animation); //close the infowindow for the previous marker.
            	marker_under_animation.setAnimation(null);
            	//Following code start the animation for current marker and opens the infowindow for it.
            	reference.setAnimation(google.maps.Animation.BOUNCE);
            	loc.infoWindow.open(map, reference);
                marker_under_animation = reference;
                previous_loc = loc;

            } else { //Basically, works if the marker is clicked for the first time.
                reference.setAnimation(google.maps.Animation.BOUNCE);
                marker_under_animation = reference;
                previous_loc = loc;
            }

        }