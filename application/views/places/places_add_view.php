<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery-ui.css">
<div class="wholepageloader" id="loader" style="display:none"></div>
<div class="wrapper">
	<div id="map-view">
		<div id="map-canvas"></div>
	</div>

	<? if(!$isEdit) {?>
	<div class="form-inline" id="query-form" role="form">
		<div class="form-group">			
			<input type="text" class="form-control" id="places-query" placeholder="Keyword">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="places-near" placeholder="Area (City/Province)">
		</div>		

		<button type="submit" id="helpme4sq" class="btn btn-primary">Find</button>
		<img src="<?=base_url().'assets/img/ajax_loader_square.gif'?>" id="4sqvenuesloader" style="display:none">		
	</div>
	<?}?>



	<div id="form-add-places" class="row">
		<div class="alert alert-success alert-dismissable" id="alertDialog" style="display:none">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span><b>Alhamdulillah!</b> You found another halal spot.</span>
		</div>

		<?if(isset($place)){
			echo form_open('places/edit/'.$place['_id']['$oid']);
		}else{
			echo form_open('places/create');
		}?>

		<input type="text" id="places-id" name="places_id" value="<?php if(isset($place)) echo $place['_id']['$oid']?>" style="display:none">

		<div class="form-group">
			<label for="places_name">Places Name</label>
			<input type="text" class="form-control" id="places-name" name="places_name" placeholder="Enter places name" value="<?php if(isset($place)) echo $place['name']?>">
		</div>

		<div class="row">
			<div class="form-group col-md-6">
			    <label for="places_addr">Halal Authentication</label>
			    <select class="form-control" id="places-halal" name="places_halal">			        
			  		<option value="1" <? if($isEdit && $place['halal']['type']==1) echo "selected"?>>Unverified</option>
			  		<option value="2" <? if($isEdit && $place['halal']['type']==2) echo "selected"?>>Verbal assurance from Staff</option>
			  		<option value="3" <? if($isEdit && $place['halal']['type']==3) echo "selected"?>>Menu labeled as Halal</option>
			  		<option value="4" <? if($isEdit && $place['halal']['type']==4) echo "selected"?>>Owners are known Muslim</option>
			  		<option value="5" <? if($isEdit && $place['halal']['type']==5) echo "selected"?>>Halal Sign in window</option>
			  		<option value="6" <? if($isEdit && $place['halal']['type']==6) echo "selected"?>>Halal Certificate on display</option>
			  		<option value="7" <? if($isEdit && $place['halal']['type']==7) echo "selected"?>>Government Authorization</option>
			  		<option value="8" <? if($isEdit && $place['halal']['type']==8) echo "selected"?>>Islamic Authorization</option>
				</select>
		  	</div>
		  	<div class="form-group col-md-6" id="places-bodies-con">
			    <label for="places_addr">Authorization Bodies</label>
			    <select class="form-control" id="places-bodies" name="places_bodies">
			    	<? foreach ($bodies as $key => $body) {
			    			echo $place['halal']['bodyId'];
				    		if($isEdit && $place['halal']['bodyId'] == $body['_id']['$oid']){
				    			echo '<option value="'.$body['_id']['$oid'].'" selected>'.$body['name'].'</option>';
				    		}else{
				    			echo '<option value="'.$body['_id']['$oid'].'">'.$body['name'].'</option>';
				    		}
			  			}
			  		?>
				</select>
		  	</div>
		</div>
		<div class="row">
			<div class="form-group col-md-8">
			    <label for="places_addr">Address</label>
			    <input type="text" id="places-address" class="form-control" name="places_address" placeholder="Complete places address" value="<?php if(isset($place)) echo $place['location']['address']?>"/>			    
		  	</div>

		  	<div class="form-group col-md-4">
			    <label for="places_addr">City</label>
			    <input type="text" class="form-control" id="places-city" name="places_city" placeholder="Places city" value="<?php if(isset($place)) echo $place['location']['city']?>">
	  		</div>

	  	</div>
	  	
	  	
	  	<div class="row">
		  	<div class="form-group col-md-6">
			    <label for="places_addr">Coordinate Longitude</label>
			    <input type="text" class="form-control" id="places-lng" name="places_lng" placeholder="Places longitude" value="<?php if(isset($place)) echo $place['location']['geocode']['coordinates']['0']?>">
		  	</div>

		  	<div class="form-group col-md-6">
			    <label for="places_addr">Coordinate Latitude</label>
			    <input type="text" class="form-control" name="places_lat" id="places-lat" placeholder="Places latitude" value="<?php if(isset($place)) echo $place['location']['geocode']['coordinates']['1']?>">
		  	</div>
	  	</div>

	  	<div class="row">		 
		  	<div class="form-group col-md-4">
			    <label for="places_addr">Zip Code</label>
			    <input type="text" class="form-control" id="places-zcode" name="places_zcode" placeholder="Zip Code" value="<?php if(isset($place)) echo $place['location']['zipCode']?>">
	  		</div>

		  	<div class="form-group col-md-4">
			    <label for="places_addr">Country</label>
			    <input type="text" class="form-control" id="places-country" name="places_country" placeholder="Places country" value="<?php if(isset($place)) echo $place['location']['country']?>">
		  	</div>

		  	<div class="form-group col-md-4">
			    <label for="places_addr">CC</label>
			    <input type="text" class="form-control" id="places-cc" name="places_cc" placeholder="Code" value="<?php if(isset($place)) echo $place['location']['cc']?>">
		  	</div>

	  	</div>	  	

		<div class="row">
			<div class="form-group col-sm-4">
	  		<label for="places_addr">Category</label>
		  	<select class="form-control" id="places-cat" name="places_cat">
		  		<?
		  			foreach ($categories as $key => $cat) {
		  				if($isEdit && $place['categoryId'] == $cat['_id']['$oid']){
		  					echo '<option value="'.$cat['_id']['$oid'].'" foursquare_id="'.$cat['foursquare_id'].'" selected>'.$cat['name'].'</option>';
		  				}else{
		  					echo '<option value="'.$cat['_id']['$oid'].'" foursquare_id="'.$cat['foursquare_id'].'">'.$cat['name'].'</option>';
		  				}		  				
		  			}
		  		?>
			</select>
			</div>

		  	<div class="form-group col-sm-4">
			    <label for="places_addr">Phone</label>
			    <input type="text" class="form-control" id="places-phone" name="places_phone" placeholder="Places phone" value="<?php if(isset($place)) echo $place['contact']['phone']?>">
		  	</div>

		  	<div class="form-group col-sm-4">
			    <label for="places_addr">Email</label>
			    <input type="text" class="form-control" id="places-email" name="places_email" placeholder="Places email, if any" value="<?php if(isset($place)) echo $place['contact']['email']?>">
		  	</div>
	  	</div>

	  	<div class="row">
		  	<div class="form-group col-sm-4">
			    <label for="places_addr">Twitter</label>
			    <input type="text" class="form-control" id="places-tw" name="places_tw" placeholder="Places twitter account" value="<?php if(isset($place)) echo $place['contact']['twitter']?>">
		  	</div>

		  	<div class="form-group col-sm-4">
			    <label for="places_addr">Facebook</label>
			    <input type="text" class="form-control" id="places-fb" name="places_fb" placeholder="Places facebook account" value="<?php if(isset($place)) echo $place['contact']['facebook']?>">
		  	</div>

		  	<div class="form-group col-sm-4">
			    <label for="places_addr">Website</label>
			    <input type="text" class="form-control" id="places-website" name="places_website" placeholder="Places website, if any" value="<?php if(isset($place)) echo $place['contact']['website']?>">
		  	</div>
	  	</div>

	  	<div class="form-group">
		    <label for="places_addr">Tags</label>
		    <input type="text" class="form-control" id="places-tags" name="places_tags" placeholder="Tags, separate with comma" value='<?php if(isset($place)) echo implode(",", $place["tags"]) ?>'>
	  	</div>

	  	<div class="row">
		  	<div class="form-group col-md-6">
			    <label for="places_addr">Foursquare ID</label>
			    <input type="text" class="form-control" disabled id="places-4sq-id" name="places_4sq_id" value="<?php if(isset($place)) echo $place['source']['id']?>">
		  	</div>
		  	<div class="form-group col-md-6">
			    <label for="places_addr">Verified</label>
			    <input type="text" class="form-control" disabled id="places-verified" value="">
		  	</div>
	  	</div>

	  	 	

	  	<div class="row" id="places-photo">

	  		<? if($isEdit) {
	  			foreach ($place['photos'] as $key => $photo) {
	  				echo "<img src='".$photo['url']."' class='img-thumbnail' />";
					echo "<input type='checkbox' url='".$photo['url']."' checked>";
	  			}										
	  		} ?>

	  	</div>
	  	
	  	<? if(!$isEdit){?>
			<button type="button" data-loading-text="Fetching data..." id="get-places-detail" class="btn btn-info">Get Detail</button>
			<button type="button" id="submit-places" class="btn btn-primary">Submit</button>
		<?} else { ?>
			<button type="button" id="submit-places" class="btn btn-warning">Update</button>
	  	<?}?>

	  	</form>
	</div>
