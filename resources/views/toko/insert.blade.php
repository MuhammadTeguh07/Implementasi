<!doctype html>
@extends('layout/sidenav')

@section('konten')
   
<div class="right_col" role="main" style="min-height: 949px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3></h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document" style="width:90%;">
        <div class="modal-content"  style="width:50%; margin-left:350px;">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Geolocation</h3>
            <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="map" style="height: 400px; width: 100%;"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix">
    </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Input Toko</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a></li>
                    <li><a href="#">Settings 2</a></li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">         
              <form class="form-horizontal form-label-left" methode="POST" action="/toko/insert">
                {{ csrf_field() }}
                <div style="float:left; width:1024px;">
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="email">Nama Toko<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="email">Latitude<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="double" id="latitude" name="latitude" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="email">Longitude<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="double" id="longitude" name="longitude" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="email">Accuracy<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="double" id="accuracy" name="accuracy" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="ln_solid">
                  </div>
                </div>
                  <div class="form-group">
                    <div class="col-md-3" style="margin-left:800px;">
                      <button id="geoloc" type="button" class="btn btn-secondary"  style="margin-top:-10px;" onclick="getlocation()">Geolocation</button>
                      <button id="send" type="submit" class="btn btn-success" style="margin-top:-10px;">Submit</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<!-- Geolocation -->
<script 
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
  crossorigin="anonymous">
</script>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<!--<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVwUr2P5oGKTcWluVSjN5hxyV5IkPKVA8&callback=initMap&libraries=&v=weekly"
      defer
    ></script>-->

<script>
// var nama = document.getElementById('nama');
var lat = document.getElementById('latitude');
var lng = document.getElementById('longitude');
var acc = document.getElementById('accuracy');

    function getlocation(){ 
			if(navigator.geolocation){ 
				navigator.geolocation.getCurrentPosition(showLoc, errHand); 
			} 
		} 
		function showLoc(pos){ 
			latt = pos.coords.latitude; 
			long = pos.coords.longitude; 
			var accuracy = pos.coords.accuracy;
            // x.innerHTML = "Latitude: " + latt + "<br>Longitude: " + long;
            lat.value = latt;
            lng.value = long
            acc.value = accuracy;

			 var hasil = "Latitude: " + latt + "\n Longitude: " + long + "\n Accuracy: "+accuracy;
		  //alert(hasil);	
			var lattlong = new google.maps.LatLng(latt, long); 
			var OPTions = { 
				center: lattlong, 
				zoom: 10, 
				mapTypeControl: true, 
				navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL}
			}
      var mapg = new google.maps.Map(document.getElementById("map"), OPTions); 
         $('#exampleModalCenter').modal('show');
      
			var markerg = 
      new google.maps.Marker({position:lattlong, map:mapg, title:"You are here!"}); 
      
		} 

		function errHand(err) { 
			switch(err.code) { 
				case err.PERMISSION_DENIED: 
					result.innerHTML = "The application doesn't have the permission" + 
							"to make use of location services" 
					break; 
				case err.POSITION_UNAVAILABLE: 
					result.innerHTML = "The location of the device is uncertain" 
					break; 
				case err.TIMEOUT: 
					result.innerHTML = "The request to get user location timed out" 
					break; 
				case err.UNKNOWN_ERROR: 
					result.innerHTML = "Time to fetch location information exceeded"+ 
					"the maximum timeout interval" 
					break; 
			} 
		} 
</script>
@endsection
