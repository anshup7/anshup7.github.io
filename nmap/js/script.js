var searchText;
var textFetch;
var enableButton;
var value1;
var value2;
var value3;
var value4;
var value5;
//var arr = [];

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
	marker_locs.positions.forEach(function (value){
		if(value.id !== clicked_element.id) {
			value.marker_ref.setMap(null);
		}
	}); 
}

/*
The function below performs the fetching of the wiki data using the API. This function is called when 
the user clicks on the elements shown in the list.
*/
function wiki(address) 
{
   var $wiki_url = "http://en.wikipedia.org/w/api.php?action=opensearch&search="+address+"&format=json&callback=wikiCallback";

   $.ajax({
	  	url: $wiki_url,
	  	dataType: "jsonp",
	}).done(function(result) {
  		 alert(result[2][0]+"\n Find more on the following link\n"+result[3][0]);
	}).fail(function(err) {
  		alert("Wiki request Failed!, Please try again later") 
  		throw err;
	   })
};

/*
The following function below is designed to perform the functionality after the search button is clicked 
by the user. As we have "value+[1-5]" type variables storing the addresses, we can access them at the line
37. Rest the append() function puts the element at the required place at which the the element can be clicked
to perform the filter on the map.
*/

document.getElementById("search_button").addEventListener('click', function() {
	var count = 1;
	$("#data").text("");
	addressObject.forEach(function (value) {
			if(value.search(searchText()) != -1) {
				$("#data").append("<li id='"+count+"' onclick='changeMap(this)'>"+window["value"+count]+"</li>");
			} 

			count++;
		});
});

$(document).ready(function () {

	function viewModel() {
		var self = this;
		self.searchText = ko.observable(''); //This observes the textField if any text is input in the textField.
		self.enableButton = ko.computed(function () {

			var button_id = $("#search_button"); //Grabs the search-button to apply css.
			if(self.searchText().length > 0) {
				button_id.css("cursor", "pointer");
				return true;
			} else {
				button_id.css("cursor", "not-allowed");
				return false;
			  }
		});
		var  i = 1;
		addressObject.forEach(function (value) {
			window["value"+i] = value; //Updates the list items of the DOM.
			i++;
		});
	}

	



ko.applyBindings(viewModel);	

});




