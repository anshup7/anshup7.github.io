var ajaxRequest;
function ajaxDelete(obj){
 // The variable that makes Ajax possible!
try{
// Opera 8.0+, Firefox, Safari
ajaxRequest = new XMLHttpRequest();
	//alert("done");
}catch (e){
// Internet Explorer Browsers
try{
ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
}catch (e) {
try{
ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
}catch (e){
// Something went wrong
alert("Your browser broke!");
return false;
}
}
}
// Create a function that will receive data
// sent from the server and will update
// div section in the same page.
ajaxRequest.open("POST", "deleteentry.php", true); //First send the request then wait for the server to respond about the query
alert(obj.getAttribute("id"));
var datum=obj.getAttribute("id"); //for storing the value of the roll number which would lead to deletion
ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //without this the data will not be transfered to the php page
ajaxRequest.send("usephp="+datum);  //for post call to the php page
ajaxRequest.onreadystatechange = data;} 

function data(){

	
	//Code for sending the request trigger to the php page for processing
	
	
if(ajaxRequest.readyState == 4){
var ajaxDisplay = document.getElementById("displayTable");
ajaxDisplay.innerHTML = ajaxRequest.responseText;
}
}
