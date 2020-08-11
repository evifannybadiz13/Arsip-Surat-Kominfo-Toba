@extends('master')
@section('content')

<!-- data tables -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h4><b>Terdisposisi<b></h4>
          </div>
    </section>


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b>Total: 0</b></h3>
   <div class="card-tools">
   <form action="/disposisi-terdisposisi/search" method="get">
   @csrf
                  <div class="input-group input-group-sm" style="width: 190px;">
                    <input type="search" name="search" class="form-control float-right" placeholder="Perihal,Pengirim" id="search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  </form>
                </div>
  </div>
   <!-- Table data suratmasuk-->
   <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
                          <th class="text-uppercase"><center>No</center></th>
                              <th class="text-uppercase"><center>No.Surat </center></th>
                              <th class="text-uppercase"><center>Tanggal Surat </center></th>
			                        <th class="text-uppercase"><center>Perihal </center></th>
                                    <th class="text-uppercase"><center>Konfirmasi Dari Kabid </center></th>
                              <th width="15%" class="text-uppercase"><center> Aksi</center></th>
			                    </tr>
			                    </thead>

</table>

 <!-- Main Footer -->
 <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a>Kominfo</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>302-B</b>
            </div>
        </footer>

@endsection
