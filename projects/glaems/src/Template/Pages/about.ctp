
<!-- +++++ Information Section +++++ -->

<div class="container pt">
  <div class="row mt centered">
    <div class="col-lg-3">
      <span class="glyphicon glyphicon-book"></span>
      <p><i><b>Number Of Events Held</b> :<br/> <?= $completed_count ?></i></p>
    </div>

    <div class="col-lg-3">
      <span class="glyphicon glyphicon-user"></span>
      <p><i><b>Number of Student Users</b> :<br/> <?= $stud_users_count ?></i></p>
    </div>

    <div class="col-lg-3">
      <span class="glyphicon glyphicon-fire"></span>
      <p><i><b>Number of Faculty Users</b> :<br/> <?= $fac_users_count ?></i></p>
    </div>

    <div class="col-lg-3">
      <span class="glyphicon glyphicon-globe"></span>
      <p><b>Current GLAeMS Admin<br/></b><i><?= $admin_name ?></i><br/></b><i>(<?= $phone_no ?>)</i></p>
    </div>
  </div><!-- /row -->

  <div class="row mt">
    <div class="col-lg-6">
      <h4>Why GLAeMS<i class="fa fa-university" aria-hidden="true"></i> ?</h4>
      <p>We all know that revolution occurs when something's status changes from zero to one. Personally, <b>The genesis of GLAeMS is on face of inconvience involved in collecting the data regarding various events held in campus.Also, Event Organizers do not take the pain of digitizing the process</b>. With GLAeMS, a unified platform is sprouted from dormancy. Wanna <b>conduct an Event</b>?. Simple; <b>Contact</b> the <b>Admin to Make it online for you</b>. Just <b>send</b> him/her <b>details of event and the poster!</b>. Then sit back and <b>relax</b>. GLAeMS will do the Rest of the trivial tasks for You.</p>
    </div><!-- /colg-lg-6 -->

    <div class="col-lg-6">
      <h4>The Stake Holders</h4>
      People Online
      <div class="progress">
        <div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $people_online ?>%;">
          <span class="sr-only">60% Complete</span>
        </div>
      </div>

      People Registered in Online Events
      <div class="progress">
        <div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?= $people_registered ?>%;">
          <span class="sr-only">80% Complete</span>
        </div>
      </div>

      Faculty Engaged In Events
      <div class="progress">
        <div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: <?= $faculty_engaged ?>%;">
          <span class="sr-only">95% Complete</span>
        </div>
      </div>

    </div><!-- /col-lg-6 -->
  </div><!-- /row -->
</div><!-- /container -->
<?= $this->element('homepage_footer') ?>
