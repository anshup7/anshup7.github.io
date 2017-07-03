<nav class="large-3 medium-2 columns" id="actions-sidebar" >
    <ul class="side-nav">
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
        <fieldset>
            <legend style = "background-color:#eee;"><?= __('Administrators') ?></legend>

            <?php foreach ($admin as $admin_display)
                 {

                    echo $this->Html->link("<i class=\"fa fa-hand-o-right\"></i> $admin_display->first_name $admin_display->last_name</br>",['controller' => 'users', 'action' => 'displayDetail',$admin_display->id], ['escape' => false]);

                  }


            ?>


    </fieldset>
</div>
