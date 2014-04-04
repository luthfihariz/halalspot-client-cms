<ul class="pagination right">
</ul>
<img src="<?=base_url().'assets/img/ajax_loader_square.gif'?>" id="tableDataLoader" style="display:none">
<div class="clr"></div>
<p id="tableCount"><b></b></p>

<div class="panel panel-default">
<table class="table table-condensed table-hover" id="placesTable">
	<thead>
		<tr>
			<th>#</th>
			<th>Places Name</th>
			<th>Category</th>
			<th>Halal Auth</th>
			<th>Address</th>
			<th>City</th>
			<th>Country</th>
			<th>Action</th>
		</tr>	
	</thead>
	<tbody>
		
	</tbody>
</table>
	<div class="modal fade" id="placeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" id="close-btn" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Places Detail</h4>
				</div>
				<div class="modal-body">					
					
					<div class="form-group">
						<label class="control-label">Name</label>				    
					    <p class="form-control-static" id="detPlaceName"></p>
					</div>
					<div class="form-group">
						<label class="control-label">Category</label>				    
					    <p class="form-control-static" id="detPlaceCat"></p>						
					</div>
					<div class="row">						
						<div class="form-group col-md-6">
							<label class="control-label">Halal Authentication</label>   
						    <p class="form-control-static" id="detPlaceHalal"></p>
						</div>
						<div class="form-group col-md-6">
							<label class="control-label">Halal Bodies</label>				    
						    <p class="form-control-static" id="detPlaceBodies"></p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Address</label>				    
					    <p class="form-control-static" id="detPlaceAddr"></p>
					</div>
					<div class="form-group">
						<label class="control-label">Coordinate</label>				    
					    <p class="form-control-static" id="detPlaceCoor"></p>
					</div>
					<div class="form-group">
						<label class="control-label">Tags</label>				    
					    <p class="form-control-static" id="detPlaceTags"></p>
					</div>		
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label">Website</label>				    
						    <p class="form-control-static" id="detPlaceWeb"></p>
						</div>
						<div class="form-group col-md-6">
							<label class="control-label">Phone</label> 
						    <p class="form-control-static" id="detPlacePhone"></p>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label">Twitter</label>				    
						    <p class="form-control-static" id="detPlaceTw"></p>
						</div>
						<div class="form-group col-md-6">
							<label class="control-label">Facebook</label>				    
						    <p class="form-control-static" id="detPlaceFb"></p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Source</label> 
					    <p class="form-control-static" id="detPlaceSource"></p>
					</div>
					<div id="detPhotoContainer"> 
						
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal-btn" data-loading-text="Close">Close</button>
					<a role="button" href="<?=site_url('places/edit')?>" class="btn btn-warning" id="editButton">Edit</a>
				</div>
			</div>
		</div>
	</div>
</div>

<ul class="pagination right">
</ul>

