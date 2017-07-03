<div class="row">
    <div class="col-md-8">
        <h2><?= __('Posts'); ?></h2>
        <table class="table table-bordered">
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('title'); ?></th>
            <th><?= $this->Paginator->sort('body'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= h($post->id); ?>&nbsp;</td>
            <td><?= h($post->title); ?>&nbsp;</td>
            <td><?= h($post->body); ?>&nbsp;</td>
            <td><?= h($post->created); ?>&nbsp;</td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $post->id], ['class' => 'btn btn-sm btn-default']); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id], ['class' => 'btn btn-sm btn-info']); ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # %s?', $post->id), 'class' => 'btn btn-sm btn-danger']); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
        <p><?= $this->Paginator->counter(); ?></p>
        <ul class="pagination">
        <?php
            echo $this->Paginator->prev('< ' . __('previous'));
            echo $this->Paginator->numbers();
            echo $this->Paginator->next(__('next') . ' >');
        ?>
        </ul>
    </div>
    <div class="col-md-4">
            <h3><?= __('Actions'); ?></h3>

            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'btn btn-default']); ?>
    </div>
</div>
