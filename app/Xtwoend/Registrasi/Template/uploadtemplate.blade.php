<html>
	
	

	<table>
		<tr>
			<td colspan="21"> <h2>DAFTAR PENDAFTAR JALUR DOMISILI SMK NEGERI 4 KOTA TANGERANG TAHUN AJARAN 2014 / 2015 </h2></td>
		</tr>
	</table>
	<table>
		<tr >
			<th style="border: 1px solid #000;">NO.</th>
			<th style="border: 1px solid #000;">NO. REGISTRASI</th>
			<th style="border: 1px solid #000;">NO. UN</th>
			<th style="border: 1px solid #000;">NAMA</th>
			<th style="border: 1px solid #000;">JENIS KELAMIN</th>
			<th style="border: 1px solid #000;">SEKOLAH ASAL</th>
			<th style="border: 1px solid #000;">STATUS SEKOLAH</th>
			<th style="border: 1px solid #000;">TANGGAL LAHIR</th>
			<th style="border: 1px solid #000;">DOMISILI</th>
			<th style="border: 1px solid #000;">DITERIMA DI</th>
			<th style="border: 1px solid #000;">ALAMAT</th>
			<th style="border: 1px solid #000;">KETERANGAN</th>
			<th style="border: 1px solid #000;">TANGGAL DAFTAR ULANG</th>
			<th style="border: 1px solid #000;">TANGGAL DAFTAR</th>
			<th style="border: 1px solid #000;">OPERATOR</th>
		</tr>
		<?php $no=0; ?>
		@foreach($data as $row)
		<tr>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $no++ }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_pendaftaran }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_ujian }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nama }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->jenis_kelamin }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->sekolah_asal }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->status_sekolah_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->tanggal_lahir }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->domisili_to_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->terima_di }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->alamat }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->keterangan }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->updated_at }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->created_at }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->user->first_name }}</td>
		</tr>
		@endforeach
	</table>
</html>