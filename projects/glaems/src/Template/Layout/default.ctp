<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Copyright-Anshuman-GLAeMS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <script>
      var appBaseUrl = '<?= $this->Url->build('/', true) ?>';
    </script>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style = "background-color : #eee;">
    <nav id="nav-au" class="top-bar expanded" data-topbar role="navigation">
        <ul id= "nav-au" class="title-area large-3 medium-4 columns">
                <li class="name">
                  <?php if(!empty($AUTH_USER)): ?>
                                <?php if($AUTH_USER['user_type_id'] === 1 && $AUTH_USER['is_admin'] == false): //1 for student user type?>
                                    <h1><?= $this->Html->link('<i class="fa fa-user-circle" style = "color : white;"></i> Student Home', ['controller' => 'users', 'action' =>'studentPageAction'],['escape' => false]) ?></h1>
                                <?php elseif($AUTH_USER['user_type_id'] === 2 && $AUTH_USER['is_admin'] == false): //2 for faculty user type?>
                                    <h1><?= $this->Html->link('<i class="fa fa-user-circle" style = "color : white;"></i> Faculty Home', ['controller' => 'faculty-coordinators', 'action' =>'facultyLandingPage'],['escape' => false]) ?></h1>
                                <?php elseif($AUTH_USER['is_admin'] == true && $AUTH_USER['user_type_id'] != 3): //3 for administrator?>
                                    <h1><?= $this->Html->link('<i class="fa fa-user-circle" style = "color : white;"></i> Admin Home', ['controller' => 'users', 'action' =>'admin'],['escape' => false]) ?></h1>
                                <?php elseif($AUTH_USER['user_type_id'] == 3 && $AUTH_USER['is_admin'] == true): //4 for super administrator ?>
                                  <h1><a href="">Super-Administrator Panel</a></h1>
                                <?php endif;?>
                  <?php else: ?>


                <?php endif; ?>
                </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php if (!empty($AUTH_USER)): ?>
                    <li class="auth-name"><?= $AUTH_USER['first_name'].' '.$AUTH_USER['last_name'] ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-chain-broken"></i>Logout', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
                <?php endif; ?>
            </ul>

        </div>

        <div class="top-bar-section">
            <ul class="center">
                    <li id = "nav-au" class="glaems_heading_style">
                        <i id = "nav-au"   class="fa fa-university">GLAeMS</i>
                    </li>


           </ul>
        </div>

    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix" >
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>

    <?= $this->Html->script('https://code.jquery.com/jquery-3.1.1.min.js') ?>
    <?= $this->Html->script('take_attendance.js') ?>
</body>
</html>
