<?php include_once('header.php'); ?>
 
	<?php include_once('post.php'); ?> 
	
	<div class="row">		
		<div class="col s12"> 			
			<?php include_once('navbar.php'); ?>			
		</div>
	</div>
		
	<div class="row">
		<div class="col s5">			
			<?php include_once('listing.php'); ?>
		</div>	
		
		<div class="col s7" id="map">			
			<div id="googleMap"></div>
		</div>		
	</div>
	
	<script src="map/map.js"></script> 
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>	 
	  
	<script>
	$(document).ready(function(){
		// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		$('.modal-trigger').leanModal();
		$('select').material_select();
	 });      
	</script>  

	<script>		
		function initialize() {

			new google.maps.places.Autocomplete(
			(document.getElementById('address')), {
				types: ['geocode']
			});
		}
		initialize();
	</script>
	
	
<?php include_once('footer.php'); ?>  