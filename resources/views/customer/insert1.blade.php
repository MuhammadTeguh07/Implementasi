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
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width:500px; margin-left:50px;">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Ambil Foto</h3>
            <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="kamera"></div>
            <div id="results" style="float:right; margin-top:-149px; margin-right:20px;"></div>
            <button id="btn_kamera" type="button" onclick="take_snapshot()" class="btn btn-primary"><i class="fa fa-camera fa-lg"></i></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" id="save" class="btn btn-primary simpan-foto" data-dismiss="modal">Save</button>
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
              <h2>Form Input Customer 1</h2>
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
              <form class="form-horizontal form-label-left" methode="POST" action="/customer/insert1">
                {{ csrf_field() }}
                <div style="float:left; width:1024px;">
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="email">Nama <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="email">Alamat<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="provinsi">Provinsi<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-9 col-xs-9">
                      <select name="provinsi" id="provinsi" class="form-control" >
                        <option>Pilih Provinsi</option>
                        @foreach($provinsi as $key => $value)
                          <option value="{{ $key }}" required="required">{{ $value }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="kota">Kota<span class="required">*</spa></label>
                    <div class="col-md-6 col-sm-9 col-xs-9">
                      <select name="kota" id="kota" class="form-control" required="required">
                        <option>Pilih Kota</option>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="kecamatan">Kecamatan<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-9 col-xs-9">
                      <select name="kecamatan" id="kecamatan"  class="form-control" required="required">
                        <option>Pilih Kecamatan</option>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" for="kelurahan">Kode Pos - Kelurahan <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-9 col-xs-9">
                      <select name="kelurahan" id="kelurahan" class="form-control" required="required">
                        <option>Pilih Kelurahan</option>
                      </select>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                </div>
                <div style="position:absolute; margin-left:700px;">
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left;">Foto<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="wrap">
                          <img src="" id="img" name="img" required="required">
                          <input id="foto" name="foto" type="hidden" value="" required="required">
                        </div>
                        <button type="button" onclick="btn_ambilFoto()" style="margin-top:10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Ambil Foto</button>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="form-group" style="margin-left: 900px;">
                    <div class="col-md-9 col-md-offset-3">
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

<style>
  #kamera{
    width: 200px;
    height: 150px;
    border: 1px solid #ccc;
    margin-left: 20px;
  }

  #wrap{
    width: 200px;
    height: 150px;
    border: 1px solid #ccc;
  }

  #btn_kamera{
    margin-top: 10px;
    margin-left: 105px;
  }
</style>
<!--Library WebCam-->
<script 
  src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" 
  integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" 
  crossorigin="anonymous">
</script>
<script 
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous">
</script>
<script 
  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
  crossorigin="anonymous">
</script>
<script>
    jQuery('select[name="provinsi"]').on('change',function(){
      var provinsiID = jQuery(this).val();
      if(provinsiID)
      {
        jQuery.ajax({
          url : '/customer/create1/getKota/' +provinsiID,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log(data);
            jQuery('select[name="kota"]').empty();
            jQuery.each(data, function(key, value){
              $('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          }
        });
      }
      else
      {
        $('select[name="kota"]').empty();
      }
    });
</script>

<script>
    jQuery('select[name="kota"]').on('change',function(){
      var kotaID = jQuery(this).val();
      if(kotaID)
      {
        jQuery.ajax({
          url : '/customer/create1/getKecamatan/' +kotaID,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log(data);
            jQuery('select[name="kecamatan"]').empty();
            jQuery.each(data, function(key, value){
              $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          }
        });
      }
      else
      {
        $('select[name="kecamatan"]').empty();
      }
    });
</script>
 
<script>
    jQuery('select[name="kecamatan"]').on('change',function(){
      var kecamatanID = jQuery(this).val();
      if(kecamatanID)
      {
        jQuery.ajax({
          url : '/customer/create1/getKelurahan/' +kecamatanID,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log(data);
            jQuery('select[name="kelurahan"]').empty();
            jQuery.each(data, function(key, value){
              $('select[name="kelurahan"]').append('<option value="'+ value.ID_KELURAHAN +'">'+ value.KODEPOS + ' - ' + value.NAMA_KELURAHAN +'</option>');
            });
          }
        });
      }
      else
      {
        $('select[name="kelurahan"]').empty();
      }
    });
</script>

<script>
  Webcam.set({
    width: 200,
    height: 150,
    image_format: 'jpeg',
    jpeg_quality: 90
  })

  function btn_ambilFoto(){
    Webcam.attach("#kamera")
  } 
    
  function take_snapshot(){
    Webcam.snap(function (data_uri){
      document.getElementById('results').innerHTML =
      '<img style="width:200px; height:150px;" id="hasil" src="'+data_uri+'"/>';
    });

    var hasil = $('#hasil').attr('src');
    $('#save').click(function(){
      $('#img').attr('src', hasil);
      $('#foto').val(hasil);
    });
  }
</script>
@endsection