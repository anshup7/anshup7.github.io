<nav class="large-3 medium-6 columns" id="actions-sidebar" >

<ul class="side-nav">
        <li class="heading"><?= __('Control Panel') ?></li>
        <li><?= $this->Html->link('<i class="fa fa-info-circle" aria-hidden="true"></i> Event Attendee Details', ['controller' => 'events', 'action' => 'eventAttendee'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
        <?php if($display_addevc_link == true): ?>
                <li><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Allocate Student Coordinators', ['controller' => 'event-coordinators', 'action' => 'add'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
        <?php else: ?>
                <li class = 'disabled'><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Allocate Student Coordinators', ['controller' => 'event-coordinators', 'action' => 'add'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
        <?php endif; ?>
        <?php if($display_regs_link == true): ?>
          <li><?= $this->Html->link('<i class="fa fa-registered" aria-hidden="true"></i> Users Registered in your Event', ['controller' => 'events', 'action' => 'eventVisitors'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
  <?php  else: ?>
          <li class="disabled"><?= $this->Html->link('<i class="fa fa-registered" aria-hidden="true"></i> Users Registered in your Event', '#', ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
  <?php endif; ?>

        <?php if($display_report_link == true): ?>
                <li><?= $this->Html->link('<i class="fa fa-book" aria-hidden="true"></i> Your Event Report', ['controller' => 'event-files', 'action' => 'report' , $AUTH_USER['id']], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
        <?php  else: ?>
                <li class = 'disabled'><?= $this->Html->link('<i class="fa fa-book" aria-hidden="true"></i> Your Event Report', ['controller' => 'event-files', 'action' => 'report' , $AUTH_USER['id']], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
        <?php endif; ?>

</ul>

</nav>
