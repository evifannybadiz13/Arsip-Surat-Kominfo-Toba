<!DOCTYPE html>
<html>

<head>
    <title>Cetak Surat Baru</title>
</head>

<body>
    <style type="text/css">
    table tr td,
    table tr th {
        font-size: 12pt;
    }
    </style>

    <!-- Table data suratmasuk-->
    <div class="table-responsive">

        <table align="center">
            <tr>
                <td><img src="E:\Catatan Materi\KP\proyek_1\PROJECT\SuratMasuk\public\assets\dist\img\toba.jpg" width="70"
                        height="70">
                </td>
                <td>
                    <center>
                        <font size="4">PEMERINTAH KABUPATEN TOBA SAMOSIR</font><BR>
                        <font size="4">DINAS KOMUNIKASI DAN INFORMATIKA</font><BR>
                        <font size="2">Jl.Tarutung Km.2 Soposurung Balige</font><BR>
                        <font size="2">www.tobasamosirkab.go.id || kominfo@tobasamosirkab.go.id
                        </font><BR>
                </td>
            </tr>
            <tr>
                <td width="400" colspan="2">
                    <hr>
                </td>
            </tr>
        </table>
        <br>
        <table align="center">

            <tr>
                <td>Nomor Surat</td>
                <td>:</td>
                <td width="330">{{$pdf->nomor_surat}}</td>
            </tr>
            <tr>
                <td>Sifat</td>
                <td>:</td>
                <td width="330">{{$pdf->sifat}}</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td width="330">{{$pdf->lampiran}}</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td width="330">{{$pdf->perihal}}</td>
            </tr>
        </table>

        <table align="center">
            <tr>
                <td height="40" align="left">Kepada Yth,</td>
            </tr>
            <tr>
                <td width="400" align="left">{{$pdf->penerima}} ,ditempat</td>
            </tr>

        </table>



        <table align="center">
            <tr>
                <td width="400" align="justify">{{$pdf->isi}}</td>
            </tr>

        </table>


        <table align="center">
            <tr>
                <td height="200" align="right">Hormat Kami</td>
            </tr>
            <tr>
                <td width="400" align="right">Stempel</td>
            </tr>
            <tr>
                <td width="400" align="right">{{$pdf->pengirim}}</td>
            </tr>
        </table>


    </div>
</body>

</html>
