<!doctype html> 
@extends('layout/sidenav')

@section('konten')
<div class="right_col" role="main" style="min-height: 3754px;">
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
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Scan Barcoder</h2>
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
                        <div class="col-lg-12" class="form-inline"><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card" >
                                        <div class="block margin-bottom-sm"> <br>
                                            <center>
                                            <div style="float:left; width:50%;">
                                                <div>
                                                    <a class="btn btn-success" id="startButton" >Start</a>
                                                    <a class="btn btn-secondary" id="resetButton">Reset</a>
                                                </div>
                                                <br>
                                                <div>
                                                    <video id="video"  width="265" height="200" style="border: 1px solid gray"></video>
                                                </div>                  
                                                <div id="sourceSelectPanel" style="display:none">
                                                    <label for="sourceSelect">Change video source:</label>
                                                    <select id="sourceSelect" style="max-width:400px"></select>
                                                </div>
                                            </div>
                                            <div style="float:right; width:50%;">
                                                <div class="col-lg-12">
                                                    <label for="inlineFormInput" class="col-sm-form-control-label">Result</label>
                                                    <pre><code id="result" name="result"></code></pre>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="inlineFormInput" class="col-sm-form-control-label">Nama</label>
                                                    <pre><code id="nama" name="nama"></code></pre>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="inlineFormInput" class="col-sm-form-control-label">Latitude</label>
                                                    <pre><code id="lat1" name="lat1"></code></pre>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="inlineFormInput" class="col-sm-form-control-label">Longitude</label>
                                                    <pre><code id="long1" name="long1"></code></pre>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="inlineFormInput" class="col-sm-form-control-label">Accuracy</label>
                                                    <pre><code id="acc1" name="acc1"></code></pre>
                                                </div>
                                            </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Titik Kunjungan</h2>
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
                        <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <center>
                                    <main class="wrapper">
                                        <section class="container" id="demo-content">
                                            <label>Latitude</label>         
                                            <pre style="width:300px"><code id="lat2" name="lat2"></code></pre>
                                            <label>Longitude</label>         
                                            <pre style="width:300px"><code id="long2" name="long2"></code></pre>
                                            <label>Accuracy</label>         
                                            <pre style="width:300px"><code id="acc2" name="acc2"></code></pre>
                                        </section>
                                        <div class="row" style="width:100%;">
                                            <div class="col col-md-12" align="center">
                                                <button type="button" class="btn btn-primary btn-sm" onclick="getLocation()">Ambil Lokasi</button>
                                                <button type="button" class="btn btn-success btn-sm" onclick="getResult()">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </main>
                                </center>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })
            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };
            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }
          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text
                var id_toko = document.getElementById('result').innerHTML;
                console.log(id_toko);
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                  type: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': token
                  },
                  url: '/toko/req/',
                  data: {id : id_toko},
                  dataType: 'json',
                  success: function(data){
                    $('#nama').html(data.data[0].NAMA_TOKO);
                    $('#lat1').html(data.data[0].LATITUDE);
                    $('#long1').html(data.data[0].LONGITUDE);
                    $('#acc1').html(data.data[0].ACCURACY);
                  }
                });
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })
          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            document.getElementById('nama').textContent = '';
            document.getElementById('lat1').textContent = '';
            document.getElementById('long1').textContent = '';
            document.getElementById('acc1').textContent = '';
            console.log('Reset.')
          })
        })
        .catch((err) => {
          console.error(err)
        })
    })
    var lat = document.getElementById("lat2");
    var lon = document.getElementById("long2");
    var acc = document.getElementById("acc2");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
      } else { 
        lat.innerHTML = "Geolocation is not supported by this browser.";
        lon.innerHTML = "Geolocation is not supported by this browser.";
        acc.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
        
    function showPosition(position) {
        lat.innerHTML=position.coords.latitude;
        lon.innerHTML=position.coords.longitude;
        acc.innerHTML=position.coords.accuracy;
    }

    //hitung jarak antar 2 titik
    function getDistanceFromLatLonInKm(lat1,long1,lat2,long2) {
        var lat1 = document.getElementById("lat1").innerHTML;
        var long1 = document.getElementById("long1").innerHTML;
        var lat2 = document.getElementById("lat2").innerHTML;
        var long2 = document.getElementById("long2").innerHTML;

        var R = 6371000; // Radius of the earth in m
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(long2-long1); 
        var a = 
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
            Math.sin(dLon/2) * Math.sin(dLon/2)
        ; 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; // Distance in m
        return d;
    }

    function deg2rad(deg){
        return deg * (Math.PI/180)
    }

    // hasil result konfirmasi
    function getResult(){
        var acc1 = document.getElementById("acc1").innerHTML;
        var acc2 = document.getElementById("acc2").innerHTML;

        var mean = ((acc1/2)+(acc2/2));
        var jarak = getDistanceFromLatLonInKm(lat1,long1,lat2,long2);

        console.log(jarak);
        console.log(mean);
  
        if (jarak <= mean){
            alert('Anda berada dalam toko, Titik Kunjung Terkonfirmasi');
        }
        else{
            alert('anda tidak berada dalam toko');
        }
    }
</script>

@endsection