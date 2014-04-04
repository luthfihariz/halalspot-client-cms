<p><a href="<?=site_url('places/edit/'.$result['_id']['$oid'])?>" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-edit"></span>Edit</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Basic Information</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['name']?></p>
			  	</div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Tags</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=implode(', ',$result['tags'])?></p>
			    </div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['formatted_addr']?></p>
			    </div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">City</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['city']?></p>
			    </div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Country</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['country']?></p>
			    </div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Coordinate</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['location']['lat'].", ".$result['location']['lng']?></p>
			    </div>
			</div>

		</form>
	</div>	
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Contact Information</h3>
	</div>

	<div class="panel-body">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['contact']['phone']?></p>
			  	</div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['contact']['email']?></p>
			    </div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Website</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?=$result['contact']['website']?></p>
			    </div>
			</div>
		</form>
	</div>
</div>