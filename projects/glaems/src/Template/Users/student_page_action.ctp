<?php use Cake\I18n\Date; ?>
 <?= $this->element('side_nav_students', ['is_coordinator' => $display_coordinator_link]) ?>


    <?php if(empty($set_query)){ ?>
     <div class="users form large-9 medium-8 columns content">
    <?= $this->element('student_dashboard', ['online_count' => $online_count, 'registered_count' => $registered_count, 'upcoming_count' => $upcoming_count, 'count_of_current_event' => $current_count, 'participation_percentage' => $participation_percentage, 'event_name' => $event_name, 'seats_filled_percentage' => $seats_filled_percentage]) ?>

</div>
<?php } elseif(isset($set_query)) { ?>
   <div class="users form large-9 medium-8 columns content">
   <h3><u><?= __('Your Registered Events') ?></u></h3>
<table cellpadding="0" cellspacing="0" style="background-color : #fff;">
   <thead>
       <tr>
             <th scope="col"><?= $this->Paginator->sort('name') ?></th>
             <th scope="col"><?= $this->Paginator->sort('date_of_registration') ?></th>
             <th scope="col"><?= $this->Paginator->sort('date_of_commencement') ?></th>
             <th scope="col" class="actions" style = "color : #1798A5"><?= __('You Can:') ?></th>
       </tr>
   </thead>

   <tbody>
       <?php foreach($set_query as $show_events){ ?>
           <tr>

                <?php $date_reg = new Date($show_events->event->date_of_registration); ?>
                <?php $date_comm = new Date($show_events->event->date_of_commencement); ?>
               <td style = "color :  rgba(88, 94, 101, 1);"><?= strtoupper(h($show_events->event->event_name)) ?></td>
               <td style = "color :  rgba(88, 94, 101, 1);"><?= strtoupper(h($date_reg->format('d-m-y '))) ?></td>
               <td style = "color :  rgba(88, 94, 101, 1);"><?= strtoupper(h($date_comm->format('d-m-y'))) ?></td>

               <td class = 'actions'>
                   <?= $this->Html->link('<i class="fa fa-key"></i> Cancel Registration', ['controller' => 'events', 'action' => 'cancelRegistration', $AUTH_USER['id'], $show_events->event->id], ['escape' => false], ['style' => 'color:rgba(88, 94, 101, 1);']) ?>
                   <?= $this->Html->link('<i class="fa fa-key"></i> OTP', ['controller' => 'events', 'action' => 'generateQrCode', $show_events->event->id], ['escape' => false], ['style' => 'color:rgba(88, 94, 101, 1);']) ?>
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
<?php } ?>

<?= $this->Element('qrcode_decode_scripts') ?>
