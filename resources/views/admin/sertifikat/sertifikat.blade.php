<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SERTIFIKAT&nbsp; LABORATORIUM BARISTA</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.auto-style2 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: large;
}
.auto-style3 {
	border: 3px solid #000000;
}
.auto-style4 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: x-large;
}
.auto-style5 {
	text-align: right;
}
.auto-style6 {
	text-align: left;
}
</style>
</head>

<body>

<table cellpadding="2" class="auto-style3" style="width: 100%">
	<tr>
		<td class="auto-style1" style="height: 268px"><strong>
		<img alt="" height="112" src="https://pbs.twimg.com/profile_images/1260126116120915969/ErvVkfCW.jpg" width="240" /><br />
		<br />
		<span class="auto-style4">SERTIFIKAT&nbsp; LABORATORIUM BARISTAND 
		BANJARBARU</span></strong><br class="auto-style2" />
		<br />
		<br />
		<table style="width: 100%">
			<tr>
				<td class="auto-style5" style="width: 456px">NOMOR SERTIFIKAT</td>
				<td style="width: 43px">:</td>
				<td class="auto-style6">{{$data->nomor_sertifikat}}</td>
			</tr>
			<tr>
				<td class="auto-style5" style="width: 456px">NAMA</td>
				<td style="width: 43px">:</td>
				<td class="auto-style6">{{$data->pelanggan->nama}}</td>
			</tr>
			<tr>
				<td class="auto-style5" style="width: 456px">PENGUJIAN</td>
				<td style="width: 43px">:</td>
				<td class="auto-style6">{{$data->hasiluji->statusuji->pembayaran->pesanuji->jenis}}</td>
			</tr>
			<tr>
				<td class="auto-style5" style="width: 456px">HASIL</td>
				<td style="width: 43px">:</td>
				<td class="auto-style6">{{$data->hasiluji->hasil_pengujian}}</td>
			</tr>
			<tr>
				<td class="auto-style5" style="width: 456px">TANGGAL</td>
				<td style="width: 43px">:</td>
				<td class="auto-style6">{{\Carbon\Carbon::parse($data->created_at)->format('d-M-Y H:i:s')}}</td>
			</tr>
		</table>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		</td>
	</tr>
</table>

</body>

</html>
