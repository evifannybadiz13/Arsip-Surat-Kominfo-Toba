@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content">
    <h3>Tambah Surat Masuk</h3>
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
                        <form method="post" action="/suratmasuk/store" enctype="multipart/form-data">
                            @csrf
                            <h3 class="card-title">Form Surat Masuk</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                            <div class="form-group">
                             <label for="no_agenda">Nomor Agenda</label>
                                    <input type="text" class="form-control @error('no_agenda') is-invalid @enderror"
                                        id="no_agenda" name="no_agenda" value="{{old('no_agenda')}}" placeholder="Nomor Agenda">
                                    @error('no_agenda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor_surat">No.Surat</label>
                                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                        id="nomor_surat" name="nomor_surat" placeholder="No.Surat" value="{{old('nomor_surat')}}">
                                    @error('nomor_surat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror"
                                        id="tgl_surat" name="tgl_surat" placeholder="Tanggal Surat" value="{{old('tgl_surat')}}">
                                    @error('tgl_surat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="tgl_terima">Tanggal Terima</label>
                                    <input type="date" class="form-control @error('tgl_terima') is-invalid @enderror"
                                        id="tgl_terima" name="tgl_terima" placeholder="Tanggal Surat"  value="{{old('tgl_terima')}}">
                                    @error('tgl_terima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="pengirim">Pengirim</label>
                                    <input type="text" class="form-control @error('pengirim') is-invalid @enderror"
                                        id="pengirim" name="pengirim" placeholder="Pengirim"  value="{{old('pengirim')}}">
                                    @error('pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <textarea   type="text" class="form-control @error('perihal') is-invalid @enderror"
                                        id="perihal" name="perihal" placeholder="Perihal"  value="{{old('perihal')}}" rows="4"></textarea >
                                    @error('pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="file">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="file" name="file">
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary toastrDefaultSuccess">Save</button>
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
