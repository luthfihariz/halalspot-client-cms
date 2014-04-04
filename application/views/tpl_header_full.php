<html>
<head>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<title>Sharee - Find Your Halal Spot</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
	
</head>
<body>

	<header class="navbar navbar-fixed-top navbar-sharee" role="navigation">
		<div class="container">
			<div class="navbar-header">				
				<?= anchor('','Halal Spot','class=navbar-brand')?>				
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Places <b class="caret"></b></a>
						<ul class="dropdown-menu">							
							<li><a href="<?=site_url('places/create')?>">Add Places</a></li>
							<li><a href="<?=site_url('places/index')?>">Manage Places</a></li>
						</ul>
					</li>
					<li><a href="<?=site_url('categories/index')?>">Categories</a></li>
					<li><a href="<?=site_url('halalbodies/index')?>">Halal Bodies</a></li>
				</ul>	    
				<ul class="nav navbar-right navbar-nav">
					<li><a href="<?=site_url('users/logout')?>" class="">Logout</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</header>

			
		
		