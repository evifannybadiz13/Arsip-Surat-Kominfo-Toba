@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content">
    <h3>Buat Surat Baru</h3>
</div>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <form method="post" action="/formsurat/store">
                            @csrf
                            <h3 class="card-title">Form Surat Baru</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nomorsurat">Nomor Surat</label>
                                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                        id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat">
                                    @error('nomor_surat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="pengirim">Sifat Surat</label>
                                    <select class="form-control @error('sifat') is-invalid @enderror" id="sifat"
                                        name="sifat" placeholder="sifat surat">
                                        <option value="" holder>Pilih Sifat Surat</option>
                                        <option>Penting</option>
                                        <option>Umum</option>
                                        <option>Privat</option>
                                        @error('sifat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </select>
                                </div>


                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="isiringkas">Lampiran</label>
                                    <input type="text" class="form-control @error('lampiran') is-invalid @enderror"
                                        id="lampiran" name="lampiran" placeholder="jumlah berkas surat">
                                    @error('lampiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="perihal">Perihal Surat</label>
                                    <input type="text" class="form-control @error('perihal') is-invalid @enderror"
                                        id="isi" name="perihal" placeholder="perihal">
                                    @error('perihal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="penerima">Penerima</label>
                                    <input type="text" class="form-control @error('penerima') is-invalid @enderror"
                                        id="penerima" name="penerima" placeholder="Penerima surat">
                                    @error('penerima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="pengirim">Pengirim</label>
                                    <input type="text" class="form-control @error('pengirim') is-invalid @enderror"
                                        id="pengirim" name="pengirim" placeholder="Pengirim">
                                    @error('pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="isisurat">Isi Surat</label>
                                    <textarea rows="30" class="form-control @error('isi') is-invalid @enderror" id="isi"
                                        name="isi">
                                    </textarea>
                                    @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Buat Surat</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
