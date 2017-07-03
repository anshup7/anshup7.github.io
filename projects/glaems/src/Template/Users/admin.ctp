
<nav class="large-3 medium-4 columns" id="actions-sidebar" >

    <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link('<i class="fa fa-user-circle"></i> Add Administrator', ['controller' => 'users', 'action' => 'addAdmin'], ['escape' => false]) ?></li>
            <li><?= $this->Html->link('<i class="fa fa-user-times"></i> Remove Administrator', ['controller' => 'users', 'action' => 'removeAdmin'], ['escape' => false]) ?></li>
            <li><?= $this->Html->link('<i class="fa fa-user-circle"></i> List Administrators', ['controller' => 'users', 'action' => 'listAdmin'], ['escape' => false]) ?></li>
            <li><?= $this->Html->link('<i class="fa fa-cogs"></i> Initiate Event', ['controller' => 'events', 'action' => 'add'], ['escape' => false]) ?></li>
            <li><?= $this->Html->link('<i class="fa fa-trophy"></i> All Events', ['controller' => 'events', 'action' => 'index'], ['escape' => false]) ?></li>
            <li><?= $this->Html->link('<i class="fa fa-users"></i> Add Event Coordinators', ['controller' => 'event-coordinators', 'action' => 'add'], ['escape' => false])// ?></li>
            <li><?= $this->Html->link('<i class="fa fa-graduation-cap"></i>Add Faculty Coordinators', ['controller' => 'faculty-coordinators', 'action' => 'add'], ['escape' => false]) ?></li>
            <?php if($new_users_for_update > 0){ ?>
            <li><?= $this->Html->link("<i class=\"fa fa-user-plus\"></i> New Users Registered <i class=\"fa fa-battery-full\"></i>", ['controller' => 'users', 'action' => 'usersRegistered'], ['escape' => false]) ?></li>
            <?php } else{ ?>
            <li><?= $this->Html->link("<i class=\"fa fa-user-plus\"></i> New Users Registered <i class=\"fa fa-battery-empty\"></i>", ['controller' => 'users', 'action' => 'usersRegistered'], ['escape' => false]) ?></li>
            <?php } ?>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
        <h1 id = "animation2">Welcome  <?= $AUTH_USER['first_name'] ?></h1>
</div>
