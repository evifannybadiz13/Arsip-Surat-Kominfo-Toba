@extends('master')
@section('content')
 <!-- Content Wrapper. Contains page content -->

 <div class="content">
            <h3>View Surat Masuk</h3>
            </div>
       

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Surat Masuk</h3>
              </div>
              <div class="card-body">
              <div class="row justify-content-center">
              <div class="col-md-12">
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
              <tr>
                                <td  width="25%"><b> No.Agenda </b></td>
                                <td>{{ $surat_masuk->no_agenda}}</td>
                            </tr>
                            <tr>
                                <td  width="25%"><b> No.Surat </b></td>
                                <td>{{ $surat_masuk->nomor_surat }}</td>
                            </tr>
                            <tr>
                                <td><b> Tanggal Surat </b></td>
                                <td>{{ $surat_masuk->tgl_surat }}</td>
                            </tr>
                            <tr>
                                <td><b> Tanggal Terima </b></td>
                                <td>{{ $surat_masuk->tgl_terima }}</td>
                            </tr>
                            <tr>
                                <td><b> Pengirim </b></td>
                                <td>{{ $surat_masuk->pengirim }}</td>
                            </tr>
                            <tr>
                                <td><b> Perihal </b></td>
                                <td>{{ $surat_masuk->perihal }}</td>
                            </tr>
                        </table>
                        </div>
 
                        <a href="/surat_masuk" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</section>

            

@endsection