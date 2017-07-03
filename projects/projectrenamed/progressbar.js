var xhttp;
function progressbar(){
 // The variable that makes Ajax possible!
try{
// Opera 8.0+, Firefox, Safari
xhttp = new XMLHttpRequest();
	//alert("done");
}catch (e){
// Internet Explorer Browsers
try{
xhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch (e) {
try{
xhttp = new ActiveXObject("Microsoft.XMLHTTP");
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
xhttp.open("POST", "changeprogressbar.php", true); //First send the request then wait for the server to respond about the query
xhttp.send();
xhttp.onreadystatechange = datum;} 

function datum(){

	
	//Code for sending the request trigger to the php page for processing
	
	
if(xhttp.readyState == 4){
var ajaxDisplay = document.getElementById("progressb");
ajaxDisplay.innerHTML = xhttp.responseText;
}
}