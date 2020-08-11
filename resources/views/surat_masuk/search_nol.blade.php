@extends('master')
@section('content')

<!-- data tables -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h4><b>Surat Masuk</b></h4>
            </div>
            <div class="col-sm-12">
                <div style="text-align:right; width:100%; padding:0;">
                    <div class="card-header">
                    @if(auth()->user()->role=='admin')
                        <a href="/createsuratmasuk" type="button" class="btn btn-primary  btn-sm ">Tambah Surat
                            Masuk</a>
                   
                        <a href="/surat_masuk/cetak_pdf" type="button" class="btn btn-info btn-sm" target="_blank">CETAK
                            PDF</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Default box -->
<div class="card">
    <div class="card-header">  
        
        <h3 class="card-title"><b>Total Data: 0</b></h3>
        <div class="card-tools">
            <form action="/surat_masuk/search" method="get">
                @csrf
                <div class="input-group input-group-sm" style="width: 190px;">
                    <input type="search" name="search" class="form-control float-right " placeholder="Perihal, Pengirim" id="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Table data suratmasuk-->
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th>
                        <center>#</center>
                    </th>
                    <th>
                        <center>No.Surat </center>
                    </th>
                    <th>
                        <center>Tanggal Surat </center>
                    </th>
                    <th>
                        <center>Tanggal Terima </center>
                    </th>
                    <th>
                        <center>Pengirim </center>
                    </th>
                    <th>
                        <center>Perihal </center>
                    </th>
                    <th width="15%">
                        <center> Aksi</center>
                    </th>
                </tr>
            </thead>
         
        </table>
        <!-- Main Footer -->
      
    </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a>Kominfo</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>302-B</b>
            </div>
        </footer>

        @endsection