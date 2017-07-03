
<?= $this->Element('side_nav_event_coordinators', ['is_permitted' => $is_permitted]) ?>
<div class="users form large-9 medium-8 columns content">
      <fieldset>
            <legend style="background-color:black;"><?= __('Submit Attendance') ?></legend>
      </fieldset>

      <?= $this->Form->input('enter_the_o_t_p', ['id' => 'qrinput']); ?>
      <?= $this->Form->button(__('<i class="fa fa-plus"></i> Submit'), ['escape' => false]) ?>

      <br/>


            <div id='display_records'></div>



</div>
