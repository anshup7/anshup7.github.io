function giveConfirmation()
{
    alert("Data Successfully Captured!");
    
}


function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}

(function () 
{   var values = getUrlVars()
    var name = values.text1.toLocaleString().replace("+", " ")
    name = name.toUpperCase()
    var dob = values.text2.toLocaleString().replace("%2F", "/") //This will find only first occurence. Hence write it again
    dob = dob.replace("%2F", "/") //See the difference in code here. The second occurence is being replaced
    pan = values.text3.toLocaleString()
    mob = values.text4.toLocaleString()
    donation = "Rs."+" "+values.text5.toLocaleString()
    var email = values.text6.toLocaleString().replace("%40", "@")
    email = email.toUpperCase()
    document.getElementById("display-name").innerHTML = "Name: "+name;
    document.getElementById("display-dob").innerHTML = "DOB: "+dob;
    document.getElementById("display-pan").innerHTML = "Pan No: "+pan;
    document.getElementById("display-mob").innerHTML = "Mob No: "+mob;
    document.getElementById("display-email").innerHTML = "Email: "+email;
    document.getElementById("display-donation").innerHTML = "Donation Amount: "+donation;
    
}());




