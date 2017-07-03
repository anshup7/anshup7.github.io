$('#qrinput').change(function() {

    var dataSet = {code_value: $(this).val()};
    var requestUrl = appBaseUrl+'event-coordinators/submit-attendance'; //appBaseUrl is defined in default.ctp
    $.ajax({
        type: "POST",
        url: requestUrl,
        data: dataSet,
        success: function(result) {
            if(result == false){

                $('#qrinput').css('background-color','red');
                $('#qrinput').css('color','white');
                $('#qrinput').val('Either the code is used or No optimal privileges.');

                function reloadDefault(){
                    location.reload();
                }

                setTimeout(reloadDefault, 2000);
            } else{
                $('#display_records').html(result);
                $('#qrinput').val('');
            }
            //console.log(result);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});

function fetch(user_id, photo, photo_dir)
{
  console.log(photo);
  console.log(photo_dir);

  var dataSet = {id: user_id};
  var requestUrl = appBaseUrl+'users/admin-side-nav-details';
  var imageUrl = 'http://localhost/media/images/users/photo/'+photo_dir+'/'+'100x100_'+photo;
   $.ajax({
      type: "POST",
      url: requestUrl,
      data: dataSet,
      success: function(result) {
              $('#display_info').html(result);
              var image = "<img src ="+imageUrl+" />"
              console.log(image);
              $('#display_image').html(image);

      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
      }
  });
}


$('#btn-my-event').click(function(e) {
  e.preventDefault();
  var user_id = $(this).attr('data-user');
  var dataSet = {id: user_id};
  var requestUrl = appBaseUrl+'faculty-coordinators/return-faculty-events';
  console.log('id');
   $.ajax({
      type: "POST",
      url: requestUrl,
      data: dataSet,
      success: function(result) {
              $('#display_events').html(result);
              function reloadDefault(){
                location.reload();
              }
              setTimeout(reloadDefault, 5000);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
      }
  });

});

$('td.visitor-image-over').hover(function() {

  var dir = $(this).attr('data-path');
  var photo = $(this).attr('data-image');
  var imageUrl = 'http://localhost/media/images/users/photo/'+dir+'/100x100_'+photo;

  var image = "<img src ="+imageUrl+" />";
  $('#display_image ').html(image);
});

/*function checkId(id_corpus){

  var dataSet = {identity_number: id_corpus};
  var requestUrl = appBaseUrl+'users/check-id-presence';
  alert(id_corpus);
   $.ajax({
      type: "POST",
      url: requestUrl,
      data: dataSet,
      success: function(result) {
          if(result == false){
              $('#ino').css('background-color', 'red');
              $('#ino').css('color', 'black');
            }

      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
      }
  });
}*/

  $('#ino').keyup(function(e) {
    var value = $(this).val();
    var dataSet = {identity_number: value};
    var requestUrl = appBaseUrl+'users/check-id-presence';
     $.ajax({
        type: "POST",
        url: requestUrl,
        data: dataSet,
        dataType : 'json',
        success: function(result) {
          $('#ino').css('background-color', result["background-color"]);
          $('#ino').css('color', result["color"]);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
  });
});

$('#start-attendance-1').click(function(e) {
  var dataSet = {radio_value: 1};
  var requestUrl = appBaseUrl+'faculty-coordinators/set_evc_field';
   $.ajax({
      type: "POST",
      url: requestUrl,
      data: dataSet,
      success: function(result) {
        alert("The Attendance Process is Permitted.");
        location.reload();

      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
      }
  });
});

$('#end-attendance-0').click(function(e) {
  var dataSet = {radio_value: 0};
  var requestUrl = appBaseUrl+'faculty-coordinators/set_evc_field';
   $.ajax({
      type: "POST",
      url: requestUrl,
      data: dataSet,
      success: function(result) {
        alert("The Attendance Process is Denied.");
        location.reload();

      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
      }
  });
});

$('#status_value').hover(function(e){
  $('sub_prohibit').attr('disabled', true);
  $('sub_prohibit').submit();
});
