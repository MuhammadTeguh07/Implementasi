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
        <!-- Modal Edit -->
        @foreach($barang as $b)
        <div class="modal fade" id="editBarang{{ $b->ID_BARANG }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" methode="POST" action="/barang/edit">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="control-label col-md-3">ID Barang <span class="required">:</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="id" name="id" value="{{ $b->ID_BARANG }}" readonly class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3">Nama Barang <span class="required">:</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="nama" name="nama" value="{{ $b->NAMA_BARANG }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Modal Tambah -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" methode="POST" action="/barang/insert">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="control-label col-md-3">Nama Barang <span class="required">:</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Barang</h2>
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Barang
                                </button>
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
                                                    <th class="sorting" style="width: 100px;"><center>ID BARANG</center></th>
                                                    <th class="sorting" style="width: 200px;"><center>NAMA BARANG</center></th>
                                                    <th class="sorting" style="width: 200px;"><center>TIMESTAMP</center></th>
                                                    <th class="sorting" style="width: 200px;"><center>BARCODE</center></th>
                                                    <th class="sorting" style="width: 200px;"><center>AKSI</center></th>
                                                </tr>
                                            </thead> 
                                            <tbody>   
                                                @foreach($barang as $b)
                                                <tr role="row" class="odd">
                                                    <td><center>{{ $b->ID_BARANG }}</center></td>
                                                    <td>{{ $b->NAMA_BARANG }}</td>
                                                    <td>{{ $b->TIME_STAMP }}</td>
                                                    <td><center>{!! \DNS1D::getBarcodeHTML("$b->ID_BARANG", "C128") !!}</center></td>
                                                    <td>
                                                        <center>
                                                            <a href="/barang/print/{{ $b->ID_BARANG }}" target="_blank"><button class="btn btn-secondary" type="button">
                                                                <span class="glyphicon glyphicon-print" style="margin-right:5px;"></span>Print</button>
                                                            </a>
                                                            <a data-toggle="modal" href="#editBarang{{$b -> ID_BARANG}}"><button class="btn btn-success" type="button">
                                                                <span class="fa fa-edit" style="margin-right:5px;"></span>Edit</button>
                                                            </a>
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