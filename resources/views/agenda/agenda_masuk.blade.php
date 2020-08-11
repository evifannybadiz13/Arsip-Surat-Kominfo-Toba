@extends('master')
@section('content')

<!-- data tables -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Agenda Surat Masuk {{$tahun}}</h1>
            </div>
            @if(auth()->user()->role=='admin')
            <div class="col-sm-12">
                <div style="text-align:right; width:100%; padding:0;">
                    <div class="card-header">
                        <a href="/agenda_masuk/cetak_pdf" type="button" class="btn btn-info btn-sm" target="_blank">CETAK
                            PDF</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Default box -->
<div class="card">
    <div class="card-header">

        <h3 class="card-title"><b>Total Data: {{count($agenda_masuk)}}</b></h3>
        <div class="card-tools">
            <form action="/agenda_masuk/search" method="get">
                @csrf
                <div class="input-group input-group-sm" style="width: 350px;">
                    <input type="search" name="search" class="form-control float-right" placeholder="Perihal, Pengirim, No.Surat, Tahun Surat" id="search">
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
                    <th width="10%">
                        <center>No</center>
                    </th>
                    <th>
                        <center>No.Surat </center>
                    </th>
                    <th>
                        <center>Tanggal Surat</center>
                    </th>
                    <th>
                        <center>Tanggal Terima</center>
                    </th>
                    <th >
                        <center>Pengirim </center>
                    </th>
                    <th>
                        <center>Perihal </center>
                    </th>
                </tr>
            </thead>
            @foreach($agenda_masuk as $data => $hasil)
            <tr>
                <td>
                    {{$data + 1}}
                </td>
                <td>
                    {{$hasil->nomor_surat}}
                </td>
                <td>
                    {{$hasil->tgl_surat}}
                </td>
                <td>
                    {{$hasil->tgl_terima}}
                </td>
                <td>
                    {{$hasil->pengirim}}
                </td>
                <td>
                    {{$hasil->perihal}}
                </td>

            </tr>
            @endforeach
            <tr>
        </table>
        {{$agenda_masuk->links()}}
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
