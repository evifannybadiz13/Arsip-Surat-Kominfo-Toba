@extends('master')
@section('content')

<!-- data tables -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div style=" width:100%; padding:0;">
                    <div class="card-header">
                        <h4><b>List Akun Pengguna</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <a href="/kabid/create" type="button" class="btn btn-primary  btn-sm" title="Tambah Pengguna">    <i title="Tambah pengguna" class="fa fa-user-plus" aria-hidden="true"></i> Tambah Pengguna</a>
        <div class="card-tools">

        </div>
    </div>
    <!-- Table data suratmasuk-->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th>
                        <center>NO</center>
                    </th>
                    <th>
                        <center>Nama </center>
                    </th>
                    <th>
                        <center>Email</center>
                    </th>
                    <th>
                        <center>Bidang/Jabatan</center>
                    </th>

                    <th width="15%">
                        <center> Aksi</center>
                    </th>
                </tr>
            </thead>
            @foreach($kabid as $data=> $hasil)

            <tr>
                <td width="4%">
                    <center>{{$data + 1}}</center>
                </td>
                <td>
                    {{$hasil->nama}}
                <td>
                    {{$hasil->email}}
                </td>
                <td>
                    <p class="text-uppercase"><b>{{$hasil->bidang}}</b></p>
                </td>
                <td class="project-action">
                    <a class="btn btn-primary btn-sm" title="Lihat" href="/kabid-view/{{$hasil->id}}">
                        <i class="fa fa-eye">
                        </i>

                    </a>
                    <a class="btn btn-info btn-sm" title="Ubah" href="/kabid/edit/{{$hasil->id}}">
                        <i class="fas fa-pencil-alt">
                        </i>

                    </a>

                    <form class="d-inline">
                        <button type="button" class="btn btn-danger btn-sm" title="Hapus" data-toggle="modal"
                            data-target="#modal-default"> <i title="Hapus" class="fa fa-trash"></i></button>
                    </form>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Data akan dihapus, apakah anda yakin?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <form method="post" action="/kabid/delete/{{$hasil->id}}">
                                        @method('delete')
                                        @csrf
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
        </table>

    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a>Kominfo</a></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>302-B</b>
        </div>
    </footer>

    @endsection
