@extends('master')
@section('content')
 <!-- Content Wrapper. Contains page content -->

 <div class="content">
            <h3>View Akun</h3>
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
                <h3 class="card-title">Akun</h3>
              </div>
              <div class="card-body">
              <div class="row justify-content-center">
              <div class="col-md-12">
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
              <tr>
                                <td  width="25%"><b> NIP </b></td>
                                <td>{{ $kabid->NIP}}</td>
                            </tr>
                            <tr>
                                <td  width="25%"><b> Nama </b></td>
                                <td>{{ $kabid->nama }}</td>
                            </tr>
                            <tr>
                                <td  width="25%"><b> Username </b></td>
                                <td>{{ $user->username}}</td>
                            </tr>
                            <tr>
                                <td><b> Email </b></td>
                                <td>{{ $kabid->email }}</td>
                            </tr>
                            <tr>
                                <td><b> Bidang </b></td>
                                <td>{{ $kabid->bidang}}</td>
                            </tr>
                            
                        </table>
                        </div>
 
                        <a href="/kabid" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</section>

            

@endsection