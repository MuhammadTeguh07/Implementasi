@extends('layout/sidenav')

@section('konten')
<div class="right_col" role="main" style="min-height: 1704px;">
  <!-- Contoh Modal -->
  <div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSayaLabel">Akun Google</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>

  <!-- /top tiles -->
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph">
      <div class="row x_title"> 
        <div class="col-md-6">
          <h3>Network Activities <small>Graph title sub-title</small></h3>
        </div>
        <div class="col-md-6">
          <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
            <span>August 30, 2020 - September 28, 2020</span> <b class="caret"></b>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body"> 
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
              </div>
            </div>
          </div>
          <div style="margin-top: 40px;">
            <h style="font-family: serif; font-size: 60px; margin-left:-30px;"><b>Welcome</b></h>
            <br>
            <h style="font-size: 35px;"><center>Muhammad Teguh</center></h>
          </div>
          <br>
          <div class="card-text text-sm-center" style="margin-bottom: 40px;">
            <center>
              <a href="#"><i class="fa fa-facebook pr-1"></i></a>
              <a href="#"><i class="fa fa-instagram pr-1"></i></a>
              <a href="#"><i class="fa fa-whatsapp pr-1"></i></a>
              <a href="#"><i class="fa fa-youtube-play pr-1"></i></a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
		  document.getElementById('result').innerHTML = '';
    });
  }
</script>
@endsection
