<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $facultyCoordinator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $facultyCoordinator->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Faculty Coordinators'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Faculty Coordinators'), ['controller' => 'FacultyCoordinators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Faculty Coordinator'), ['controller' => 'FacultyCoordinators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="facultyCoordinators form large-9 medium-8 columns content">
    <?= $this->Form->create($facultyCoordinator) ?>
    <fieldset>
        <legend><?= __('Edit Faculty Coordinator') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('faculty_coordinator_id');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
