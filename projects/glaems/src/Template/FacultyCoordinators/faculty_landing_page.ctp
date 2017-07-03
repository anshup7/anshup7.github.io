
<?= $this->Element('side_nav_faculty', ['is_coordinator' => $display_coordinator_page_link, 'display_report_link' => $display_report_link, 'display_addevc_link' => $display_addevc_link, 'display_regs_link' => $display_regs_link]) ?>
<div id = "display_events" class="users form large-9 medium-9 columns content" >
  <?= $this->element('faculty_dashboard', ['online_count' => $online_count, 'registered_count' => $registered_count, 'upcoming_count' => $upcoming_count, 'count_of_current_event' => $current_count]) ?>
    <p class="w3-large" style = "color : #1798A5;"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Your Event Coordinator : <?= $evc_name[0] ?></b></p>
    <?php if($attendance_privileges && $evc_name[1]):
      if(isset($end_attendance)):
        echo $this->Form->radio(
          'end_attendance',
          [
            ['value' => '0', 'text' => 'End The Attendance Process', 'style' => 'color:green;'],
          ]
        );
      else:
        echo $this->Form->radio(

          'start_attendance',
          [
            ['value' => '1', 'text' => 'Start The Attendance Process', 'style' => 'color:red;'],
          ]
        );
      endif;
      else: ?>
      <h3><?= __('<i class="fa fa-info" aria-hidden="true"></i> <u>Either You don\'t have any event or No Event Coordinator </u>') ?> </h3>
    <?php endif; ?>


    <hr/></br>
    <p class="w3-large" id= "animation" style = "color : #1798A5;"><b><i>PLEASE NOTE: You Can Generate Report Till The Event Is not Made Offline, Kindly Save the Report once You Generate it. Also It is Advised that <u>GENERATE ONLY AFTER THE EVENT IS COMPLETED</u></i></b></p>

  </div>
