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
			<th style="border: 1px solid #000;">NILAI BHS. IND</th>
			<th style="border: 1px solid #000;">NILAI BHS. ING</th>
			<th style="border: 1px solid #000;">NILAI MATEMATIK</th>
			<th style="border: 1px solid #000;">NILAI IPA</th>
			<th style="border: 1px solid #000;">TOTAL UN</th>
			<th style="border: 1px solid #000;">NILAI TES</th>
			<th style="border: 1px solid #000;">DOMISILI</th>
			<th style="border: 1px solid #000;">PILIHAN 1</th>
			<th style="border: 1px solid #000;">PILIHAN 2</th>
			<th style="border: 1px solid #000;">PILIHAN 3</th>
			<th style="border: 1px solid #000;">PILIHAN 4</th>
			<th style="border: 1px solid #000;">ALAMAT</th>
			<th style="border: 1px solid #000;">TANGGAL DAFTAR</th>
			<th style="border: 1px solid #000;">OPERATOR</th>
		</tr>
		@foreach($data as $row)
		<tr>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->id }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_pendaftaran }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_ujian }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nama }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->jenis_kelamin }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->sekolah_asal }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->status_sekolah_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->tanggal_lahir }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ind }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ing }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_mtk }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ipa }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->total_un }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_tes }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->domisili_to_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->pilihan_1_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->pilihan_2_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->pilihan_3_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->pilihan_4_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->alamat }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->created_at }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->user->first_name }}</td>
		</tr>
		@endforeach
	</table>
</html>