<div class="modal fade" id="delPlacesModal" data-backdrop=static data-keyboard=true tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close-btn" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
			</div>
			<div class="modal-body">				
				<p>Are you sure want to delete this places?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="delPlacesConfirm" data-loading-text="Deleting...">Delete</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

	var currentPage = 1;

	jQuery(document).ready(function(){
		loadPlaces((currentPage-1)*20);
	});
	
	function loadPlaces(skip){
		jQuery.ajax({
			url : "<?=API_PLACES?>?limit=20&minified=false&skip="+skip,
			type : "get",
			dataType : "json",
			beforeSend : function(data){
				jQuery("#tableDataLoader").show();
			},
			success : function(data){
				jQuery("#tableDataLoader").hide();
				var places = data.result.places;
				var rowHtml = "";
				var bodiesName = "";
				
				for(var i=0;i<places.length;i++){

					if(places[i].halal.bodies!=null){
						bodiesName = places[i].halal.bodies.name;
					}else{
						bodiesName = "";
					}
					rowHtml += "<tr key='"+i+"'>"+
									"<td>"+(i+1)+"</td>"+
									"<td>"+places[i].name+"</td>"+
									"<td>"+places[i].category.name+"</td>"+
									"<td>"+bodiesName+"</td>"+
									"<td>"+places[i].location.address+"</td>"+
									"<td>"+places[i].location.city+"</td>"+
									"<td>"+places[i].location.country+"</td>"+								
									"<td class='text-center'>"+
										"<a id="+places[i]._id.$oid+" key="+i+" class='viewPlaces btn btn-info'><i class='glyphicon glyphicon-search'></i></a>"+
										"<a id="+places[i]._id.$oid+" class='deletePlaces btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a>"+
									"</td>"+
								"</tr>";					
				}
				jQuery("#placesTable tbody").html(rowHtml);
				jQuery("#placesSize").html(data.result.count);

				createPagination(data.result.count);
				addRowListener(places);
				deleteListener();
			},
			error : function(data){
				jQuery("#tableDataLoader").hide();				
			}
		});
	}

	function createPagination(count){
		var totalPage = Math.ceil(count/20);
		var paginationHtml = "";
		if(currentPage==1){
			paginationHtml += "<li class='disabled'><a>&laquo;</a></li>";
		}else{
			paginationHtml += "<li><a href='#' onclick=nextPage("+(currentPage-1)+")>&laquo;</a></li>";			
		}
		
		for (var i = 1; i <= totalPage; i++) {
			if(i==currentPage){
				paginationHtml += "<li class='active'><a href='#'>"+(i)+"</a></li>";
			}else{
				paginationHtml += "<li><a href='#' onclick=nextPage("+i+")>"+(i)+"</a></li>";
			}  			
		}
		startNumber = ((currentPage-1)*20) + 1;
		endNumber = (currentPage*20)-1;
		if(currentPage==totalPage){
			paginationHtml += "<li class='disabled'><a>&raquo;</a></li>";
			endNumber = count;
		}else{
			paginationHtml += "<li><a href='#' onclick=nextPage("+(currentPage+1)+")>&raquo;</a></li>";

		}
		
		jQuery(".pagination").html(paginationHtml);
		jQuery("#tableCount").html("Showing <b>"+startNumber+"</b> - <b>"+endNumber+"</b> of <b>"+count+"</b>");
	}

	function nextPage(page){
		currentPage = page;
		skip = (page-1)*20;
		console.log(skip);
		loadPlaces(skip);
	}

	function addRowListener(places){
		jQuery(".viewPlaces").click(function(){
			
			var index = jQuery(this).attr("key");			
						
			jQuery("#detPlaceName").html(places[index].name);
			jQuery("#detPlaceHalal").html(places[index].halal.displayValue);
			if(places[index].halal.bodies != null){
				jQuery("#detPlaceBodies").html(places[index].halal.bodies.name);
			}
			jQuery("#detPlaceCat").html(places[index].category.name);
			jQuery("#detPlaceAddr").html(places[index].location.address+", "+places[index].location.city+", "+places[index].location.country+" "+places[index].location.zipCode);
			jQuery("#detPlaceCoor").html(places[index].location.geocode.coordinates[1]+", "+places[index].location.geocode.coordinates[0]);
			jQuery("#detPlaceTags").html(places[index].tags.join());
			jQuery("#detPlaceWeb").html("<a href='"+places[index].contact.website+"' target='_blank'>"+places[index].contact.website+"</a>");		
			jQuery("#detPlacePhone").html(places[index].contact.phone);
			jQuery("#detPlaceTw").html(places[index].contact.twitter);
			jQuery("#detPlaceFb").html(places[index].contact.facebook);
			jQuery("#detPlaceSource").html("<a href='http://"+places[index].source.link+"' target='_blank'>"+places[index].source.name+"</a>");
			jQuery("#editButton").attr("href","<?=site_url('places/edit')?>"+"/"+places[index]._id.$oid);

			var photos = places[index].photos;			
			if(photos.length > 0){
				var photoHtml = "";
				photos.forEach(function(photo){
					photoHtml += '<a href="'+photo.url+'" target="_blank"><img src="'+photo.url+'"></a>';
				});
				jQuery("#detPhotoContainer").html(photoHtml);
			}

			jQuery("#placeModal").modal('show');
		});		
	}

	function deleteListener(){
		jQuery(".deletePlaces").click(function(){
			jQuery("#delPlacesModal").modal('show');
			jQuery("#delPlacesConfirm").prop('oid', $(this).prop("id"));
		});
	}

	jQuery("#delPlacesConfirm").click(function(){
		jQuery(this).button('loading');
		jQuery.ajax({
			url : "<?=site_url('places/delete')?>/"+$(this).prop("oid"),
			type : "GET",
			success: function(data){
				console.log(data);
				location.reload();
			}
		});
	});
	

	
	
</script>