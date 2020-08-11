@extends('master')
@section('content')
 <!-- Content Wrapper. Contains page content -->

 <div class="content">
            <h3>View Disposisi</h3>
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
                <h3 class="card-title">Disposisi</h3>
              </div>
              <div class="card-body">
              <div class="row justify-content-center">
              <div class="col-md-12">
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                            <tr>
                                <td  width="28%"><b> No. Agenda</b></td>
                                <td>{{ $disposisi->nomor_agenda }}</td>
                            </tr>
                            <tr>
                                <td><b> No.Surat </b></td>
                                <td>{{ $disposisi->nomor_surat }}</td>
                            </tr>
                            <tr>
                                <td><b> Tanggal Surat </b></td>
                                <td>{{ $disposisi->tgl_surat }}</td>
                            </tr>
                            <tr>
                                <td><b> Tanggal Terima </b></td>
                                <td>{{ $disposisi->tgl_terima }}</td>
                            </tr>
                            <tr>
                                <td><b> Perihal </b></td>
                                <td>{{ $disposisi->perihal }}</td>
                            </tr>
                            <tr>
                                <td><b> Sifat </b></td>
                                <td>{{ $disposisi->sifat }}</td>
                            </tr>
                            <tr>
                                <td><b> Isi Disposisi Sekretaris</b></td>
                                <td>{{ $disposisi->disposisi_sekdis }}</td>
                            </tr>
                            <tr>
                                <td><b> Isi Disposisi Kepala Dinas</b></td>
                                <td>{{ $disposisi->disposisi_kadis }}</td>
                            </tr>
                            <tr>
                                <td><b> Isi Disposisi Kepala Bidang</b></td>
                                <td>{{ $disposisi->disposisi_kabid }}</td>
                            </tr>
                            <tr>
                                <td><b> Status Konfirmasi</b></td>
                                <td>{{ $disposisi->status_kabid }}</td>
                            </tr>
                        </table>
                        </div>
                        @if(auth()->user()->role=='admin')
                        <a href="/disposisi-telah" class="btn btn-primary">Kembali</a>
                        @endif
                        @if(auth()->user()->role=='skdi'||auth()->user()->role=='aplikasi'||auth()->user()->role=='statistik'||auth()->user()->role=='sekdis'||auth()->user()->role=='kadis')
                        <a href="/disposisi-semua" class="btn btn-primary">Kembali</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</section>

            

@endsection