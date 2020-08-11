@extends('master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Disposisi</h1>
            </div>
</section>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Total: {{count($disposisi)}} || Belum Dikonfirmasi: {{count($jumlah)}}</b></h3>
        <div class="card-tools">
            <form action="/disposisi-statistik/search" method="get">
                @csrf
                <div class="input-group input-group-sm" style="width: 190px;">
                    <input type="search" name="search" class="form-control float-right" placeholder="Pengirim, Perihal" id="search">
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
                        <center>No</center>
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
                        <center>Perihal </center>
                    </th>
                    <th width="15%">
                        <center> Aksi</center>
                    </th>
                </tr>
            </thead>
            @foreach($disposisi as $data => $hasil)
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
                    {{$hasil->perihal}}
                </td>


                <td class="project-action">
                    @if($hasil->status_kabid=='Menunggu')
                    <a class="btn btn-success btn-sm" href="/disposisi-konfirmasi/{{$hasil->id}}">
                        <!--  <span class="info-box-icon bg-danger elevation-1"></span> -->
                        Konfirmasi
                    </a>
                    @else
                    <a class="btn btn-success btn-sm disabled" role="button" href="#">
                        <!--  <span class="info-box-icon bg-danger elevation-1"></span> -->
                        Sudah Konfirmasi
                    </a>
                    @endif
                </td>

            </tr>
            @endforeach
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

        @endsection
