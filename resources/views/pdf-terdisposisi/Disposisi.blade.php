<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  table-layout: fixed;
  width: 95%;

}

#p1{
   
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
    font-size: 0.85em;
}
#p2{
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
    font-size: 0.9em;
}

#p3{
  font-family: 'Times New Roman', Times, serif;
  font-weight: bold;
  font-size: 0.75em;
}

#p4{
  font-family: 'Times New Roman', Times, serif;
  font-weight: bold;
  font-size: 0.75em;
}


#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  width: 50%;
}

#customers th{
    font-family: Arial, Helvetica, sans-serif;
}


.logo img{
    margin: auto 95px;
    float: left;
    height: 65px;
    width: 55px;
    max-width: 90px;
    position: absolute;
    top: -81px;
}

#customers th {

  padding-bottom: 12px;
  text-align: center;
}

#tr1{
  text-align: left ;
  padding-top: 200px;
}

#customers td{
  font-size: 0.7em;
}
#customers th{
  font-size: 0.7em;
}

table.center{
    margin-left: auto;
    margin-right: auto;
}

#space{
  line-height: 100%;
}

.box{
  text-align: center;
  line-height: 15%;
}

#sekdis{
  position: absolute;
  margin: auto 0px;
  top: 0px;
}
#sekdis1{
  position:absolute;
  text-align:center;
  top: 387px;
  margin: auto 100px;
 
}
#kadis{
  position: absolute;
  margin: auto 0px;
  top: 0px;
}
#kadis1{
  position:absolute;
  top: 180px;
  margin: auto 105px;
}

#perihal{
  position: absolute;
  margin: auto 0px;
  top: 0px;
}

#bidang{
  position: absolute;
  margin: auto 0px;
  top: 0px;
}

#bidang1{
  position:absolute;
  top: 180px;
  margin: auto 90px;
}

#colon{
  position:absolute;
  margin: auto 9px;
  top: 0px;
}
#colon1{
  position:absolute;
  margin: auto 11px;
  top: 0px;
}
#lom{
  position:absolute;
  margin: auto 10px;
  top: 0px;
}
#lom1{
  position:absolute;
  margin: auto 20px;
  top: 0px;
}
#lom2{
  position:absolute;
  margin: auto 73px;
  top: 0px;
}
#cellpri{
  position:absolute;
  margin: auto 22px;
  top: 0px;
}

#cb1{
  position:absolute;
  margin: auto 0px;
  top:13px;
  font-size: 16px;
}
#cb11{
  position:absolute;
  margin: auto 14px;
  top: 22px;
 
}

#cb2{
  position:absolute;
  margin: auto 69px;
  top:13px;
  font-size: 16px;
 
}
#cb21{
  position:absolute;
  margin: auto 83px;
  top: 22px;

}

#cb3{
  position:absolute;
  margin: auto 173px;
  top:13px;
  font-size: 16px;
}
#cb31{
  position:absolute;
  margin: auto 187px;
  top:22px;
  
}

#tglsurat{
  position:absolute;
  margin: auto 0px;
  top:0px;
}

#sifat{
  position:absolute;
  margin: auto 0px;
  top:0px;
}


</style>
</head>
<body>
  <div class="box">
    <p class="item" id="p1">PEMERINTAH KABUPATEN TOBA SAMOSIR</p>
    <p class="item" id="p2">DINAS KOMUNIKAS DAN INFORMATIKA</p>
    <p class="item" id="p3">Jl. Tarutung Km.2 Soposurung Balige</p>
    <p class="item" id="p4">www.tobasamosirkab.go.id Email : kominfo@tobasamosirkab.go.id</p>
  </div>

<div class="logo">
  <img src="E:\Catatan Materi\KP\proyek_1\PROJECT\SuratMasuk\resources\views\pdf-terdisposisi\gbr.jpg">
</div>

<table id="customers" class="center">
  <tr>
    <th colspan="2">LEMBAR DISPOSISI</th>
  </tr>
  <tr>
    <td>Surat Dari<span id="colon">: {{$pdf->pengirim}}</span></td>
    <td>Diterima Tanggal<span id="lom">: {{$pdf->tgl_terima}}</span></td>

  </tr>
  <tr>
    <td>No. Surat<span id="colon1">: {{$pdf->nomor_surat}}</span></td>
    <td>Nomor Agenda<span id="lom1">: {{$pdf->nomor_agenda}}</id></td>
  
  </tr>
  <tr>
    <td height="45px"><p id="tglsurat">Tgl. Surat<span id="colon">: {{$pdf->tgl_surat}}</span></p></td>
    <td><p id="sifat">Sifat<span id="lom2">:</span></p><br>
    <input id="cb1" type="checkbox"><p id="cb11">Rahasia</p>
    <input id="cb2" type="checkbox"><p id="cb21">Sangat Rahasia</p>
    <input id="cb3" type="checkbox"><p id="cb31">Penting</p>
   
    </td>
 
  </tr>
  <tr>
    <td colspan="2" height="50px" ><p id="perihal">Perihal<span id="cellpri">: {{$pdf->perihal}} </span></p></td>
  </tr>
  <tr id="tr1">

    <td height="380px" rowspan="2">
    <p id="sekdis">Kepada Yth :  </p>
    <p id="sekdis1">SEKERTARIS</p>
    {{$pdf->disposisi_sekdis}}
    </td>

    <td>
    <p id="kadis">Kepada Yth : </p>
    <p id="kadis1">KEPALA DINAS </P>
    {{$pdf->disposisi_kadis}}
    </td>

  </tr>
  <tr id="tr1">
      <td>
      <p id="bidang">Kepada Yth: </p>
      <p id="bidang1">KEPALA BIDANG</p>
      {{$pdf->disposisi_kabid}}
      </td>
  </tr>
 

  
</table>

</body>
</html>
