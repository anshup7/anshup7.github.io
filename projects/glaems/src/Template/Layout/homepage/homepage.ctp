<!DOCTYPE html>
<html lang="en">
  <head>
      <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>
            <?= APP_NAME .'|' ?>
            <?= $this->fetch('title') ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
     <?= $this->Html->css('homepage/css/bootstrap.css') ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('homepage/css/main.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->script('https://code.jquery.com/jquery-1.10.2.min.js') ?>
    <?= $this->Html->script('homepage/js/hover.zoom.js') ?>
    <?= $this->Html->script('assets/js/hover.zoom.conf.js') ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
		<?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <?php echo $this->Html->link('<i class="fa fa-graduation-cap" aria-hidden="true"></i> GLA-EMS', ['controller' => 'pages', 'action' => 'display'], ['escape' => false, 'class' => 'navbar-brand']); ?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

            <li><?php echo $this->Html->link('<i class="fa fa-sign-in" aria-hidden="true"></i> Login', ['controller' => 'users', 'action' => 'login'], ['escape' => false]); ?></li>
            <li><?php echo $this->Html->link('<i class="fa fa-registered" aria-hidden="true"></i> Register', ['controller' => 'users', 'action' => 'add'], ['escape' => false]); ?></li>
            <li><?php echo $this->Html->link('<i class="fa fa-calendar" aria-hidden="true"></i> Events', ['controller' => 'pages', 'action' => 'events'], ['escape' => false]); ?></li>
            <li><?php echo $this->Html->link('<i class="fa fa-rss" aria-hidden="true"></i> About', ['controller' => 'pages', 'action' => 'about'], ['escape' => false]); ?></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>







<?= $this->fetch('content') ?>


	<!-- +++++ Footer Section +++++ -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?= $this->Html->script('homepage/js/bootstrap.min.js') ?>
  </body>
</html>
