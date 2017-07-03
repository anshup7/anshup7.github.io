<nav class="large-3 medium-4 columns" id="actions-sidebar" >

    <ul class="side-nav">
      <?= $this->Element('admin_side_nav') ?>
  </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <h3><?= __('Following Are the Eligible Students to be the Coordinator') ?></h3>
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
      <?php foreach($display_users as $display_user){ ?>
          <tr>
              <td><?= strtoupper(h($display_user->first_name)) ?></td>
              <td><?= strtoupper(h($display_user->last_name)) ?></td>
                <td>STUDENT</td>
              <td class = 'actions'>
                  <?= $this->Html->link('<i class="fa fa-key"></i> Create', ['controller' => 'event-coordinators', 'action' => 'add', $display_user->id], ['escape' => false]) ?>
              </td>
          </tr>
      <?php } ?>
  </tbody>
</table>

<div class="paginator">
<?= $this->element('paginator') ?>
</div>
</div>



</div>
</div>
