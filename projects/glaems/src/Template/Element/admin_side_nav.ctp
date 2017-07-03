
      <li><?= $this->Html->link('<i class="fa fa-user-circle"></i> Add Administrator', ['controller' => 'users', 'action' => 'addAdmin'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
      <li><?= $this->Html->link('<i class="fa fa-user-times"></i> Remove Administrator', ['controller' => 'users', 'action' => 'removeAdmin'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
      <li><?= $this->Html->link('<i class="fa fa-user-circle"></i> List Administrators', ['controller' => 'users', 'action' => 'listAdmin'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
      <li><?= $this->Html->link('<i class="fa fa-cogs"></i> Initiate Event', ['controller' => 'events', 'action' => 'add'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
      <li><?= $this->Html->link('<i class="fa fa-trophy"></i> All Events', ['controller' => 'events', 'action' => 'index'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
      <li><?= $this->Html->link('<i class="fa fa-users"></i> Add Event Coordinators', ['controller' => 'event-coordinators', 'action' => 'listUsers'], ['escape' => false, 'style' => 'font-size : 17px;'])// ?></li>
      <li><?= $this->Html->link('<i class="fa fa-graduation-cap"></i>Add Faculty Coordinators', ['controller' => 'faculty-coordinators', 'action' => 'add'], ['escape' => false, 'style' => 'font-size : 17px;']) ?></li>
    <!-- Here removed two wrt admin. See it again tomorrow -->
