<html>
  <head>
    <meta charset="utf-8">
    <title> Invoice</title>
  </head>
  <style>
  .Head{
  border: 5px outset red;
  background-color: beige;
  text-align: center;
  
  }
  .Title
  {
    font-size:16;
    font:bold; 
  }
  table.a{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  table-layout: auto;
}
table.b{
  font-family: arial, sans-serif;
  table-layout: fixed;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  padding: 8px;

}
td.left
{
  border: 1px solid #dddddd;
  text-align: left;
  width: 200px;
}
td.right
{
  border: 1px solid #dddddd;
  text-align: left;
  width: 468px;
}
tr:nth-child(even).isi {
  background-color: #dddddd;
}
.center {
  display: block;
  margin-left: 300px;
  width: 50%;
  width:100px;height:100px;
}
  </style>
  <body>
    <img src="storage/icondesa.png" alt="Desa Wisata Tinalah" title="Dewi Tinalah"  class="center">
    @foreach($invoices as $invoice)
  <div class="Head">
   <div class="Title"> Invoice<BR></div>
    No Invoice: {{$invoice->noinvoice}}<BR>
    Tanggal Invoice: {{date('d-m-y',strtotime($invoice->created_at))}}<BR>
    </div>
    <table class="b">
      <tr style="border: 3px solid black">
        <td style="border: 3px solid black;">Dari : Pengelola Desa Wisata Tinalah</td><td style="text-align: right">Kepada:  {{$invoice->namacust}}</td>
      </tr>
      <tr style="border: 3px solid black">
        <td style="border: 3px solid black">Purwoharjo, Samigaluh, Kulon Progo, D.I. Yogyakarta</td><td style="text-align: right">di tempat.</td>
      </tr>
    </table>
    <table class="a">
    <tr class="isi">
      <td class="left">Paket Wisata</td><td class="right">{{$invoice->jenispaket}}</td>
    </tr>
    <tr class="isi">
      <td class="left">Harga Paket Wisata</td><td class="right">{{$invoice->hargafinal}}</td>
    </tr>
    <tr class="isi">
      <td class="left">tanggal mulai</td><td class="right">{{$invoice->waktu_ambil}}</td>
    </tr>
    <tr class="isi">
      <td class="left">tanggal selesai</td><td class="right">{{$invoice->waktu_selesai}}</td>
    </tr>
    <tr class="isi">
      <td class="left">Keterangan</td><td class="right">{{$invoice->keteranganinvoice}}</td>
    </tr>
    </table>
    @endforeach
  </body>
</html>