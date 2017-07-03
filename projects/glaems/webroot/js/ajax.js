$.ajax({
    url         : url,
    type        : 'POST',
    ContentType : 'application/json',
    data        : {'data': data}
}).done(function(response){
    try{
        response = JSON.parse(response);
        if(response.status == 'success'){
            $target.html(response.html);
        }
        else{
            // ERROR HANDLING
        }
    }
    catch (ex) {
        // ERROR HANDLING
        console.log('Exception :: ' + ex.toString());
        console.log('Response :: ' + response);
    }
}).fail(function(request, status, error){
    // ERROR HANDLING
    console.log('XXXXX Ajax Failure :: ' + error);
}).always(function(){
    // Hide loading
}); 
