<script type="text/javascript"> 

	 $.urlParamListing = function(name){
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if(results){
			return results[1];
		}else{
			return 0;
		}		
	 }  
	
      var listCategory= $.urlParamListing('category');
	
	  var loading = true; 
	  var ListingCountPage=1;
	  var ListingPerpage=10;
	  var ListingOffset=0;
	  
	  function loadData() {
	   ListingOffset = ListingPerpage*(ListingCountPage-1);
	   var url = "api/fetch_listing.php";
	   $.getJSON(url,{"offset":ListingOffset,"listCategory":listCategory}, function(result) {
		   
		   if(result){
			   var arr = result.length;
				for(var i=0; i<arr; i++){
								
					 $("#postjson").append(			 			 
						 '<div class="card light-blue darken-4" id="'+result[i].id +'">'
							+'<div class="card-content white-text">'
								 
							  +'<p>'
								+'Name: '+result[i].data.name+'<br>'
								+'Requirement: '+result[i].data.requirement+'<br>'
								+'location: ' +result[i].data.location 						
							  +'</p>'
							  
							+'</div>'   
							+'<div class="card-action">'
								+'<div id="icon" align="right">'					
									+'<a class="btn-floating btn-large waves-effect waves-light blue-grey darken-4 tooltipped" onclick="window.open('+"'"+result[i].data.website+"'"+","+"'_blank'"+')" data-position="bottom" data-delay="50" data-tooltip="Website"><i class="material-icons">language</i></a>'
									+'<a class="btn-floating btn-large waves-effect waves-light blue-grey darken-4 tooltipped" onclick="alert('+"'"+ result[i].data.phone+"'"+')" data-position="bottom" data-delay="50" data-tooltip="Phone"><i class="material-icons">phone</i></a>'	
									+'<a class="btn-floating btn-large waves-effect waves-light blue-grey darken-4 tooltipped" onclick="alert('+"'"+ result[i].data.email+"'"+')" data-position="bottom" data-delay="50" data-tooltip="Email"><i class="material-icons">email</i></a>'																				             
								+'</div>'
							+'</div>'
						 +'</div>'
						);			
					
				}
		   }else{
			   return;
		   }
			
					
			// once we've loaded
			// kill the loading stuff
			ListingCountPage++;
			loading = false;
			$(".loading").remove();
		
	   });
	  }
	  
	  $(function() {
		loadData();
	   $(window).scroll(function(){
		  
				if  ($(window).scrollTop() == $(document).height() - $(window).height()){
					// add the loading box
					if(loading == false){
						loading = true;
						$("#postjson").append("<div class='loading'>Loading...</div>");
						loadData();
					}
					
				}
		}); 
	  
	   
	  });
	  
	  
</script>

<div class="grid" id="postjson">
 
</div> 