function validate(dob) 
{
    var value = dob.split("/");
    var year = Number(value[2]);
    var date_today = new Date();
    date_today = Number(date_today.getFullYear());
    age_of_user = date_today - year;
    input_field = document.getElementById("dob");
    danger = document.getElementById("danger")
    if(age_of_user <= 21){
        input_field.style.borderColor = "red";
        danger.style.display = "inline-block";
        danger.style.transition = "ease";
    } else {
        input_field.style.borderColor = "white";
        danger.style.display = "none";
        danger.style.transition = "ease";
    }
}