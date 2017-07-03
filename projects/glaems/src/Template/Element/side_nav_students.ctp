<nav class="large-3 medium-4 columns" id="actions-sidebar" >

<ul class="side-nav">
        <li class="heading"><?= __('My Control Panel') ?>
        <li><?= $this->Html->link('<i class="fa fa-user-circle"></i> My Events', ['controller' => 'users', 'action' => 'studentPageAction', $AUTH_USER['id']], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fa fa-user-times"></i> Register In Events', ['controller' => 'events', 'action' => 'registerEvent'], ['escape' => false]) ?></li>
        <?php if($is_coordinator == true): ?>
          <li><?= $this->Html->link('<i class="fa fa-cogs" ></i> Your Coordinator Portal', ['controller' => 'event-coordinators', 'action' => 'eventCoordinatorPageAction'], ['escape' => false]) ?></li>
        <?php else:?>
         <li class = 'disabled'><?= $this->Html->link('<i class="fa fa-cogs"></i> Your Coordinator Portal', ['controller' => 'event-coordinators', 'action' => 'eventCoordinatorPageAction'], ['escape' => false]) ?> </li>

        <?php endif; ?>


</ul>
</nav>
