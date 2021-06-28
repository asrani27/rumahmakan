<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>APLIKASI ADUAN</title>
<style type="text/css">
.auto-style1 {
	font-size: small;
}
.auto-style2 {
	text-align: center;
}
.auto-style3 {
	border: 1px solid #000000;
	font-family: Arial, Helvetica, sans-serif;

	font-size: xx-small;
	text-align: center;
}
.auto-style5 {
	border: 1px solid #000000;
	font-size: xx-small;	
}
.auto-style4 {
	font-size: x-small;
}
.auto-style6 {
	border: 1px solid #000000;
	font-size: small;	
}
</style>
</head>

<body>

<p class="auto-style2"><strong><span class="auto-style1">LAPORAN SOLUSI</span></strong></p>
<table style="width: 100%" cellpadding="2" cellspacing="0" >
	<tr>
		<td class="auto-style3"><strong>NO</strong></td>
		<td class="auto-style3" ><strong>Tanggal</strong></td>
		<td class="auto-style3" ><strong>Nama Pemohon</strong></td>
		<td class="auto-style3" ><strong>Kode Produk</strong></td>
		<td class="auto-style3" ><strong>Jenis Aduan</strong></td>
		<td class="auto-style3" ><strong>Isi Aduan</strong></td>
		<td class="auto-style3" ><strong>Solusi</strong></td>
	</tr>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $key => $item)   
            <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                <td class="auto-style5" style="text-align: center">{{$no++}}</td>
                <td class="auto-style5" style="text-align: center">{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}} </td>
                <td class="auto-style5" style="text-align: center">{{$item->kustomer->nama}}</td>
                <td class="auto-style5" style="text-align: center">{{$item->kode_produk}}</td>
                <td class="auto-style5" style="text-align: center">{{$item->jenis_aduan}}</td>
                <td class="auto-style5" style="text-align: center">{{$item->isi_aduan}}</td>
                <td class="auto-style5" style="text-align: center">{{$item->respon->first() == null ? '-':$item->respon->first()->isi}}</td>
            </tr>
            @endforeach    
        </tbody>
</table>
<br/>


</body>

</html>
