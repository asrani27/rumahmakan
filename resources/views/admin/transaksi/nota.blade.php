<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="en-us" http-equiv="Content-Language">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<style type="text/css">
	.auto-style1 {
		text-align: center;
	}
	.auto-style2 {
		text-align: right;
		font-size: small;
	}
	.auto-style3 {
		border-width: 0px;
		
	}
	.auto-style4 {
		border-style: solid;
		border-width: 1px;
		font-size: x-small;
	}
	.auto-style5 {
		border-style: solid;
		border-width: 1px;
		text-align: center;
		font-size: x-small;
	}
	.auto-style6 {
		font-size: small;
	}
	</style>
</head>
<body>
    <p class="auto-style1"><strong>RUMAH MAKAN MAMA CEMARA</strong><br/>
        Tanggal : {{\Carbon\Carbon::parse($data->created_at)->format('d-M-Y')}}
	<table style="width: 100%">
		<tr>
			<td class="auto-style2" style="width: 130px"><strong>No Transaksi</strong></td>
			<td class="auto-style6">: TR-{{$data->id}}</td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 130px"><strong>Nama Pelayan</strong></td>
			<td class="auto-style6">: {{$data->nama_pembeli}}</td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 130px"><strong>No Meja</strong></td>
			<td class="auto-style6">: {{$data->meja->nama}}</td>
		</tr>
	</table>
	</p>
	<table class="auto-style3" cellpadding="0" cellspacing="0" style="width: 100%">
		<tr>
			<td class="auto-style5"><strong>No</strong></td>
			<td class="auto-style5"><strong>Nama </strong> </td>
			<td class="auto-style5"><strong>Harga</strong></td>
			<td class="auto-style5"><strong>Jumlah</strong></td>
			<td class="auto-style5"><strong>Subtotal</strong></td>
		</tr>
        @php
            $no =1;
        @endphp
        @foreach ($data->detailTransaksi as $item)
            
		<tr>
			<td class="auto-style4" style="text-align: center">{{$no++}}</td>
			<td class="auto-style4">{{$item->makanan->nama_makanan}}</td>
			<td class="auto-style4" style="text-align: center">{{number_format($item->harga)}}</td>
			<td class="auto-style4" style="text-align: center">{{$item->jumlah}}</td>
			<td class="auto-style4" style="text-align: center">{{number_format($item->jumlah * $item->harga)}}</td>
		</tr>
        @endforeach
		<tr>
			<td class="auto-style4" colspan=4><strong>GrandTotal</strong></td>
			<td class="auto-style4" style="text-align: center">{{number_format($data->pembayaran->total)}}</td>
		</tr>
		<tr>
			<td class="auto-style4" colspan=4><strong>Bayar</strong></td>
			<td class="auto-style4" style="text-align: center">{{number_format($data->pembayaran->bayar)}}</td>
		</tr>
		<tr>
			<td class="auto-style4" colspan=4><strong>Kembalian</strong></td>
			<td class="auto-style4" style="text-align: center">{{number_format($data->pembayaran->kembalian)}}</td>
		</tr>
	</table>
</body>
</html>