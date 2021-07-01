<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>LAPORAN TRANSAKSI</title>
<style type="text/css">
.auto-style1 {
	font-size: medium;
}
.auto-style2 {
	text-align: center;
}
.auto-style3 {
	border: 1px solid #000000;
	font-family: Arial, Helvetica, sans-serif;

	font-size: small;
	text-align: center;
}
.auto-style5 {
	border: 1px solid #000000;
	font-size: small;	
}
.auto-style4 {
	font-size: small;
}
.auto-style6 {
	border: 1px solid #000000;
	font-size: small;	
}
</style>
</head>

<body>

<p class="auto-style2"><strong><span class="auto-style1">LAPORAN TRANSAKSI</span></strong></p>
<table style="width: 100%" cellpadding="2" cellspacing="0" >
	<tr>
		<td class="auto-style3"><strong>#</strong></td>
		<td class="auto-style3"><strong>Tanggal</strong></td>
		<td class="auto-style3"><strong>No Transaksi</strong></td>
		<td class="auto-style3" ><strong>Nama Pelayan</strong></td>
		<td class="auto-style3" ><strong>Detail Pesanan</strong></td>
		<td class="auto-style3" ><strong>Total</strong></td>
	</tr>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $key => $item)   
            <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                <td class="auto-style5" style="text-align: center">{{$no++}}</td>
                <td class="auto-style5" style="text-align: center">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</td>
                <td class="auto-style5" style="text-align: center">T-{{$item->id}}</td>
                <td class="auto-style5" style="text-align: center">{{$item->nama_pembeli}}</td>
                <td class="auto-style5" style="text-align: center">
                    <ul>
                        @foreach ($item->detailTransaksi as $item2)
                            <li>{{$item2->makanan->nama_makanan}}, {{number_format($item2->harga)}}, ({{$item2->jumlah}}), subtotal : {{number_format($item2->jumlah * $item2->harga)}}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="auto-style5" style="text-align: center">{{number_format($item->total)}}</td>
            </tr>
            @endforeach    
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center"><b>TOTAL PENGHASILAN</b></td>
                <td style="text-align: center"><b>{{number_format($data->sum('total'))}}</b></td>
            </tr>
        </tfoot>
</table>
<br/>


</body>

</html>
