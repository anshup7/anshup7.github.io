var map;
var markerLocs = new Object();
var loc = new Object();
var markerUnderAnimation = null;
var previousLoc = null;
var wikiData = new Object();


function handleError() {
    alert("The GMAP API is not loaded properly. You have not reached the google servers. Check URL");
}

function initMap() {


    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 28.6433,
            lng: 77.3827
        },
        zoom: 12
    });




    markerLocs = { // Add details here to see the marker in application
        positions: [{
                lat: 28.6433,
                lng: 77.3827,
                address: "F-805 Nirala Eden Park(My home)",
                id: "1",
                callWiki: function () {
                    wiki("building", this);
                }
            },
            {
                lat: 28.6469,
                lng: 77.3707,
                address: "St. Teresa school(I studied Here)",
                id: "2",
                callWiki: function () {
                    wiki("school", this);
                }
            },
            {
                lat: 28.6387,
                lng: 77.3606,
                address: "Aditya Mall(My movie Place)",
                id: "3",
                callWiki: function () {
                    wiki("shopping mall", this);
                }
            },
            {
                lat: 28.6403,
                lng: 77.3615,
                address: "My Gym Place",
                id: "4",
                callWiki: function () {
                    wiki("gym", this);
                }
            },
            {
                lat: 28.6469,
                lng: 77.2195,
                address: "Connought Place(My favorite Destination)",
                id: "5",
                callWiki: function () {
                    wiki("Connought Place", this);
                }
            }

        ]
    }

    markerLocs.positions.forEach(function (object) {

        var marker = new google.maps.Marker({
            position: {
                lat: object.lat,
                lng: object.lng
            },
            map: map,
            animation: google.maps.Animation.DROP,
            title: object.address
        });

        object.infoWindow = new google.maps.InfoWindow({
            content: object.address
        });

        object.markerRef = marker;
        object.callWiki();

        marker.addListener('click', function () {
            markerInit(object, true);
        });


    });



}



function markerInit(id, fromMarkerItself) {
    markerLocs.positions.forEach(function (values) {
        if (!fromMarkerItself) { //If call is from the line 73 above then there is no need to determine the object.
            if (id === values.id) {
                loc = values;
                return;
            }
        } else {
            loc = id; //If the call is from marker object itself then id is the object.
        }
    });
    var reference = loc.markerRef; //Stores the reference of the marker associated with list element.
    loc.infoWindow.setContent("<h3>" + loc.address + "</h3>" + "<p>" + loc.wikiContent + "</p>" + "<p><a href='" + loc.wikiUrl + "' target='_other'><i class='fa fa-search' aria-hidden='true'></i> Find More Here</a></p>");
    loc.infoWindow.open(map, reference);

    if (markerUnderAnimation !== null) {

        if (markerUnderAnimation === reference) { //If the clicked element is again clicked
            reference.setAnimation(null);
            loc.infoWindow.close(map, reference);
            markerUnderAnimation = null;
            previousLoc = null;
            return;
        }
        previousLoc.infoWindow.close(map, markerUnderAnimation); //close the infowindow for the previous marker.
        markerUnderAnimation.setAnimation(null);
        //Following code start the animation for current marker and opens the infowindow for it.
        reference.setAnimation(google.maps.Animation.BOUNCE);
        loc.infoWindow.setContent("<h3>" + loc.address + "</h3>" + "<p>" + loc.wikiContent + "</p>" + "<p><a href='" + loc.wikiUrl + "' target='_other'><i class='fa fa-search' aria-hidden='true'></i> Find More Here</a></p>");
        loc.infoWindow.open(map, reference);
        markerUnderAnimation = reference;
        previousLoc = loc;

    } else { //Basically, works if the marker is clicked for the first time.
        reference.setAnimation(google.maps.Animation.BOUNCE);
        markerUnderAnimation = reference;
        previousLoc = loc;
    }

}