@extends('master')
@section('content')

<!-- data tables -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h4><b>Terdisposisi {{$tahun}}</b></h4>
          </div>
    </section>


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b>Total: {{count($disposisi)}}</b></h3>
   <div class="card-tools">
   <form action="/disposisi-terdisposisi/search" method="get">
   @csrf
                  <div class="input-group input-group-sm" style="width: 190px;">
                    <input type="search" name="search" class="form-control float-right" placeholder="Perihal, No.Surat" id="search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  </form>
                </div>
  </div>
   <!-- Table data suratmasuk-->
   <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
                          <th class="text-uppercase"><center>No</center></th>
                              <th class="text-uppercase"<center>No.Surat </center></th>
                              <th class="text-uppercase"><center>Tanggal Surat </center></th>
			                        <th class="text-uppercase"><center>Perihal </center></th>
                                    <th class="text-uppercase"><center>Ditujukan<center></th>
                                    <th class="text-uppercase"><center>Konfirmasi Kabid </center></th>
                              <th width="15%" class="text-uppercase"><center> Aksi</center></th>
			                    </tr>
			                    </thead>
            @foreach($disposisi as $data => $hasil)
            <tr>

            <td>
                {{$data + 1}}
                </td>
                <td>
                {{$hasil->nomor_surat}}
                </td>
                <td>
                {{$hasil->tgl_surat}}
                </td>
                <td>
                {{$hasil->perihal}}
                </td>
                <td>
                <p class="text-uppercase">{{$hasil->disposisi}}</p>
                </td>
                <td>
                @if($hasil->status_kabid=='Menunggu')
                <p style="color:red"><b>{{$hasil->status_kabid}}</b></p>
                @else
                <b>{{$hasil->status_kabid}}</b>
                @endif
                </td>



                <td class="project-action">
                    <a class="btn btn-primary btn-sm" title="Lihat" href="/disposisi-view/{{$hasil->id}}">
                 <i class="fa fa-eye">
                        </i>

                    </a>
                    <a class="btn btn-danger btn-sm" title="Convert Ke PDF"href="/disposisi-pdf/{{$hasil->id}}">
                    <i class="fa fa-file-pdf">
                        </i>

                    </a>
                </td>

            </tr>
            @endforeach
            <tr>
</table>

 <!-- Main Footer -->
 <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a>Kominfo</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>302-B</b>
            </div>
        </footer>

@endsection
