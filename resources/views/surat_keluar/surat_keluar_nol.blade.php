@extends('master')
@section('content')

<!-- data tables -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Surat Keluar</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Default box -->
<div class="card">
    @if(auth()->user()->role=='admin')
    <div class="card-header">
        <a href="/tambah_suratkeluar" type="button" class="btn btn-primary  btn-sm ">Tambah Surat
            Keluar Baru</a>
        <a href="/surat_keluar/cetak_pdf" type="button" class="btn btn-info btn-sm" target="_blank">CETAK
            PDF</a>
        <div class="card-tools">
            <form action="/surat_keluar/search" method="get">
                @csrf
                <div class="input-group input-group-sm" style="width: 190px;">
                    <input type="search" name="search" class="form-control float-right" placeholder="Perihal, No. Surat" id="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    <!-- Table data suratmasuk-->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Nomor Surat </center>
                    </th>
                    <th>
                        <center>Pengirim</center>
                    </th>
                    <th>
                        <center>Tanggal Surat </center>
                    </th>
                    <th>
                        <center>Isi Ringkas</center>
                    </th>
                    <th>
                        <center>Ditujukan ke</center>
                    </th>
                    <th width="15%">
                        <center> Aksi</center>
                    </th>
                </tr>
            </thead>
            <tr>
        </table>
        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a>Kominfo</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>302-B</b>
            </div>
        </footer>
    </div>
</div>

@endsection