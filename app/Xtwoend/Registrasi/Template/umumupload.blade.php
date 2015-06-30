<html>
	
	

	<table>
		<tr>
			<td colspan="19"> <h4></h4></td>
		</tr>
		<tr>
			<td colspan="19"> <h4></h4></td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>
	<table>
		<tr >
			<th style="border: 1px solid #000;">NO.</th>
			<th style="border: 1px solid #000;">NO. DAFTAR</th>
			<th style="border: 1px solid #000;">NO. UJIAN</th>
			<th style="border: 1px solid #000;">NAMA LENGKAP</th>
			<th style="border: 1px solid #000;">ASAL SEKOLAH</th>
			<th style="border: 1px solid #000;">B. INDO</th>
			<th style="border: 1px solid #000;">MTK</th>
			<th style="border: 1px solid #000;">IPA</th>
			<th style="border: 1px solid #000;">B. Ing</th>
			<th style="border: 1px solid #000;">NILAI UN</th>
			<th style="border: 1px solid #000;">UN BOBOT 1</th>
			<th style="border: 1px solid #000;">UN BOBOT 2</th>
			<th style="border: 1px solid #000;">NILAI KHUSUS</th>
			<th style="border: 1px solid #000;">PILIHAN 1</th>
			<th style="border: 1px solid #000;">PILIHAN 2</th>
			<th style="border: 1px solid #000;">TOTAL NILAI</th>
			<th style="border: 1px solid #000;">DITERIMA DI</th>
			<th style="border: 1px solid #000;">ASAL PENDAFTAR</th>
			<th style="border: 1px solid #000;">GELOMBANG</th>
			<th style="border: 1px solid #000;">RUANGAN</th>
			<th style="border: 1px solid #000;">BANGKU</th>
		</tr>
		<?php $no=0; ?>
		@foreach($data as $row)
		<tr>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $no++ }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_pendaftaran }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_ujian }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nama }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->asal_sekolah }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ind }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_mtk }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ipa }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ing }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->total_un }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->total_un }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">0</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_pil_3 }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">
				{{ \Xtwoend\Models\Eloquent\Jurusan::find($row->pilihan_1)->jurusan }}
			</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">
				{{ (\Xtwoend\Models\Eloquent\Jurusan::find($row->pilihan_2))? \Xtwoend\Models\Eloquent\Jurusan::find($row->pilihan_2)->jurusan: 'TIDAK MEMILIH'; }}
			</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_pil_4 }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">
				<?php 
					$terima = [1 => 'DI PILIHAN 1', 2 => 'DI PILIHAN 2', 0=> 'TIDAK DITERIMA'];
				?>
				{{ $terima[$row->terima_di] }}
			</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->asal_pendaftar }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->gelombang }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->ruang }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->bangku }}</td>
		</tr>
		@endforeach
	</table>
</html>