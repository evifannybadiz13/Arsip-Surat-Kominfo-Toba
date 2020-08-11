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
                        <form method="post" action="/disposisi-update/{{$disposisi->id}}" enctype="multipart/form-data">
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


                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="sifat">Sifat</label>
                                    <select name="sifat" class="form-control">
                                        <option value="penting" ? 'selected' : '' }}>Penting</option>
                                        <option value="rahasia" ? 'selected' : '' }}>Rahasia</option>
                                        <option value="sangatrahasia" ? 'selected' : '' }}>Sangat Rahasia</option>
                                    </select>
                                    <class="form-control @error('sifat') is-invalid @enderror" id="sifat" name="sifat"
                                        placeholder="sifat">
                                        @error('sifat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="disposisi">Disposisi Kepada</label>
                                    <select name="disposisi" class="form-control">
                                        <option value="aplikasi" ? 'selected' : '' }}>Kabid Aplikasi &
                                            Infrakstruktur</option>
                                        <option value="skdi" ? 'selected' : '' }}>Kabid Sarana Komunikasi &
                                            Diseminasi Informasi</option>
                                        <option value="statistik" ? 'selected' : '' }}>Kabid Sarana Statistik &
                                            Persandian</option>
                                    </select>
                                    <class="form-control @error('disposisi') is-invalid @enderror" id="disposisi"
                                        name="disposisi" placeholder="disposisi">
                                        @error('sifat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>


                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="disposisi_sekdis">Isi Disposisi Sekretaris</label>
                                    <textarea type="text"
                                        class="form-control @error('disposisi_sekdis') is-invalid @enderror"
                                        id="disposisi_sekdis" name="disposisi_sekdis"
                                        placeholder="Isi Disposisi Sekretaris" rows="3">
              </textarea>
                                    @error('disposisi_sekdis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="disposisi_kadis">Isi Disposisi Kepala Dinas</label>
                                    <textarea type="text"
                                        class="form-control @error('disposisi_kadis') is-invalid @enderror"
                                        id="disposisi_kadis" name="disposisi_kadis"
                                        placeholder="Isi Disposisi Kepala Dinas" rows="3">
              </textarea>
                                    @error('disposisi_kadis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.form-group -->
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="/disposisi" class="btn btn-default">Cencel</a>

                                </div>
                                </form>
                            </div>
</section>
</form>

@endsection
