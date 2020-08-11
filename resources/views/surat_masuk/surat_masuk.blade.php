@extends('master')
@section('content')

<!-- data tables -->
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h4><b>Surat Masuk {{$tahun}}</b></h1>
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

        <h3 class="card-title"><b>Total Data: {{count($surat_masuk)}}</b></h3>
        <div class="card-tools">
            <form action="/surat_masuk/search" method="get">
                @csrf
                <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="search" name="search" class="form-control float-right " placeholder="Perihal, Pengirim, Tahun Surat"
                        id="search">
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
                        <center>No.Agenda </center>
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
            @foreach($surat_masuk as $data => $hasil)
            <tr>
                <td>
                    {{$hasil->no_agenda}}
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

                <td class="project-action">
                    <a class="btn btn-primary btn-sm" title="Lihat" href="/view/suratmasuk/{{$hasil->id}}">
                        <i class="fa fa-eye">
                        </i>

                    </a>
                    @if(auth()->user()->role=='admin')
                    <a class="btn btn-info btn-sm" title="Ubah" href="/edit-suratmasuk/{{$hasil->id}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                    </a>
                    <form class="d-inline" >
                        <button type="button" class="btn btn-danger btn-sm "title="Hapus" data-toggle="modal"
                            data-target="#modal-default"> <i class="fa fa-trash"></i></button>
                    </form>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus Surat</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda Yakin?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default toastrDefaultSuccess" data-dismiss="modal">Close</button>
                                    <form method="post" action="/delete-suratmasuk/{{$hasil->id}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <a class="btn btn-danger btn-sm" title="Export Ke PDF" href="/disposisi-print/{{$hasil->id}}">
                        <i class="fa fa-file-pdf">
                        </i>

                    </a>
                    @endif
                </td>

            </tr>
            @endforeach
            <tr>
        </table>
        {{$surat_masuk->links()}}
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
