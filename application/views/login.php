<html>
<head>
	<title>Please Login</title>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<title>Sharee - Find Your Halal Spot</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
</head>
<body>
	<div class="container" id="main">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<? if(isset($error)) { ?>
				<div class="alert alert-danger alert-dismissable" id="alertDialog">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<span><b>Failed!</b> Please check your username and password.</span>
				</div>
				<? } ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Administrator Login</h4>
					</div>
					<div class="panel-body">
						<form method="post" action="<?=site_url('users/login')?>">
							<div class="form-group">
							    <input type="text" class="form-control" name="username" placeholder="Username" id="username">
							</div>
						  	<div class="form-group">
							    <input type="password" class="form-control" name="pwd" placeholder="Password" id="pwd">
						  	</div>
							<button type="submit" id="loginBtn" class="btn btn-primary">Login</button>
							<img src="<?=base_url().'assets/img/ajax_loader_square.gif'?>" id="loginLoader" style="display:none">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		/*jQuery("#loginBtn").click(function(){
			username = jQuery("#username").val();
			pwd = jQuery("#pwd").val();

			matchUsername = "admin"
			matchPwd = "hsdb12345"

			if(username==matchUsername || pwd==matchPwd){
				window.location = "<?=site_url('users/session')?>";
			}else{
				showAlertDialog();
			}
		});

		function showAlertDialog(){
			jQuery("#alertDialog").show();
			setTimeout(function(){
				jQuery("#alertDialog").fadeOut("slow");
			}, 2000);
		}*/
	</script>

</body>
</html>