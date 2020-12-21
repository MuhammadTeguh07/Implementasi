<!doctype html>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ asset('template/gentela/production/index.html') }}" class="site_title"><i class="fa fa-paw"></i> <span>Implementasi</span></a>
          </div>
          <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('template/gentela/production/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Muhamad Teguh</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section active">
                <h3>General</h3> 
                <ul class="nav side-menu" style="">
                  <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                  <li><a><i class="fa fa-user"></i>Customer<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="block;">
                      <li><a href="/customer">Data Customer</a></li>
                      <li><a href="/customer/create1">Tambah Customer 1</a></li>
                      <li><a href="/customer/create2">Tambah Customer 2</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-briefcase"></i>Barang<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="block;">
                      <li><a href="/barang">Data Barang</a></li>
                      <li><a href="/barang/scan">Scan Barcode</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map-marker"></i>Toko<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="block;">
                      <li><a href="/toko">Data Toko</a></li>
                      <li><a href="/toko/create">Tambah Toko</a></li>
                      <li><a href="/toko/scan">Scan Barcode</a></li>
                    </ul>
                  </li>
                  <li><a href="/excel"><i class="fa fa-file-excel-o"></i>Input Excel</a></li>
                  <li><a href="/"><i class="fa fa-download"></i>Panduan</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="" href="login.html" data-original-title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
            @include('layout/header')
        <!-- /top navigation -->

        <!-- page content -->
            @yield('konten')
        <!-- /page content -->

        <!-- footer content -->
            @include('layout/footer')
        <!-- /footer content -->
      </div>
    </div>
  </div>
  <!-- Library Google Platform -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>

</body>
<div class="jqvmap-label" style="display: none;">
</div>
<div class="daterangepicker dropdown-menu ltr opensleft">
<div class="calendar left"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="calendar right"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom">Custom</li></ul><div class="range_inputs"><button class="applyBtn btn btn-default btn-small btn-primary" disabled="disabled" type="button">Submit</button> <button class="cancelBtn btn btn-default btn-small" type="button">Clear</button></div></div></div></body>
