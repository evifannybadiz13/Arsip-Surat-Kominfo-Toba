@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content">
    <h3>Edit Surat Keluar</h3>
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
                        <form method="post" action="/edit_suratkeluar/store/{{$surat_keluar->id}}">
                            @method('patch')
                            @csrf
                            <h3 class="card-title">Form Surat Keluar</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nomorsurat">Nomor Surat</label>
                                    <input type="text"
                                        class="form-control form-control @error('nomor_surat') is-invalid @enderror"
                                        id="nomor_surat" name="nomor_surat" value="{{$surat_keluar->nomor_surat}}"
                                        placeholder="No.Surat">
                                    @error('nomor_surat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <td>
                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="date"
                                            class="form-control form-control @error('tanggal_surat') is-invalid @enderror"
                                            id="tanggal_surat" name="tanggal_surat"
                                            value="{{$surat_keluar->tanggal_surat}}" placeholder="Tanggal Surat">
                                        @error('tanggal_surat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="pengirim">Sifat Surat</label>
                                        <select class="form-control @error('sifat') is-invalid @enderror" id="sifat"
                                            name="sifat" placeholder="sifat surat">
                                            <option value="">Sifat Surat</option>
                                            <option value="Penting" @if($surat_keluar->sifat == 'Penting') selected="selected" @endif> Penting</option>
                                            <option value="Umum" @if($surat_keluar->sifat == 'Umum') selected="selected" @endif>Umum</option>
                                            <option value="Privat" @if($surat_keluar->sifat == 'Privat') selected="selected" @endif>Privat</option>
                                            @error('sifat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </select>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="pengirim">Pengirim</label>
                                        <input type="text" class="form-control @error('pengirim') is-invalid @enderror"
                                            id="pengirim" name="pengirim" value="{{$surat_keluar->pengirim}}"
                                            placeholder="Pengirim">
                                        @error('pengirim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="isiringkas">Perihal Surat</label>
                                        <textarea type="text"
                                            class="form-control @error('perihal') is-invalid @enderror" id="isi"
                                            name="perihal" placeholder="" rows="3">{{$surat_keluar->perihal}}</textarea>
                                        @error('perihal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="perihal">Ditujukan Ke </label>
                                        <select class="form-control @error('ditujukan') is-invalid @enderror"
                                            id="ditujukan" name="ditujukan" placeholder="tujukan ke">
                                            <option value="" holder>Pilih Tujuan</option>
                                            <option Value="Kadis" @if($surat_keluar->ditujukan == 'Kadis')
                                                selected="selected" @endif>Kadis</option>
                                            <option Value="Kabag" @if($surat_keluar->ditujukan == 'Kabag')
                                                selected="selected" @endif>Kabag</option>
                                            <option Value="Sekretaris" @if($surat_keluar->ditujukan == 'Sekretaris')
                                                selected="selected" @endif>Sekretaris</option>
                                            <option Value="Bendahara" @if($surat_keluar->ditujukan == 'Bendahara')
                                                selected="selected" @endif>Bendahara</option>

                                            @error('ditujukan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="isiringkas">Isi Ringkas</label>
                                        <textarea type="text" class="form-control  @error('isi') is-invalid @enderror"
                                            id="isi" name="isi" placeholder=" Isi Ringkas"
                                            rows="3">{{$surat_keluar->isi}}</textarea>
                                        @error('isi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- /.form-group -->

                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