</div>
    

<script type="text/javascript">

	var isEdit = "<?=$isEdit?>";
	var client_id = "EVX2EI5BGXAIAAIJV05QIO0KM2OYNUIPRKYETIDBZJ1KELH1";
	var client_secret = "LLNTG4K4YOZTPHZIE21UN2TSDE2R240FBJXY315BSNA0IG0F";
	var markers = Array();
	var availableVenues = Array();
	var nearGeocode;

	jQuery("#places-near").autocomplete({
		source: function (request, response) {
			jQuery.getJSON("http://gd.geobytes.com/AutoCompleteCity?callback=?&q="+request.term, function (data) {
			 response(data);
			}
		);
		},
		minLength: 3,
		select: function (event, ui) {
			var selectedObj = ui.item;
		 	jQuery("#places-near").val(selectedObj.value.split(',')[0]);
		 	return false;
		},
		open: function () {
		 	jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		},
		close: function () {
		 	jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		}
	 });

	jQuery("#geocode").click(function(){
		var address = jQuery("#places-address").val();
		var urlReadyAddress = address.split(' ').join('+');
		
		console.log("addr : "+urlReadyAddress);
		console.log("http://maps.googleapis.com/maps/api/geocode/json?address="+urlReadyAddress+"&sensor=false");

		jQuery.ajax({
			url : "http://maps.googleapis.com/maps/api/geocode/json?address="+urlReadyAddress+"&sensor=false",
			type : "get",
			dataType: "json",
			success : function(result){				
				console.log("result lat: "+result.results[0].geometry.location.lat);
				console.log("result lng: "+result.results[0].geometry.location.lng);

				jQuery('#places-lat').val(result.results[0].geometry.location.lat);
				jQuery('#places-lng').val(result.results[0].geometry.location.lng);
			}
		});
	});	

	jQuery("#submit-places").click(function(){

		var selectedPhoto = Array();
		var url = "<?=API_PLACES?>";

		jQuery("#places-photo input[type=checkbox]").each(function(){

			if(jQuery(this).prop("checked")){
				selectedPhoto.push(jQuery(this).attr("url"));
			}
		});		

		if(isEdit){
			url = "<?=site_url('places/update').'/'?>"+jQuery("#places-id").val();
		}

		jQuery.ajax({
			url : url,
			type : "post",
			dataType : "json",
			data : {
				"name" : jQuery('#places-name').val(),
				"address" : jQuery('#places-address').val(),
				"lat" : jQuery('#places-lat').val(),
				"lng" : jQuery('#places-lng').val(),
				"city" : jQuery('#places-city').val(),
				"country" : jQuery('#places-country').val(),
				"cc" : jQuery('#places-cc').val(),
				"zipCode" : jQuery('#places-zcode').val(),
				"phone" : jQuery('#places-phone').val(),
				"email" : jQuery('#places-email').val(),
				"website" : jQuery('#places-website').val(),
				"twitter" : jQuery('#places-tw').val(),
				"facebook" : jQuery('#places-fb').val(),
				"categoryId" : jQuery('#places-cat').val(),
				"tags" : jQuery('#places-tags').val(),
				"photoUrls" : selectedPhoto.join(),
				"halalType" : jQuery('#places-halal').val(),
				"halalDisplayValue" : jQuery('#places-halal option:selected').text(),
				"foursquareId" : jQuery('#places-4sq-id').val(),
				"bodyId" : jQuery("#places-bodies option:selected").val()
			},
			beforeSend: function(data){
				jQuery("#loader").show();
			},
			success: function(data){				
				jQuery("#loader").hide();
				if(isEdit){
					responseSuccessEdit(data);
				}else{
					responseSuccessCreate(data);					
				}			
			},
			error: function(xhr, ajaxOptions, thrownError){
				jQuery("#loader").hide();
				console.log("thrown error : "+thrownError);
				if(isEdit){
					responseFailEdit(xhr.responseJSON)
				}else{
					responseFailCreate(xhr.responseJSON)
				}
			}
		})
	});

	function responseSuccessEdit(result){		
		window.location = "<?=site_url('places/index')?>";
		return false;
	}

	function responseSuccessCreate(result){
		console.log(result);
		if(result.status){
			var submittedFoursquareId = jQuery('#places-4sq-id').val();
			for (var i = 0; i < availableVenues.length; i++) {
				if(submittedFoursquareId == availableVenues[i].id){
					availableVenues.splice(i, 1);
				}
			};
			clearAllMarkers();
			add4sqVenuesMarker(availableVenues, nearGeocode);
			resetAllField();
			showAlertDialog(true,"<b>Alhamdulillah !</b> You found another halal spot.");
		}
	}

	function responseFailEdit(result){
		showAlertDialog(false,"<b>Sorry !</b> We fail to update. Try again ?");
	}

	function responseFailCreate(result){
		console.log("error : "+JSON.stringify(result));
		showAlertDialog(false,"<b>Sorry !</b> "+result.result.message);	
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

	function clearAllMarkers(){
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(null);
		};
		markers = [];
	}

	function resetAllField(){
		jQuery('#places-name').val("");
		jQuery('#places-address').val("");
		jQuery('#places-city').val("");
		jQuery('#places-lat').val("");
		jQuery('#places-lng').val("");
		jQuery('#places-country').val("");
		jQuery('#places-cc').val("");
		jQuery('#places-zcode').val("");
		jQuery('#places-phone').val("");
		jQuery('#places-website').val("");
		jQuery('#places-tw').val("");		  			
		jQuery('#places-4sq-id').val("");
		jQuery('#places-tags').val("");
		jQuery('#places-photo').html("");
	}

	jQuery('#helpme4sq').click(function(){		
		jQuery('#4sqvenuesloader').show();
		jQuery(this).attr('disabled','disabled');
			
		var query = jQuery("#places-query").val();
		var near = jQuery("#places-near").val();

		if(query== "" || near == "")
		{
			jQuery('#4sqvenuesloader').hide();
			jQuery(this).removeAttr('disabled');
		}
		else
		{
			var url = "https://api.foursquare.com/v2/venues/search?v=20130815&client_id="+client_id+"&client_secret="+client_secret+"&near="+near+"&query="+query+"&intent=browse&limit=20";
			jQuery.ajax({
				url : url,
				type : "get",
				dataType : "jsonp",
				success : function(result){
					jQuery('#4sqvenuesloader').hide();
						jQuery('#helpme4sq').removeAttr('disabled');
					if(result.meta.code == 200){						
						console.log("count places : "+result.response.venues.length);
						nearGeocode = result.response.geocode.feature.geometry.center;
						sliceWithDatabasePlaces(result.response.venues, near, nearGeocode);						
					}else{
						alert("search result null");
					}	
				}
			});
		}	
	});

	function sliceWithDatabasePlaces(venues, near, geocode){
		var url = "<?=API_PLACES?>?city="+near+"&minified=true";
		var foursquareIdArr = Array();
		
		jQuery.ajax({
			url : url,
			type : "get",
			dataType : "json",
			success : function(result){
				var places = result.result.places;					
				for (var i = 0; i < places.length; i++) {
					if(places[i].source.type==1){
						foursquareIdArr.push(places[i].source.id);						
					}						
				}
				console.log(foursquareIdArr);			

				for (var i = 0; i < venues.length; i++) {
					if( jQuery.inArray(venues[i].id, foursquareIdArr) != -1){
						venues.splice(i, 1);
					}
				};
				console.log("new venues length : "+venues.length);
				availableVenues = venues;				
				add4sqVenuesMarker(availableVenues, geocode);
			}
		});		
	}

	function add4sqVenuesMarker(venues, nearGeocode){		
		var mapDiv = document.getElementById('map-canvas');
		var map = new google.maps.Map(mapDiv, {
			center: new google.maps.LatLng(nearGeocode.lat, nearGeocode.lng),
			zoom: 10,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
			
		for (var i = 0; i < venues.length; i++) {
			console.log("add marker : "+(i+1));
			console.log("position : "+venues[i].location.lat+","+venues[i].location.lng);			

			markers[i] = new google.maps.Marker({
	      		position: new google.maps.LatLng(venues[i].location.lat,venues[i].location.lng),
	      		map: map,
	      		title: venues[i].name+", "+venues[i].location.address
  			});			

  			addListenerToMarker(venues[i], markers[i]);  			
		};		
	}

	function addListenerToMarker(venue, marker){
		google.maps.event.addListener(marker, "click", function(){
  				console.log(venue.name);
  				jQuery('#places-name').val(venue.name);

  				jQuery('#places-address').val(venue.location.address);  				  				
  				jQuery('#places-city').val(venue.location.city);

  				jQuery('#places-lat').val(venue.location.lat);
  				jQuery('#places-lng').val(venue.location.lng);

  				jQuery('#places-country').val(venue.location.country);
  				jQuery('#places-cc').val(venue.location.cc);
  				jQuery('#places-zcode').val(venue.location.postalCode);

  				jQuery('#places-phone').val(venue.contact.phone);
  				jQuery('#places-website').val(venue.url);
  				jQuery('#places-tw').val(venue.contact.twitter);
  				  				
  				jQuery('#places-4sq-id').val(venue.id);
  				jQuery('#places-verified').val(venue.verified);

  				jQuery('#places-tags').val("");
  				jQuery('#places-photo').html("");


  				jQuery('select#places-cat option').each(function(){
  					if(venue.categories[0].id == jQuery(this).attr('foursquare_id')){
  						jQuery(this).attr('selected','selected');
  					}
  				});
  		});
	}
	
	jQuery('#get-places-detail').click(function(){
		$thisButton = jQuery(this);
		$thisButton.button('loading');
		var url = "https://api.foursquare.com/v2/venues/"+jQuery('#places-4sq-id').val()+"?v=20130815&client_id="
				+client_id+"&client_secret="+client_secret;
		jQuery.ajax({
				url : url,
				type : "get",
				dataType : "jsonp",
				success : function(result){
					$thisButton.button('reset');
														
					var imgHtml = "";
					var venuePhotoItems = result.response.venue.photos.groups[0].items;
					maxIndex = venuePhotoItems.length > 15 ? 15 : venuePhotoItems.length;

					for (var i = 0; i < maxIndex; i++) {
						imgHtml += "<img src='"+venuePhotoItems[i].prefix+"150x150"+venuePhotoItems[i].suffix+"' class='img-thumbnail' />";
						imgHtml += "<input type='checkbox' url='"+venuePhotoItems[i].prefix+"700x700"+venuePhotoItems[i].suffix+"'>";
					};

					console.log(imgHtml);
					console.log("tags : "+result.response.venue.tags.join());

					jQuery("#places-photo").html(imgHtml);
					jQuery("#places-tags").val(result.response.venue.tags.join());
				},
				error: function(result){
					$thisButton.button('reset');

					console.log("error : "+JSON.stringify(result));
				}
			});
	});

	jQuery("#places-halal").change(function(){
		var position = jQuery("#places-halal option:selected").val();
		if(position == 7 || position == 8){
			jQuery("#places-bodies-con").show();
		}else{
			jQuery("#places-bodies-con").hide();
		}
	});
	
	jQuery(document).ready(function(){
		if(!isEdit){
			jQuery("#places-bodies-con").hide();
		}
		
	});

	function initialize() {
	  var mapDiv = document.getElementById('map-canvas');
	  var lat = 1.2303741774326145;
	  var lng = 127.15576171875;
	  var zoom = 3;

	  if(isEdit){
	  	lat = jQuery("#places-lat").val();
	  	lng = jQuery("#places-lng").val();	  	
	  	zoom = 12;
	  }

	  var map = new google.maps.Map(mapDiv, {
	    center: new google.maps.LatLng(lat, lng),
	    zoom: zoom,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  });

	  if(isEdit){
	  	var marker = new google.maps.Marker({
	  		position : new google.maps.LatLng(lat, lng),
	  		map : map,
	  		title : jQuery("#places-name").val()+", "+jQuery("#places-address").val()
	  	});
	  }
	  
	}		

	function loadScript() {
	  var script = document.createElement('script');
	  script.type = 'text/javascript';
	  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
	      'callback=initialize';
	  document.body.appendChild(script);
	}



	window.onload = loadScript;

</script>