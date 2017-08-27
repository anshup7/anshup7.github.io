var searchText;
var textFetch;
var value1;
var value2;
var value3;
var value4;
var value5;
var isVisible1;
var isVisible2;
var isVisible3;
var isVisible4;
var isVisible5;

var addressObject = [
    "Nirala Eden Park",
    "St, Teresa School",
    "Aditya Mall Indirapuram",
    "Gym",
    "Connought Place"
];

/*
The function below updates the MAP as per the click made by the user. This function basiclly performs
the filtering of markers wiping out all the marker which doesn't match the clicked DOM element.
*/

function changeMap(clicked_element) {
    marker_locs.positions.forEach(function (value) {
        if (value.id === clicked_element) {
            value.marker_ref.setMap(null);
        }
    });
}

function populateList() {
	var i = 1;
    addressObject.forEach(function (value) {
        window["value"+i] = value; //Updates the list item values of the DOM.
        window["isVisible"+i](true); //Restores the visibility of the DOM element(if any).
        i++;
    });
}


/*
The function below performs the fetching of the wiki data using the API. This function is called when 
the user clicks on the elements shown in the list.
*/
function wiki(address) {
    var $wiki_url = "http://en.wikipedia.org/w/api.php?action=opensearch&search=" + address + "&format=json&callback=wikiCallback";

    $.ajax({
        url: $wiki_url,
        dataType: "jsonp",
    }).done(function (result) {
        alert(result[2][0] + "\n Find more on the following link\n" + result[3][0]);
    }).fail(function (err) {
        alert("Wiki request Failed!, Please try again later");
        throw err;
    });
}



/*
The following function below is designed to perform the functionality after the search button is clicked 
by the user. As we have "value+[1-5]" type variables storing the addresses, we can access them at the line
37. Rest the append() function puts the element at the required place at which the the element can be clicked
to perform the filter on the map.
*/
function searchButton() {
    var count = 1;
    if(searchText() === '') {
    	initMap(map);
    	populateList();
    	return;
    }
    var str = searchText().toLowerCase();
    addressObject.forEach(function (value) {
    	value = value.toLowerCase();
        if (value.search(str) === -1) {

        	window["isVisible"+count](false); //If there is not a match then set the visibility to false.
        	changeMap(""+count+"");
        } 

        count++;
    });
}

$(document).ready(function () {

    function viewModel() {
        var self = this;
        var geo_address;
        self.searchText = ko.observable(''); //This observes the textField if any text is input in the textField.
        self.geocode = ko.observable('');
        //Below are the observables for values and visiblity of the DOM element representing the List.
        self.value1 = ko.observable('');
        self.value2 = ko.observable('');
        self.value3 = ko.observable('');
        self.value4 = ko.observable('');
        self.value5 = ko.observable('');
        self.isVisible1 = ko.observable(true);
        self.isVisible2 = ko.observable(true);
        self.isVisible3 = ko.observable(true);
        self.isVisible4 = ko.observable(true);
        self.isVisible5 = ko.observable(true);
        populateList(); // called to restore the DOM structure of the List-Box.

    }




    ko.applyBindings(viewModel);

});