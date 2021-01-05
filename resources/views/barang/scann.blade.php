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
        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Detail</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3">ID BARANG : </label><span>:</span>
                            <div id="id" class="col-md-5"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">NAMA BARANG : </label><span>:</span>
                            <div id="nama" class="col-md-5"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <center><main class="wrapper">
                                        <section class="container" id="demo-content">
                                            <div>
                                                <button class="btn btn-success" id="startButton" style="width:70px; margin-left:7px;">Start</button>
                                                <button class="btn btn-secondary" id="resetButton" style="width:70px;">Reset</button>
                                            </div>
                                            <div>
                                                <video id="video" width="265" height="200" style="border: 1px solid gray" autoplay="true" muted="true" playsinline="true"></video>
                                            </div>
                                            <div id="sourceSelectPanel" style="display: block;">
                                                <label for="sourceSelect">Change video source:</label>
                                                <select id="sourceSelect" style="max-width:400px">
                                                <option value="undefined">Video device 1</option></select>
                                            </div>
                                            <label>Result:</label>         
                                            <pre style="width:300px"><code id="result"></code></pre>
                                        </section>
                                    </main></center>                              
                                </div>
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
    var a; // Membuat Variable a
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader() //Menggunakan Library ZXing
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices() //Mengecek list device vidio yang ada di laptop
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => { //Lalu menampilkan list vidio
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption) 
            })

            sourceSelect.onchange = () => { //Memilih device vidio yang digunakan
              selectedDeviceId = sourceSelect.value; 
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => { //Menjalankan Vidio
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) { //mengecek barcode
                console.log(result)
                document.getElementById('result').textContent = result.text; //Memasukkan hasil scan barcode ke result
                a = document.getElementById('result').textContent = result.text;
                data_barcode(); //Memanggil function untuk menampilkan data detailnya
                
              }
              if (err && !(err instanceof ZXing.NotFoundException)) { //Jika barcode error
                console.error(err)
                document.getElementById('result').textContent = err //Menampilkan pesan error ke result
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => { //Menutup vidio
            codeReader.reset()
            document.getElementById('result').textContent = ''; //Mereset hasil yang sudah muncul di result
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err) //Menampilkan error library ZXing
        })
    })

    function data_barcode(){    //Function untuk menambil detail data dari barcode 
        console.log('masuk data_barcode');
        // var hasil= document.getElementById('result').value;
        console.log('tampil variable hasil');
        console.log(a);
        jQuery.ajax({
            url : '/barang/alert/' +a,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                console.log(data);
                jQuery.each(data, function(key,value){
                    var id = value.ID_BARANG ; //Mengambil ID Barang
                    var nama = value.NAMA_BARANG; //Mengambil Nama Barang
                    $('#id').html(id); //ID Barang di masukkan ke id
                    $('#nama').html(nama);//Nama Barang dimasukkan ke nama
                    $('#modal').modal('show');//Menampilkan Modal
                });
            }
        });
    }
</script>


@endsection