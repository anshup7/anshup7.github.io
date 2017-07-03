
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>




<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-quarter">
    <div class="w3-container w3-red w3-padding-16">
      <div class="w3-left"><i class="fa fa-refresh w3-spin w3-xxxlarge"></i></div>
      <div class="w3-right">
        <h3 style = "font-family: Raleway, sans-serif; color : black;"><?= $online_count ?></h3>
      </div>
      <div class="w3-clear"></div>
      <h4 style = "font-family: Raleway, sans-serif; color : black;">EVENT<sub>S</sub> ONLINE</h4>
    </div>
  </div>
  <div class="w3-quarter">
    <div class="w3-container w3-blue w3-padding-16">
      <div class="w3-left"><i class="fa fa-address-card w3-xxxlarge"></i></div>
      <div class="w3-right">
        <h3 style = "font-family: Raleway, sans-serif; color : black;" ><?= $registered_count ?></h3>
      </div>
      <div class="w3-clear"></div>
      <h4 style = "font-family: Raleway, sans-serif; color : black;">REGISTERED IN</h4>
    </div>
  </div>
  <div class="w3-quarter">
    <div class="w3-container w3-teal w3-padding-16">
      <div class="w3-left"><i class="fa fa-bullhorn w3-xxxlarge"></i></div>
      <div class="w3-right">
        <h3 style = "font-family: Raleway, sans-serif; color : black;"><?= $upcoming_count ?></h3>
      </div>
      <div class="w3-clear"></div>
      <h4 style = "font-family: Raleway, sans-serif; color : black;">UPCOMING</h4>
    </div>
  </div>
  <div class="w3-quarter">
    <div class="w3-container w3-orange w3-text-white w3-padding-16">
      <div class="w3-left"><i class="fa fa-calendar-check-o w3-xxxlarge"></i></div>
      <div class="w3-right">
        <h3 style = "font-family: Raleway, sans-serif; color : black;"><?= $count_of_current_event ?></h3>
      </div>
      <div class="w3-clear"></div>
      <h4 style = "font-family: Raleway, sans-serif; color : black;">CURRENT</h4>
    </div>
  </div>
</div>


<p class="w3-large" style = "color : rgba(88, 94, 101, 1);"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>INSIGHTS</b></p>
<p style = "color : rgba(88, 94, 101, 1);">Your Participation Percentage on Total Online Events :</p>
<div class="w3-progress-container w3-round-xlarge w3-small" style = "background:#fff;">
  <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:<?= $participation_percentage ?>">
    <div class="w3-center w3-text-white" style = "color:#232323;"><?= round($participation_percentage)."%" ?></div>
  </div>
</div>

  <p style = "color : rgba(88, 94, 101, 1);">Suggested(Top Grossing) Event By eMS : <u><?= strtoupper($event_name) ?></u>, Seats filled percentage:</p>
  <div class="w3-progress-container w3-round-xlarge w3-small" style = "background:#fff;">
    <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:<?= $seats_filled_percentage ?> ">
      <div class="w3-center w3-text-white" style = "color:#232323;"><?= round($seats_filled_percentage)."%" ?></div>
    </div></div>

      <hr>
