<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visitors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitors form large-9 medium-8 columns content">
    <?= $this->Form->create($visitor) ?>
    <fieldset>
        <legend><?= __('Edit Visitor') ?></legend>
        <?php
            echo $this->Form->input('visitor_event_id', ['options' => $events]);
            echo $this->Form->input('visitor_user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
