@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content">
 <br>
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
                        <form method="post" action="/disposisi-konfirmasi/{{$disposisi->id}}" enctype="multipart/form-data">
                            @method ('patch')
                            @csrf
                            <h3 class="card-title">Form Disposisi Surat Masuk</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                            <fieldset disabled>
                                <div class="form-group">
                                    <label for="nomor_agenda">Nomor Agenda</label>
                                    <input type="text" class="form-control @error('nomor_agenda') is-invalid @enderror"
                                        id="nomor_agenda" name="nomor_agenda" value="{{$disposisi->nomor_agenda}}"
                                        placeholder="No.Surat">
                                    @error('nomor_surat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                </fieldset>

                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="nomor_surat">No.Surat</label>

                                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                        id="nomor_surat" name="nomor_surat" value="{{$disposisi->nomor_surat}}"
                                        placeholder="No.Surat">
                                    @error('nomor_surat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset>
                                <!-- /.form-group -->
                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror"
                                        id="tgl_surat" name="tgl_surat" placeholder="Tanggal Surat"
                                        value="{{$disposisi->tgl_surat}}">
                                    @error('tgl_surat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset>
                                <!-- /.form-group -->

                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="tglterima">Tanggal Terima</label>
                                    <input type="date" class="form-control @error('tgl_terima') is-invalid @enderror"
                                        id="tglterima" name="tglterima"
                                        value="{{$disposisi->tgl_terima}}">
                                    @error('tglterima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset >

                                <!-- /.form-group -->

                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" class="form-control @error('perihal') is-invalid @enderror"
                                        id="perihal" name="perihal" value="{{$disposisi->perihal}}"
                                        placeholder="Perihal">
                                    @error('perihal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset >

                                <!-- /.form-group -->

                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="sifat">Sifat</label>
                                    <input type="text" class="form-control @error('sifat') is-invalid @enderror"
                                        id="sifat" name="sifat" value="{{$disposisi->sifat}}">
                                    @error('sifat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset >

                                <!-- /.form-group -->

                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="disposisi">Disposisi Kepada</label>
                                    <input type="text" class="form-control @error('disposisi') is-invalid @enderror"
                                        id="disposisi" name="disposisi" value="{{$disposisi->disposisi}}"
                                        placeholder="disposisi">
                                    @error('disposisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset >


                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="disposisi_sekdis">Disposisi Sekretaris</label>
                                    <textarea type="text" class="form-control @error('disposisi_sekdis') is-invalid @enderror"
                                        id="disposisi_sekdis" name="disposisi_sekdis" value="{{$disposisi->disposisi_sekdis}}" rows="3">{{$disposisi->disposisi_sekdis}}</textarea>
                                    @error('disposisi_sekdis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset >

                                <fieldset disabled>
                                <div class="form-group">
                                    <label for="disposisi_kadis">Disposisi Kepala Dinas</label>
                                    <textarea type="text" class="form-control @error('disposisi_kadis') is-invalid @enderror"
                                        id="disposisi_kadis" name="disposisi_kadis" rows="3" value="{{$disposisi->disposisi_kadis}}">{{$disposisi->disposisi_kadis}}</textarea>
                                    @error('disposisi_kadis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </fieldset >

                                <div class="form-group">
                                    <label for="disposisi_kabid">Disposisi Kabid</label>
                                    <textarea type="text" class="form-control @error('disposisi_kabid') is-invalid @enderror"
                                        id="disposisi_kabid" name="disposisi_kabid" rows="3" placeholder="Disposisi Kabid"></textarea>
                                    @error('disposisi_kabid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!-- /.form-group -->
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary toastrDefaultSuccess">konfirmasi</button>
                                </div>
                                </form>
                            </div>
</section>


@endsection
