
<div class="row">
	<div class="col-xs-4">
		<div class="alert alert-success alert-dismissable" id="alertDialog" style="display:none">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<span><b>Success!</b> New category has been created.</span>
			</div>
		<div class="panel panel-default">			
			<div class="panel-heading">
				<h4>Add More Category</h4>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="cat_name">Name</label>
				    <input type="text" class="form-control" id="cat-name" name="cat_name" placeholder="Enter category name">
				</div>

			  	<div class="form-group">
				    <label for="cat_addr">Short Name</label>
				    <input type="text" id="cat-short-name" class="form-control" name="cat_short_name" placeholder="Short one">		    	    
			  	</div>

			  	<div class="form-group">
				    <label for="places_addr">Foursquare ID</label>
				    <input type="text" id="cat-4sq-id" class="form-control" name="cat_4sq_id" placeholder="Foursquare ID"> 
				    <span class="help-block"><small>If you get it from foursquare.</small></span>
				</div>			  	

				<button type="submit" id="cat-submit" class="btn btn-primary">Submit</button>
				<img src="<?=base_url().'assets/img/ajax_loader_square.gif'?>" id="cat-submit-loader" style="display:none">

			</div>
		</div>
	</div>
	<div class="col-xs-8 cat-table">
		<div class="panel panel-default">
				<table class="table table-bordered table-hover" id="cat-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Short Name</th>
							<th>4SQ ID</th>
							<th>Action</th>
						</tr>	
					</thead>
					<tbody>
				<?php foreach ($result['categories'] as $key=>$category): ?>
					
					<tr id="<?= $key+1 ?>">
						<td class="hide"><? if(isset($category['foursquare_id'])) echo $category['foursquare_id'] ?></td>
						<td><?= $key+1 ?></td>						
						<td><?= $category['name'] ?></td>
						<td><?= $category['short_name'] ?></td>
						<td class="text-center"><? if(isset($category['foursquare_id'])) echo "<i class='glyphicon glyphicon-ok' ></i>" ?></td>
						<td class="text-center"><a href="#" id="<?= $category['_id']['$oid']?>" key="<?= $key+1 ?>" class="btn btn-danger delete-btn"><i class="glyphicon glyphicon-trash"></i></a>
							<a href="#" id="<?= $category['_id']['$oid']?>" key="<?= $key+1 ?>" class="btn btn-warning edit-btn" data-toggle="modal"><i class="glyphicon glyphicon-edit"></i></a>
						</td>
					</tr>
					
				<?php endforeach ?>
					</tbody>
				</table>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit-cat-modal" data-backdrop=static data-keyboard=false tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close-btn" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Category</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label">ID</label>				    
				    <p class="form-control-static" id="cat-id"></p>
				</div>
				<div class="form-group">
				    <label for="cat_name">Name</label>
				    <input type="text" class="form-control" id="e-cat-name" name="e_cat_name" placeholder="Enter category name">
				</div>

			  	<div class="form-group">
				    <label for="cat_addr">Short Name</label>
				    <input type="text" id="e-cat-short-name" class="form-control" name="e_cat_short_name" placeholder="Short one">		    	    
			  	</div>

			  	<div class="form-group">
				    <label for="places_addr">Foursquare ID</label>
				    <input type="text" id="e-cat-4sq-id" class="form-control" name="e_cat_4sq_id" placeholder="Foursquare ID"> 
				    <span class="help-block"><small>If you get it from foursquare.</small></span>
				</div>			  	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal-btn" data-loading-text="Close">Close</button>
				<button type="button" class="btn btn-primary" id="update-btn" data-loading-text="Updating...">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="delCatModal" data-backdrop=static data-keyboard=true tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close-btn" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
			</div>
			<div class="modal-body">				
				<p>Are you sure want to delete this category?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="del-modal-btn" data-loading-text="Deleting...">Delete</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	jQuery("#cat-submit").click(function(){
		jQuery('#cat-submit-loader').show();
		jQuery.ajax({
			url : "<?=API_CATEGORIES?>",
			type : "post",
			dataType : "json",			
			data : {
				"name" : jQuery("#cat-name").val(),
				"short_name" : jQuery("#cat-short-name").val(),
				"foursquare_id" : jQuery("#cat-4sq-id").val(),
				"icon_url" : ""
			},
			success: function(data){
				jQuery('#cat-submit-loader').hide();
				location.reload();
				responseSuccessCreate(data);

			},
			error:function(data){
				jQuery('#cat-submit-loader').hide();
				responseFailCreate(data);
			}
		});
	});

	jQuery(".delete-btn").click(function(){
		var $btn = $(this);
		jQuery("#delCatModal").modal('show');
		jQuery("#del-modal-btn").prop("oid",$btn.prop("id"));		
	});

	jQuery("#del-modal-btn").click(function(){
		jQuery(this).button('loading');
		jQuery.ajax({
			url : "<?=site_url('categories/delete')?>/"+$(this).prop("oid"),
			type : "GET",
			success: function(data){
				console.log(data);
				location.reload();
			}
		});
	});

	jQuery(".edit-btn").click(function(){

		jQuery("#edit-cat-modal").modal('show');

		var rowIndex = $(this).attr("key");		

		jQuery("#"+rowIndex+" td").each(function(index){
			switch(index){
				case 0:
					jQuery("#e-cat-4sq-id").val($(this).html());		
				case 2:
					jQuery("#e-cat-name").val($(this).html());
				case 3:				
					jQuery("#e-cat-short-name").val($(this).html());
			};
		});

		jQuery("#cat-id").html($(this).attr("id"));
	});

	jQuery("#update-btn").click(function(){
		jQuery('#cat-update-loader').show();
		jQuery(this).button('loading');
		jQuery("#close-modal-btn").button('loading');
		jQuery('#close-btn').attr('style','display:none');


		jQuery.ajax({
			url : "<?=site_url('categories/edit')?>/"+jQuery('#cat-id').html(),
			type : "POST",
			data : {
				"name" : jQuery("#e-cat-name").val(),
				"short_name" : jQuery("#e-cat-short-name").val(),
				"foursquare_id" : jQuery("#e-cat-4sq-id").val(),
			},
			success : function(data){				
				jQuery("#edit-cat-modal").modal('hide');
				location.reload();				
				responseSuccessEdit(data);
			},
			error: function(data){
				responseFailUpdate(data);
			}
		})
		
	});

	function responseSuccessEdit(result){
		showAlertDialog(true,"<b>Success!</b> Category has been updated.");
	}

	function responseSuccessCreate(result){
		console.log(result);
		if(result.status){						
			showAlertDialog(true,"<b>Success!</b> New category has been created.");
		}
	}

	function responseFailUpdate(result){
		showAlertDialog(false,"<b>Sorry !</b> Fail to update category.");	
	}

	function responseFailCreate(result){
		showAlertDialog(false,"<b>Sorry !</b> Fail to create new category.");	
	}

	function showAlertDialog(success, message){
		window.scrollTo(0,0);
		if(success){
			jQuery("#alertDialog").addClass("alert-success").removeClass("alert-danger");
		}else{
			jQuery("#alertDialog").removeClass("alert-success").addClass("alert-danger");
		}
		jQuery("#alertDialog span").html(message);
		jQuery("#alertDialog").show();			
		setTimeout(function(){
			jQuery("#alertDialog").fadeOut("slow");
		},2000);
	}


</script>
