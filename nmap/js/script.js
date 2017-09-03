var searchText;
var textFetch;
var addressObject;
var callMarkerInit;
var callFilter;
var reloadPage;

/*
The function below performs the fetching of the wiki data using the API. This function is called when 
the user clicks on the elements shown in the list.
*/
function wiki(address, object) {
    var $wikiUrl = "http://en.wikipedia.org/w/api.php?action=opensearch&search=" + address + "&format=json&callback=wikiCallback";
    console.log(object);
    $.ajax({
        url: $wikiUrl,
        dataType: "jsonp",
    }).done(function (result) {
        object.wikiContent = result[2][0];
        object.wikiUrl = result[3][0];
    }).fail(function (err) {
        alert("Wikipedia API error, Please Check URL and reload the page.");
    });
}


/*
The function below updates the MAP as per the click made by the user. This function basiclly performs
the filtering of markers wiping out all the marker which doesn't match the clicked DOM element.
*/

function changeMap(clickedElement) {
    markerLocs.positions.forEach(function (value) {
        if (value.id === clickedElement) {
            value.markerRef.setMap(null);
        }
    });

    return;
}

function populateList(viewModel) {
    viewModel.addressObject().forEach(function (value) {
        value.isVisible(true); //Restores the visibility of the DOM element(if any).
    });
}




/*
The following function below is designed to perform the functionality after the search button is clicked 
by the user. As we have "value+[1-5]" type variables storing the addresses, we can access them at the line
37. Rest the append() function puts the element at the required place at which the the element can be clicked
to perform the filter on the map.
*/
function searchButton(viewModel) {
    var searchString;
    if (viewModel.searchText() === '') {
        initMap(map);
        populateList(viewModel);
        return;
    }
    var str = viewModel.searchText().toLowerCase();
    viewModel.addressObject().forEach(function (value) {
        searchString = value.address.toLowerCase();
        if (searchString.search(str) === -1) {

            value.isVisible(false); //If there is not a match then set the visibility to false.
            changeMap(value.idVal);
        }

    });


}

$(document).ready(function () {



    function viewModel() {
        var self = this;
        self.searchText = ko.observable(''); //This observes the textField if any text is input in the textField.
        self.reloadPage = function () {
            location.reload();
        };

        self.addressObject = ko.observableArray([{
                address: "Nirala Eden Park",
                idVal: "1",
                isVisible: ko.observable(true)
            },
            {
                address: "St, Teresa School",
                idVal: "2",
                isVisible: ko.observable(true)
            },
            {
                address: "Aditya Mall Indirapuram",
                idVal: "3",
                isVisible: ko.observable(true)
            },
            {
                address: "Gym",
                idVal: "4",
                isVisible: ko.observable(true)
            },
            {
                address: "Connought Place",
                idVal: "5",
                isVisible: ko.observable(true)
            }
        ]);

        self.callMarkerInit = function (adObj) { //click binding passes the current object "foreach" binding is referring to.
            markerInit(adObj.idVal, false);
        };

        self.callFilter = function (viewModel) {
            searchButton(viewModel);
        };

    }




    ko.applyBindings(new viewModel());

});