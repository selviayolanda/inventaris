<!DOCTYPE html>
<html>
<head>
	<title>Cetak</title>
</head>
<body onload="javascript:window.print()">
	<center>
		<table style="text-align: center;">
			<tr>
				<td><img src=""></td>
				<td style="font-family: sans-serif; text-align: center;">
					<div style="text-align: center;">
						<h2>Laporan harian peminjaman</h2>
						<h2>Inventaris</h2>
					</div>
					<p style="text-align: center;">Jl. kelet ploso KM 36, kelet, keling, Jepara, jawa tengah 59454</p>
				</td>
				<hr style="text-align: center;">
				<td><img src=""></td>
			</tr>
		</table>
	</center>
	<br>
	<table cellspacing="0" width="100%" border="1">
		<tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama pegawai</th>
            <th>Kode peminjaman</th>
            <th>Nama</th>
            <th>Tanggal pinjam</th>
            <th>Tanggal kembali</th>
            <th>Kondisi </th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $in =>$peminjaman)
        <tr>
            <th>{{ $in+1}}</th>
            <th>{{ $peminjaman->nip}}</th>
            <td>{{ $peminjaman->nama_pegawai}}</td>
            <td>{{ $peminjaman->kode_peminjaman}}</td>
            <td>{{ $peminjaman->nama}}</td>
            <td>{{ $peminjaman->tanggal_pinjam}}</td>
            <td>{{ $peminjaman->tanggal_kembali}}</td>
            <td>{{ $peminjaman->kondisi}}</td>
            <td>{{ $peminjaman->status}}</td>
        </tr>
        @endforeach

	</table>
	<table style="text-align: center;">
		<tr>
			<td style="font-family: sans-serif;text-align: center;">
				<div style="text-align: center; float: right; margin-left: 500px; margin-top: 25px;">Jepara, {{date('Y-m-d')}}</div>
			</td>
		</tr>
	</table>
	<table style="text-align: center;">
		<tr>
			<td style="font-family: sans-serif;text-align: center;">
				<div style="text-align: center; float: right; margin-left: 520px; margin-top: 40px;">Admin</div>
			</td>
		</tr>
	</table>

</body>
</html>