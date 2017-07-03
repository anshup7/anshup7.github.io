<nav class="large-3 medium-4 columns" id="actions-sidebar" >

        <ul class="side-nav">
                <li class="heading"><?= __('Control Panel') ?></li>
                <li><?= $this->Html->link('<i class="fa fa-user-circle"></i> My Events', ['controller' => 'users', 'action' => 'studentPageAction', $AUTH_USER['id']], ['escape' => false]) ?></li>
                <?php if($is_permitted == true): ?>
                        <li><?= $this->Html->link('<i class="fa fa-user-times" ></i> Take Attendance', ['controller' => 'event-coordinators', 'action' => 'takeAttendance'], ['escape' => false]) ?></li>
                <?php else:?>
                        <li class = "disabled"><?= $this->Html->link('<i class="fa fa-user-times" style = "color : Red;"></i> Take Attendance', ['controller' => 'event-coordinators', 'action' => 'takeAttendance'], ['escape' => false]) ?></li>

                <?php endif; ?>

        </ul>

</nav>
