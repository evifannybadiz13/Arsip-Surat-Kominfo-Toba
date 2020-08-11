<!DOCTYPE html>
<html>
<head>
	<title>Laporan Agenda Surat Masuk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
<center>
            <h3>Laporan Agenda Surat Masuk</h3>
</center>

   <!-- Table data suratmasuk-->
   <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
                                    <th width="10%"><center>No</center></th>
                                    <th width="20%"><center>No.Surat </center></th>
                                    <th width="20%"><center>Tanggal Surat </center></th>
                                    <th width="20%"><center>Tanggal Terima </center></th>
			                        <th width="30%"><center>Pengirim </center></th>
			                        <th width="30%"><center>Perihal </center></th>
			                    </tr>
			                    </thead>
            <tbody>
            @foreach($agenda_masuk as $data => $hasil)
            <tr>
                <td>
                {{$data + 1}}
                </td>
                <td>
                {{$hasil->nomorsurat}}
                </td>
                <td>
                {{$hasil->tglsurat}}
                </td>
                <td>
                {{$hasil->tglterima}}
                </td>
                <td>
                {{$hasil->pengirim}}
                </td>
                <td>
                {{$hasil->perihal}}
                </td>
            </tr>
            @endforeach
            </tbody>
</table>
</div>
</body>
</html>