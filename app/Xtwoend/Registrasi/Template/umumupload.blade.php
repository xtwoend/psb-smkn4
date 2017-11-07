
<html>
	<table>
		<tr>
			<th style="border: 1px solid #000;">NO.</th>
			<th style="border: 1px solid #000;">NO. DAFTAR</th>
			<th style="border: 1px solid #000;">NO. UJIAN</th>
			<th style="border: 1px solid #000;">NISN</th>
			<th style="border: 1px solid #000;">NAMA LENGKAP</th>
			<th style="border: 1px solid #000;">TEMPAT LAHIR</th>
			<th style="border: 1px solid #000;">TANGGAL LAHIR</th>
			<th style="border: 1px solid #000;">ASAL SEKOLAH</th>
			<th style="border: 1px solid #000;">B. INDO</th>
			<th style="border: 1px solid #000;">MTK</th>
			<th style="border: 1px solid #000;">IPA</th>
			<th style="border: 1px solid #000;">B. Ing</th>
			<th style="border: 1px solid #000;">NILAI UN</th>
			<th style="border: 1px solid #000;">NILAI KHUSUS</th>
			<th style="border: 1px solid #000;">PILIHAN 1</th>
			<th style="border: 1px solid #000;">PILIHAN 2</th>
			<th style="border: 1px solid #000;">TOTAL NILAI</th>
			<th style="border: 1px solid #000;">SKOR PRESTASI</th>
			<th style="border: 1px solid #000;">SKOR AFIRMASI</th>
			<th style="border: 1px solid #000;">STATUS</th>
			<th style="border: 1px solid #000;">DITERIMA DI</th>
			<th style="border: 1px solid #000;">JALUR</th>
		</tr>
		<?php $no=1; ?>
		@foreach($data as $row)

		<tr>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $no++ }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_pendaftaran }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nomor_ujian }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nisn }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nama }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->tempat_lahir }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->tanggal_lahir }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->sekolah_asal }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ind }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_mtk }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ipa }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_ing }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->total_un }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_tes }}</td>

			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->pilihan1_string }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->pilihan2_string }}</td>
			
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->nilai_pil_1 }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->skor_prestasi }}</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">{{ $row->skor_tidak_mampu }}</td>
			
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">
				{{ ($row->terima_3 <> 0 || $row->status_diterima)? 'DITERIMA' : 'TIDAK DITERIMA' }}
			</td>

			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">
				
				<?php
					$id = null;
					if($row->status_diterima){
						$id = $row->pilihan_1;
					}else if($row->terima_3 <> 0) {
						$id = $row->terima_3;
					}
				?>
				{{ ($d = Xtwoend\Models\Eloquent\Jurusan::find($id)) ? $d->jurusan : '' }}
			</td>
			<td style="border: 1px solid #000;	border-bottom: 1px dashed #000; border-top: 1px dashed #000;">
				<?php
					// ['AKADEMIK', 'PRESTASI', 'AFIRMASI']
				?>
				@if($row->status_diterima && ($row->skor_prestasi <> 0))
					PRESTASI
				@elseif($row->status_diterima && ($row->skor_tidak_mampu <> 0))
					AFIRMASI
				@elseif($row->terima_3 <> 0)
					AKADEMIK
				@else 
					AKADEMIK
				@endif

			</td>
		</tr>

		@endforeach
	</table>
</html>