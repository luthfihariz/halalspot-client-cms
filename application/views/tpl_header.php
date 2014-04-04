<html>
<head>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<title>Sharee - Find Your Halal Spot</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
	
</head>
<body>

	<header class="navbar navbar-sharee" role="navigation">
		<div class="container">
			<div class="navbar-header">				
				<?= anchor('places','Halal Spot','class=navbar-brand')?>				
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
	<div class="container" id="main">
		<div class="row">
			<!-- <div class="col-md-2">
				<ul class="nav nav-pills nav-stacked">					
					<li class="<? if($this->uri->segment(1) == 'places' && $this->uri->segment(2) == 'index') echo 'active'?>"><a href="<?=site_url()?>">Manage Places</a></li>
					<li class="<? if($this->uri->segment(1) == 'places' && $this->uri->segment(2) == 'create') echo 'active'?>"><a href="<?=site_url('places/create')?>">Add New Places</a></li>
					<li class="<? if($this->uri->segment(1) == 'categories') echo 'active'?>"><a href="<?=site_url('categories/index')?>">Manage Categories</a></li>
				</ul>		
			</div> -->
			<div class="col-md-12">

			
		
		