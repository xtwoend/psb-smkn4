<html>
	
	

	<table>
		<tr>
			<td colspan="21"> <h2>DAFTAR PENDAFTAR JALUR DOMISILI SMK NEGERI 4 KOTA TANGERANG TAHUN AJARAN 2014 / 2015 </h2></td>
		</tr>
	</table>
	<table>
		<tr >
			<th style="border: 1px solid #000;">NO.</th>
			<th style="border: 1px solid #000;">NIP</th>
			<th style="border: 1px solid #000;">NAMA</th>
			<th style="border: 1px solid #000;">TANGGAL</th>
			@foreach($data['date'] as $d)
			<th style="border: 1px solid #000;">{{ date('d',strtotime($d->time)); }}</th>
			@endforeach()
		</tr>
		@foreach($data['data'] as $row)
		<tr>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->id }}</td>
			
		</tr>
		@endforeach
	</table>
</html>