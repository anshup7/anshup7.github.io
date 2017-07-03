<nav class="large-3 medium-2 columns" id="actions-sidebar" >
    <ul class = "side-nav">
        <br/><br/>
         <center>
            <div id = "display_info"></div>
            <div id = "display_image"></div>
        </center>

    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
        <fieldset>
            <legend style="background-color : #eee;"><?= __('Add Administrator(s)') ?></legend>

            <?php foreach ($add_admin as $add_admin_display)
                 {?>

                    <?php
                    echo $this->Form->postLink("<i class=\"fa fa-user-plus\"></i> $add_admin_display->first_name $add_admin_display->last_name</br>",['controller' => 'users', 'action' => 'updateAdmin', 1, $add_admin_display->id], ['onmouseover' => 'fetch(\''.$add_admin_display->id.'\',\''.$add_admin_display->photo.'\', \''.$add_admin_display->photo_dir.'\');', 'user_id' => $add_admin_display->id, 'photo' => $add_admin_display->photo, 'dir' => $add_admin_display->photo_dir, 'escape' => false]); ?>

                <?php  } ?>




    </fieldset>
</div>
