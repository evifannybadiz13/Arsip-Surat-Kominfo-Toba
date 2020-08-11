@extends('master')
@section('content')

<!-- data tables -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Surat Keluar {{$tahun}}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <a href="/tambah_suratkeluar" type="button" class="btn btn-primary  btn-sm ">Tambah Surat
            Keluar Baru</a>
        <a href="/surat_keluar_pdf_all" type="button" class="btn btn-info btn-sm" target="_blank">CETAK
            PDF</a>
        <div class="card-tools">
            <form action="/surat_keluar_search" method="get">
                @csrf
                <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="search" name="search" class="form-control float-right" placeholder="No.Surat, Perihal, Tahun Surat" id="search">
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
                        <center>Nomor Surat </center>
                    </th>
                    <th>
                        <center>Pengirim</center>
                    </th>
                    <th>
                        <center>Tanggal Surat </center>
                    </th>
                    <th>
                        <center>Perihal</center>
                    </th>
                    <th>
                        <center>Ditujukan ke</center>
                    </th>
                    <th width="15%">
                        <center> Aksi</center>
                    </th>
                </tr>
            </thead>
            @foreach($surat_keluar as $data => $hasil)
            <tr>
                <td>
                    {{$data + 1}}
                </td>
                <td>
                    {{$hasil->nomor_surat}}
                </td>
                <td>
                    {{$hasil->pengirim}}
                </td>
                <td>
                    {{$hasil->tanggal_surat}}
                </td>
                <td>
                    {{$hasil->perihal}}
                </td>
                <td>
                    {{$hasil->ditujukan}}
                </td>

                <td class="project-action">


                        <a class="btn btn-primary " href="/view/suratkeluar/{{$hasil->id}}"> <i title="Lihat"  class="fa fa-eye"></i></a>
                        <a href="{{route('surat_keluar.edit', $hasil->id) }}" type="submit" class="btn btn-info">    <i title="Edit"  class="fas fa-pencil-alt"></i></a>
                        <form class="d-inline" >
                        <button href="" type="button" title="Hapus" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-default"><i  class="fa fa-trash"></i></button>
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
                                    <form method="post" action="{{route('surat_keluar.destroy', $hasil->id)}}">
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
    </div>
</div>

@endsection
