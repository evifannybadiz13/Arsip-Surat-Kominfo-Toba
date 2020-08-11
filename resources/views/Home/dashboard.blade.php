@extends('master')
@section('content')

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-8 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Surat Masuk {{$tahun}}</b></span>
                        <span class="info-box-number">{{count($jml_surat_masuk)}}
                            <small>Terhitung </small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-8 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Surat Keluar {{$tahun}}</b></span>
                        <span class="info-box-number">{{count($jml_surat_keluar)}}
                            <small>Terhitung</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-8 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-share-square"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Disposisi {{$tahun}}</b></span>
                        <span class="info-box-number">{{count($jml_disposisi)}}
                            <small>Terhitung</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                {!! $chart->container() !!}
                    @if($chart)
                        {!! $chart->script() !!}
                    @endif
                </div>
              </div>
              <!-- /.card-body -->
            </div>


    </div>

    <!-- /.row -->
</section>


@endsection
