<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersStatusCode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersStatusCode->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Status Codes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usersStatusCodes form large-9 medium-8 columns content">
    <?= $this->Form->create($usersStatusCode) ?>
    <fieldset>
        <legend><?= __('Edit Users Status Code') ?></legend>
        <?php
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
