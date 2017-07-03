<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersTypesCode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersTypesCode->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Types Codes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usersTypesCodes form large-9 medium-8 columns content">
    <?= $this->Form->create($usersTypesCode) ?>
    <fieldset>
        <legend><?= __('Edit Users Types Code') ?></legend>
        <?php
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
