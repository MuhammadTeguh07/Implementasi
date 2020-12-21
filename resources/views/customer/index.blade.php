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
        @foreach($customer as $c)
        <div class="modal fade" id="sembarang{{$c -> ID_CUSTOMER}}" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Detail</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-5 col-sm-6 col-xs-12" style="margin-top:20px; margin-bottom:20px;">
                            @if ( isset($c->FOTO) )
                                <img src="{{(base64_decode($c->FOTO))}}">
                            @elseif ( isset($c->FILE_PATH) )
                                <img src="{{ asset($c->FILE_PATH) }}">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">NAMA</label><span>:</span>
                            {{ $c->NAMA }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">ALAMAT</label><span>:</span>
                            {{ $c->ALAMAT }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">KODE POS</label><span>:</span>
                            @php
                                $kodepos = DB::table('kelurahan')->where('ID_KELURAHAN', $c->ID_KELURAHAN)->value('KODEPOS');
                                echo $kodepos;
                            @endphp
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">KELURAHAN</label><span>:</span>
                            @php
                                $kelurahan = DB::table('kelurahan')->where('ID_KELURAHAN', $c->ID_KELURAHAN)->value('NAMA_KELURAHAN');
                                echo $kelurahan;
                            @endphp
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">KECAMATAN</label><span>:</span>
                            @php
                                $id_kecamatan = DB::table('kelurahan')->where('ID_KELURAHAN', $c->ID_KELURAHAN)->value('ID_KECAMATAN');
                                $kecamatan = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('NAMA_KECAMATAN');
                                echo $kecamatan;
                            @endphp
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">KOTA</label><span>:</span>
                            @php
                                $id_kota = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('ID_KOTA');
                                $kota = DB::table('kota')->where('id_kota', $id_kota)->value('NAMA_KOTA');
                                echo $kota;
                            @endphp
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">PROVINSI</label><span>:</span>
                            @php
                                $id_provinsi = DB::table('kota')->where('id_kota', $id_kota)->value('ID_PROVINSI');
                                $provinsi = DB::table('provinsi')->where('id_provinsi', $id_provinsi)->value('NAMA_PROVINSI');
                                echo $provinsi;
                            @endphp
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary simpan-foto" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Customer</h2>
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
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="datatable_length">
                                            <label>Show 
                                                <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="datatable_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" style="width: 100px;"><center>ID CUSTOMER</center></th>
                                                    <th class="sorting" style="width: 100px;"><center>ID KELURAHAN</center></th>
                                                    <th class="sorting" style="width: 100px;"><center>NAMA</center></th>
                                                    <th class="sorting" style="width: 200px;"><center>ALAMAT</center></th>
                                                    <th class="sorting" style="width: 90px;"><center>AKSI</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>    
                                                @foreach($customer as $c)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $c->ID_CUSTOMER }}</td>
                                                    <td>{{ $c->ID_KELURAHAN }}</td>
                                                    <td>{{ $c->NAMA }}</td>
                                                    <td>{{ $c->ALAMAT }},
                                                        @php
                                                            $kodepos = DB::table('kelurahan')->where('ID_KELURAHAN', $c->ID_KELURAHAN)->value('KODEPOS');
                                                            $kelurahan = DB::table('kelurahan')->where('ID_KELURAHAN', $c->ID_KELURAHAN)->value('NAMA_KELURAHAN');
                                                            $id_kecamatan = DB::table('kelurahan')->where('ID_KELURAHAN', $c->ID_KELURAHAN)->value('ID_KECAMATAN');
                                                            $kecamatan = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('NAMA_KECAMATAN');
                                                            $id_kota = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('ID_KOTA');
                                                            $kota = DB::table('kota')->where('id_kota', $id_kota)->value('NAMA_KOTA');
                                                            $id_provinsi = DB::table('kota')->where('id_kota', $id_kota)->value('ID_PROVINSI');
                                                            $provinsi = DB::table('provinsi')->where('id_provinsi', $id_provinsi)->value('NAMA_PROVINSI');
                                                            echo '('.$kodepos.') ' . $kelurahan . ', ' . $kecamatan . ', ' . $kota . ', ' . $provinsi;
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a data-toggle="modal" href="#sembarang{{$c -> ID_CUSTOMER}}"><button type="button" class="btn btn-info" >Detail</button></a>
                                                        </center>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled" id="datatable_previous">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a>
                                                </li>
                                                <li class="paginate_button active">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a>
                                                </li>
                                                <li class="paginate_button next" id="datatable_next">
                                                    <a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection