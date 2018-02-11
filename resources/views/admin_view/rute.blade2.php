@extends("layout")
@section("title","Rute")
@section("content")
<div id="googleMap" style="width:100%;height:500px;"></div>

	
<script async defer src="https://maps.google.com/maps/api/js?key=AIzaSyCUNTIrsbEnViP9w632qQVjihnxWRJqSqs&callback=initialize&sensor=false"
  type="text/javascript"></script>

<script>



function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(initialize);
    } else { 
        alert("Geolocation is not supported by this browser.");
    }
}


function initialize(position) {
	
	var directionsService = new google.maps.DirectionsService;
  	var directionsDisplay = new google.maps.DirectionsRenderer;
	
 var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};
  //var myLatLng = {lat: -6.22517, lng: 106.692};
  
  var beaches = [
  <?php
  	foreach($list as $list){
		$latlong = Fungsi::lat_long($list->market_address);
		?>
		["<?php echo $list->market_name?>", <?php echo $latlong[0]?>, <?php echo $latlong[1]?>,"<?php echo "icon.png"?>",<?php echo $list->id?>],	
		<?php	
	}
  ?>
  
  
 
];


  var mapProp = {
    center:myLatLng,
    zoom:13,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  

  
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  
  var image = '{{asset('img/orang.png')}}';
  var image2 = '{{asset('img/icon.png')}}';

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'My Position',
	icon: image,
	animation: google.maps.Animation.DROP,
	
  });
  
 var contentString=[];

  
  for (var i = 0; i < beaches.length; i++) {
    var beach = beaches[i];

    var marker2 = new google.maps.Marker({
      position: {lat: beach[1], lng: beach[2]},
      map: map,
      icon: image2,
      title: beach[0],

	   });
	
   var url_to = "{{URL::to("admin/market/detail/")}}/";
   var url_pic = "{{asset("img/")}}/";
  
	  contentString.push('<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<a href="'+url_to+beach[4]+'" target="_blank"><h1 id="firstHeading" class="firstHeading">'+beach[0]+'</h1></a>'+
        '<div id="bodyContent">'+
      '<img src="'+url_pic+beach[3]+'" width="100" height="100"></a>'+
        '</div>'+
        '</div>')
   
     
     

    //alert(url_pic+beach[3]);
	
	/* var infowindow = new google.maps.InfoWindow({
    	content: contentString,
    	
  	});*/
    var infowindow = new google.maps.InfoWindow(), marker2, i;
	
	 google.maps.event.addListener(marker2,'click',function() {
	  	
      directionsDisplay.setMap(null);
		  directionsDisplay.setDirections({ routes: [] }); 
		calculateAndDisplayRoute(directionsService, directionsDisplay,myLatLng,this.position) ;
		directionsDisplay.setMap(map);
		
    //infowindow.open(map, this);
		//alert(this.position)

	 });

    google.maps.event.addListener(marker2, 'mouseover', (function(marker2, i) {
            return function() {
                infowindow.setContent(contentString[i]);
                infowindow.open(map, marker2);
            }
        })(marker2, i));
	 

   
	 /*google.maps.event.addListener(marker2,'mouseover',function() {	
		 	infowindow.open(map, marker2);
			
	 });

   google.maps.event.addListener(marker2,'mouseout',function() { 
      infowindow.close();
      
   });*/
	
  }

  

}
google.maps.event.addDomListener(window, 'load', initialize);


function calculateAndDisplayRoute(directionsService, directionsDisplay,origin,destination) {
  directionsService.route({
    origin: origin,
    destination: destination,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

</script>
<script>
	$(document).ready(function(e) {
        getLocation(); 
    });
</script>
@endsection