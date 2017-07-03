<?php use Cake\I18n\Date; ?>
<?php $i = 0; ?>
<?= $this->element('side_nav_students', ['is_coordinator' => $display_coordinator_link]) ?>

     <div class="users form large-9 medium-8 columns content">
     <h3><u><?= __('Register For Events') ?></u></h3>
  <table cellpadding="0" cellspacing="0" style = "background-color : #fff; overflow-x : auto; ">
     <thead>
         <tr>
               <th scope="col"><?= $this->Paginator->sort('name') ?></th>
               <th scope="col"><?= $this->Paginator->sort('date_of_registration') ?></th>
               <th scope="col"><?= $this->Paginator->sort('date_of_commencement') ?></th>
               <th scope="col"><?= $this->Paginator->sort('Seats Left') ?></th>
               <th scope="col" class="actions" style = "color : #1798A5"><?= __('Register!') ?></th>
         </tr>
     </thead>

     <tbody>

         <?php foreach($events as $load_events): ?>
             <tr>

                  <?php $date_reg = new Date($load_events->date_of_registration); ?>
                  <?php $date_comm = new Date($load_events->date_of_commencement); ?>
                 <td style = "color :  rgba(88, 94, 101, 1); overflow:auto;"><?= strtoupper(h($load_events->event_name)) ?></td>
                 <td style = "color :  rgba(88, 94, 101, 1);"><?= strtoupper(h($date_reg->format('d-m-y '))) ?></td>
                 <td style = "color :  rgba(88, 94, 101, 1);"><?= strtoupper(h($date_comm->format('d-m-y'))) ?></td>
                 <td style = "color :  rgba(88, 94, 101, 1);"><?= h($load_events->no_of_seats) ?></td>

                 <?php if(in_array($load_events->id, $query_participation)): ?>
                     <td style = "background-color : red; color : #fff"><?= __('You have registered!') ?></th>
                   <?php else: ?>
                    <td>  <?= $this->Html->link('<i class="fa fa-key"></i> Register', ['controller' => 'events', 'action' => 'register', $AUTH_USER['id'], $load_events->id], ['escape' => false]) ?></th>
                  <?php endif; ?>
             </tr>

          <?php endforeach; ?>
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
