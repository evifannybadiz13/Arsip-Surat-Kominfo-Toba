@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content">
    <h3>View Surat Keluar</h3>
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
                        <h3 class="card-title">Surat Keluar</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td width="25%"><b> Nomor Surat </b></td>
                                            <td>{{ $surat_keluar->nomor_surat }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Tanggal Surat </b></td>
                                            <td>{{ $surat_keluar->tanggal_surat }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Pengirim </b></td>
                                            <td>{{ $surat_keluar->pengirim }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Perihal </b></td>
                                            <td>{{ $surat_keluar->perihal }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Isi Ringkas </b></td>
                                            <td>{{ $surat_keluar->isi }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <a href="/surat_keluar" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
