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
                                            <td width="25%"><b> Nomor Agenda </b></td>
                                            <td>{{ $disposisi->nomor_agenda }}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%"><b> No.Surat </b></td>
                                            <td>{{ $disposisi->nomor_surat }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Tanggal Surat </b></td>
                                            <td>{{ $disposisi->tgl_surat }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Tanggal Terima </b></td>
                                            <td>{{ $disposisi->tgl_terima}}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Pengirim </b></td>
                                            <td>{{ $disposisi->pengirim }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Perihal </b></td>
                                            <td>{{ $disposisi->perihal }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Sekretaris Dinas </b></td>
                                            <td>{{ $disposisi->disposisi_sekdis}}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Kepala Dinas </b></td>
                                            <td>{{ $disposisi->disposisi_kadis}}</td>
                                        </tr>
                                        <tr>
                                            <td><b> Konfirmasi </b></td>
                                            <td>{{ $disposisi->status_kabid}}</td>
                                        </tr>
                                   
                                    </table>
                                </div>
                               
                               
                                <form action="/disposisi-konfirmasi/{{$disposisi->id}}" method="get" class="d-inline">
                                @csrf
                                <button class="btn btn-success" type="submit">Konfirmasi</button>
                                <a href="/disposisi" class="btn btn-primary">Kembali</a>
                                </form>
                           
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</section>



@endsection
