
<div class="row">
	<div class="col-xs-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Add Halal Bodies</h4>
			</div>			
			<div class="panel-body">				
				<form enctype="multipart/form-data" method="post" action="<?=site_url('halalbodies/create')?>">
				<div class="form-group">
				    <label for="bod_name">Name</label>
				    <input type="text" class="form-control" id="bod-name" name="name" placeholder="Halal bodies name">
				</div>				

			  	<div class="form-group">
				    <label for="bod_overview">Overview</label>
				    <textarea id="bod-overview" class="form-control" name="overview" placeholder="Describe the bodies"  rows="6"></textarea>
			  	</div>

			  	<div class="form-group">
				    <label for="bod_country">Country</label>
				    <input type="text" id="bod-country" class="form-control" name="country" placeholder="Institution Country"> 
				</div>

			  	<div class="form-group">
				    <label for="bod_logo">Halal Logo Url</label>
				    <input type="file" id="bod-logo" name="halalLogo">
				    <span class="help-block"><small>Make sure it's square.</small></span>
				</div>

				<div class="form-group">
				    <label for="bod_addr">Address</label>
				    <textarea id="bod-addr" class="form-control" name="address" placeholder="Complete Address"></textarea>
				</div>

				<div class="form-group">
				    <label for="bod_web">Website</label>
				    <input type="text" id="bod-web" class="form-control" name="website" placeholder="Url"> 
				</div>

				<div class="form-group">
				    <label for="bod_phone">Phone</label>
				    <input type="text" id="bod-phone" class="form-control" name="phone" placeholder="Phone"> 
				</div>

				<div class="form-group">
				    <label for="bod_phone">Fax</label>
				    <input type="text" id="bod-phone" class="form-control" name="fax" placeholder="Phone"> 
				</div>

				<div class="form-group">
				    <label for="bod_email">Email</label>
				    <input type="text" id="bod-email" class="form-control" name="email" placeholder="Email"> 
				</div>

				<div class="form-group">
				    <label for="bod_email">Person In Charge</label>
				    <input type="text" id="bod-pic" class="form-control" name="pic" placeholder="Contacting person"> 
				</div>

				<button type="submit" id="bod-submit" class="btn btn-primary">Submit</button>
				<img src="<?=base_url().'assets/img/ajax_loader_square.gif'?>" id="bod-submit-loader" style="display:none">
				</form>
			</div>
			
		</div>
	</div>
	<div class="col-xs-8 bod-table">
		<img src="<?=base_url().'assets/img/ajax_loader_square.gif'?>" id="tableDataLoader" style="display:none">
		<div class="panel panel-default">
				<table class="table table-bordered table-hover" id="bodTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Logo</th>
							<th>Name</th>
							<th>Country</th>
							<th>Address</th>
							<th>Website</th>
							<th>Action</th>
						</tr>	
					</thead>
					<tbody>

					
				
					</tbody>
				</table>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editBodiesModal" data-backdrop=static data-keyboard=false tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?=site_url('halalbodies/edit')?>" method="post" enctype="multipart/form-data">
			<div class="modal-header">
				<button type="button" id="close-btn" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Bodies</h4>
			</div>
			<div class="modal-body">				
				<div class="form-group">
					<label class="control-label">ID</label>				    
				    <input type="text" class="form-control" id="editBodId" name="bid" style="display:none">
				</div>
				<div class="form-group">
				    <label for="bod_name">Name</label>
				    <input type="text" class="form-control" id="editBodName" name="name">
				</div>

				<div class="form-group">
				    <label for="bod_name">Short Name</label>
				    <input type="text" class="form-control" id="editBodShortName" name="shortName">
				</div>

				<div class="form-group">
				    <label for="bod_name">Overview</label>
				    <textarea id="editBodOverview" class="form-control" rows="6" name="overview"></textarea>
				</div>

			  	<div class="form-group">
				    <label for="bod_addr">Country</label>
				    <input type="text" id="editBodCountry" class="form-control" name="country"> 
			  	</div>

			  	<div class="form-group">
				    <label for="places_addr">Address</label>
				    <textarea id="editBodAddr" class="form-control" name="address"></textarea>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
					    <label for="places_addr">Phone</label>
					    <input type="text" id="editBodPhone" class="form-control" name="phone"> 
					</div>
					<div class="form-group col-md-6">
					    <label for="places_addr">Fax</label>
					    <input type="text" id="editBodFax" class="form-control" name="fax"> 
					</div>				
				</div>

				<div class="row">
					<div class="form-group col-md-6">
					    <label for="places_addr">Email</label>
					    <input type="text" id="editBodEmail" class="form-control" name="email"> 
					</div>
					<div class="form-group col-md-6">
					    <label for="places_addr">Website</label>
					    <input type="text" id="editBodWeb" class="form-control" name="website"> 
					</div>					
				</div>
				<div class="form-group">
				    <label for="places_addr">Person In Charge</label>
				    <input type="text" id="editBodPic" class="form-control" name="pic"> 
				</div>

			  	<div class="form-group">
				    <label for="places_addr">Replace Halal Logo</label>				    				    
				    <input type="file" id="editBodHalalLogo" name="halalLogo">
				    <span class="help-block"><small>Make sure it's square.</small></span>
				</div>
				<img src="" id="currentHalalLogo" width=100>
				
			</div>
			<div class="modal-footer">
				<img src="<?=base_url().'assets/img/ajax_loader_square.gif'?>" id="bodUpdateLoader" style="display:none">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal-btn" data-loading-text="Close">Close</button>
				<button type="submit" class="btn btn-primary" id="updateBtn" data-loading-text="Updating...">Save Changes</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="delBodiesModal" data-backdrop=static data-keyboard=true tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close-btn" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
			</div>
			<div class="modal-body">				
				<p>Are you sure want to delete this bodies?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="delBodiesConfirm" data-loading-text="Deleting...">Delete</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">	

	jQuery(document).ready(function(){
		jQuery.ajax({
			url : "<?=API_HALALBODIES?>",
			type : "get",
			dataType : "json",
			beforeSend: function(){
				jQuery("#tableDataLoader").show();				
			},
			success: function(data){
				jQuery("#tableDataLoader").hide();
				var bodies = data.result.bodies;
				var rowHtml = "";
				for (var i = 0; i < bodies.length; i++) {
					var body = bodies[i];
					rowHtml += "<tr id="+i+" class='showBodiesDetail'>"+
									"<td>"+(i+1)+"</td>"+
									"<td><img width=40 src=http://localhost:5000/static/halal_logo/"+body.halalLogo+"></td>"+
									"<td>"+body.name+"</td>"+
									"<td>"+body.country+"</td>"+
									"<td>"+body.contact.address+"</td>"+
									"<td>"+body.contact.website+"</td>"+
									"<td class='text-center'><a href='#' id="+body._id.$oid+" key="+(i)+" class='btn btn-danger delBodiesBtn'><i class='glyphicon glyphicon-trash'></i></a>"+
										"<a href='#' id="+body._id.$oid+" key="+(i)+" class='btn btn-warning editBodiesBtn' data-toggle='modal'><i class='glyphicon glyphicon-edit'></i></a>"+
									"</td>"+
								"</tr>";					
				};
				jQuery("#bodTable tbody").html(rowHtml);
				addRowListener(bodies);
			},
			error: function(data){
				jQuery("#tableDataLoader").hide();
			}
		});
	});
	
	function addRowListener(bodies){
		jQuery(".editBodiesBtn").click(function(){

			var position = jQuery(this).attr("key");
			var body = bodies[position];

			jQuery("#editBodId").val(body._id.$oid);
			jQuery("#editBodName").val(body.name);
			jQuery("#editBodShortName").val(body.shortName);
			jQuery("#editBodOverview").html(body.overview);
			jQuery("#editBodCountry").val(body.country);
			jQuery("#editBodAddr").html(body.contact.address);
			jQuery("#editBodWeb").val(body.contact.website);
			jQuery("#editBodPhone").val(body.contact.phone);
			jQuery("#editBodPic").val(body.contact.pic);
			jQuery("#editBodFax").val(body.contact.fax);
			jQuery("#editBodEmail").val(body.contact.email);
			jQuery("#currentHalalLogo").attr("src","http://localhost:5000/static/halal_logo/"+body.halalLogo);

			jQuery("#editBodiesModal").modal('show');
		});

		jQuery(".delBodiesBtn").click(function(){
			console.log("delete!!!!!!");
			jQuery("#delBodiesModal").modal("show");
			jQuery("#delBodiesConfirm").prop("oid", $(this).prop("id"));			
		});

		jQuery("#delBodiesConfirm").click(function(){
			jQuery(this).button('loading');
			jQuery.ajax({
				url : "<?=site_url('halalbodies/delete')?>/"+$(this).prop("oid"),
				type : "GET",
				success: function(data){
					console.log(data);
					location.reload();
				}
			});
		});
	}

/*	jQuery("#updateBtn").click(function(){
		jQuery('#bodUpdateLoader').show();		

		console.log("value : "+jQuery("#editBodHalalLogo").val());

		jQuery.ajax({
			url : "<?=site_url('halalbodies/edit')?>/"+jQuery('#editBodId').html(),
			type : "POST",
			data : {				
				'name': jQuery("#editBodName").val(),
				'shortName': jQuery("#editBodShortName").val(),
				'overview': jQuery("#editBodOverview").val(),
				'country': jQuery("#editBodCountry").val(),
				'address': jQuery("#editBodAddr").val(),
				'website': jQuery("#editBodWeb").val(),
				'phone': jQuery("#editBodPhone").val(),
				'pic': jQuery("#editBodPic").val(),
				'fax': jQuery("#editBodFax").val(),
				'email': jQuery("#editBodEmail").val(),
				'halalLogo': jQuery("#editBodHalalLogo").val()
			},
			beforeSend: function(){
				jQuery(this).button('loading');
				jQuery("#close-modal-btn").button('loading');
				jQuery('#close-btn').attr('style','display:none');
			},
			success : function(){				
				jQuery("#editBodiesModal").modal('hide');				
				location.reload();
			}
		});
		
	});*/


</script>
