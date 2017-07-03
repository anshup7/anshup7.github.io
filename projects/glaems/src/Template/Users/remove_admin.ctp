<nav class="large-3 medium-2 columns" id="actions-sidebar" >
    <ul class="side-nav">
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
        <fieldset>
            <legend style = "background-color:#eee;"><?= __('Remove Administrator(s)') ?></legend>

            <?php foreach ($remove_admin as $remove_admin_display)
                 {
                    if($remove_admin_display->id != $AUTH_USER['id']){
                      echo $this->Form->postLink("<i class=\"fa fa-user-times\"></i> $remove_admin_display->first_name $remove_admin_display->last_name</br>",['controller' => 'users', 'action' => 'updateAdmin', 0, $remove_admin_display->id], ['escape' => false]);
                    }
                  }


            ?>


    </fieldset>
</div>
