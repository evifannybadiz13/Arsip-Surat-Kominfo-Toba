@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content">
    <h3>Tambah Surat Keluar</h3>
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
                        <form method="post" action="/suratkeluar/store">
                            @csrf
                            <h3 class="card-title">Form Surat Keluar Baru</h3>
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
                                    <label for="tglsurat">Tanggal Surat</label>
                                    <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                        id="tanggal_surat" name="tanggal_surat" placeholder="Tanggal Surat">
                                    @error('tanggal_surat')
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
                                    <label for="perihal">Ditujukan Ke </label>
                                    <select class="form-control @error('ditujukan') is-invalid @enderror" id="ditujukan"
                                        name="ditujukan" placeholder="tujukan ke">
                                        <option value="" holder>Pilih Tujuan</option>
                                        <option>Kadis</option>
                                        <option>Kabag</option>
                                        <option>Sekretaris</option>
                                        <option>Bendahara</option>

                                        @error('ditujukan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </select>
                                </div>


                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="isiringkas">Perihal Surat</label>
                                    <textarea type="text" class="form-control @error('perihal') is-invalid @enderror"
                                        id="isi" name="perihal" placeholder="perihal" rows="3"></textarea>
                                    @error('perihal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="isiringkas">Isi Ringkas</label>
                                    <textarea type="text" class="form-control @error('isi') is-invalid @enderror" id="isi"
                                        name="isi" placeholder="Isi Ringkas" rows="5"></textarea>
                                    @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->

                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-default">Cancel</button>
                                    </div>
                                    </form>
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
