@extends('master')
@section('content')

<!-- data tables -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h4><b>Belum Terdisposisi</b></h4>
          </div>
    </section>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b>Total: {{count($disposisi)}}</b></h3>
   <div class="card-tools">
   <form action="/disposisi/search" method="get">
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
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
                          <th><center>No</center></th>
                              <th><center>No.Surat </center></th>
                              <th><center>Tanggal Surat </center></th>
                              <th><center>Tanggal Terima </center></th>
			                        <th><center>Perihal </center></th>
                              <th width="15%"><center> Aksi</center></th>
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
                    <a class="btn btn-danger btn-sm" href="/disposisi-create/{{$hasil->id}}">
                 <!--  <span class="info-box-icon bg-danger elevation-1"></span> -->
                    <i class="fas fa-share-square"></i>
                        Disposisi
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
                                    <form method="post" action="/disposisi-delete/{{$hasil->id}}">
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

@endsection
