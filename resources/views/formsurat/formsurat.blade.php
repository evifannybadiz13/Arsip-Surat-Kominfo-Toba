@extends('master')
@section('content')

<!-- data tables -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Daftar Surat {{$tahun}}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <a href="/tambah_surat" type="button" class="btn btn-primary  btn-sm ">Buat Surat Baru</a>
        <div class="card-tools">
            <form action="/form_surat_search" method="get">
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
                    <th width="5%">
                        <center>No</center>
                    </th>
                    <th>
                        <center>Nomor Surat </center>
                    </th>
                    <th>
                        <center>Penerima </center>
                    </th>
                    <th>
                        <center>Perihal </center>
                    </th>
                    <th width="15%">
                        <center> Aksi</center>
                    </th>
                </tr>
            </thead>
            @foreach($form_surat as $data => $hasil)
            <tr>
                <td>
                    {{$data + 1}}
                </td>
                <td>
                    {{$hasil->nomor_surat}}
                </td>
                <td>
                    {{$hasil->penerima}}
                </td>
                <td>
                    {{$hasil->perihal}}
                </td>
                <td class="project-action">
                <a class="btn btn-primary btn-sm" href="/form_surat_pdf/{{$hasil->id}}"> <i title="Lihat"  class="fa fa-eye"></i>
                    </a>
                        <a class="btn btn-danger btn-sm" title="Convert ke PDF"href="/form_surat/cetak_pdf/{{$hasil->id}}">
                        <i class="fa fa-file-pdf">
                        </i>
                        </a>
                    <form class="d-inline">
                        <button type="button" title="Hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fa fa-trash" ></i></button>
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
                                    <form method="post" action="{{route('form_surat.destroy', $hasil->id)}}">
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
