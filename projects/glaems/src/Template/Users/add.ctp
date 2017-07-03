
<div class="users form large-4 medium-4 columns content">

    <?= $this->Form->create($user, ['type' => 'file'], ['style' => 'vertical-align : middle']) ?>
    <fieldset>
        <legend style = "background-color : #eee;"><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('first_name', ['style' => 'background-color : #fff; color : #1798A5;']);
            echo $this->Form->input('last_name', ['style' => 'background-color : #fff; color : #1798A5;']);
            echo $this->Form->input('identity_number', ['style' => 'background-color : #fff; color : #1798A5;', 'id' => 'ino']);
            echo $this->Form->input('email', ['style' => 'background-color : #fff; color : #1798A5;']);
            echo $this->Form->input('mobile_number', ['style' => 'background-color : #fff; color : #1798A5;']);
            echo $this->Form->input('password', ['style' => 'background-color : #fff; color : #1798A5;']);
            //echo $this->Form->input('user_status_code_id', ['options' => $usersStatusCodes]);
            echo $this->Form->input('user_type_id', ['options' => $usersTypesCodes], ['style' => 'color : #1798A5;']);//for admin..
            echo $this->Form->input('photo', ['type' => 'file'], ['style' => ' color : #1798A5;']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('<i class="fa fa-plus"></i> Submit'), ['escape' => false, 'id' => 'subb']) ?>
    <?= $this->Form->end() ?>
</div>

<div class="users form large-7 medium-4 columns content">
    	<a class="zoom green" target = "_other" href="http://localhost/media/images/events/poster/<?= $poster_dir ?>/<?= $poster ?>"><img id = "scaleatadd" class="img-responsive" src="http://localhost/media/images/events/poster/<?= $poster_dir ?>/960x600_<?= $poster ?>" alt=""  width = "960px" height = "600px"/></a>
        </br>

            <marquee direction="right" width = "800px" behavior="alternate">

                  <p style = "color : #1798A5; vertical-align = center;"> Top Grossing Event Now !! </p>

            </marquee>

</div>
