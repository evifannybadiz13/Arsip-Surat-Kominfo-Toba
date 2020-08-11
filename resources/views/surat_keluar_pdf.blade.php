<!DOCTYPE html>
<html>

<head>
    <title>Laporan Surat Keluar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
    table tr td,
    table tr th {
        font-size: 9spt;
    }
    </style>
                    <h5>
                        <center>Laporan Surat Keluar</center>
                    </h5>

    <!-- Table data suratmasuk-->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Nomor Surat </center>
                    </th>
                    <th>
                        <center>Tanggal Surat </center>
                    </th>
                    <th>
                        <center>Pengirim </center>
                    </th>
                    <th>
                        <center>Perihal </center>
                    </th>
                    <th>
                        <center>Ditujukan Ke </center>
                    </th>
                    <th>
                        <center>Isi Ringkas</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($surat_keluar as $data => $hasil)
                <tr>
                    <td>
                        {{$data + 1}}
                    </td>
                    <td>
                        {{$hasil->nomor_surat}}
                    </td>
                    <td>
                        {{$hasil->tanggal_surat}}
                    </td>
                    <td>
                        {{$hasil->pengirim}}
                    </td>
                    <td>
                        {{$hasil->perihal}}
                    </td>
                    <td>
                        {{$hasil->ditujukan}}
                    </td>
                    <td>
                        {{$hasil->isi}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
