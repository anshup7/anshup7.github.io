<nav class="large-3 medium-4 columns" id="actions-sidebar" >

    <ul class="side-nav">
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <h3><?= __('Activate or Remove the Following Accounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
      <thead>
          <tr>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
      </thead>

      <tbody>
          <?php foreach($update_users as $update_user){ ?>
              <tr>
                  <td><?= strtoupper(h($update_user->first_name)) ?></td>
                  <td><?= strtoupper(h($update_user->last_name)) ?></td>
                  <?php if($update_user->user_type_id == 1){ ?>
                    <td>STUDENT</td>
                  <?php } ?>
                  <?php if($update_user->user_type_id == 2){ ?>
                    <td>FACULTY</td>
                  <?php } ?>

                  <td class = 'actions'>
                      <?= $this->Html->link('<i class="fa fa-key"></i> Activate Account', ['controller' => 'users', 'action' => 'changeStatusOrRemove', $update_user->id, $update_user->user_type_id], ['escape' => false]) ?>
                      <?= $this->Html->link('<i class="fa fa-key"></i> Remove', ['controller' => 'users', 'action' => 'changeStatusOrRemove', $update_user->id, $update_user->user_type_id, true], ['escape' => false]) ?>
                  </td>
              </tr>
          <?php } ?>
      </tbody>
  </table>

  <div class="paginator">
      <ul class="pagination">
          <?= $this->Paginator->first('<< ' . __('first')) ?>
          <?= $this->Paginator->prev('< ' . __('previous')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('next') . ' >') ?>
          <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>
  </div>
</div>



</div>
