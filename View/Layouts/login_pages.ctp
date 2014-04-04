<?php
$cakeDescription = __d('cake_dev', 'Dissertation Management');
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
		<?php echo $this->Html->charset(); ?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->css('bootstrap.min.css');
			echo $this->Html->css('font-awesome.min');
			echo $this->Html->css('AdminLTE');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $this->Html->script('jquery-1.11.0');
		?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
        </div>


		<?php echo $this->Html->script('jquery-2.0.2.min'); ?>
		<?php echo $this->Html->script('bootstrap.min'); ?>

    </body>
</html>
