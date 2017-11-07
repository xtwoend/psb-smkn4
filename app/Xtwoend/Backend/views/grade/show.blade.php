<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nomor Reg.</th>
                                        <th>Nomor UN</th>
                                        <th>Nama</th>
                                        <th>Sekolah Asal</th>
                                        <th>Tanggal Lahir</th>
                                        <!--
                                        <th>Total UN</th>
                                        <th>Domisili</th>
                                        -->
                                        <th>Pilihan 1</th>
                                        <th>Pilihan 2</th>
                                        <!--
                                        <th>{{ studly_case(Input::old('pilihan')) }}</th>-->
                                        <th>Nilai 1</th>
                                        <th>Status</th>
                                        <th>DITERIMA DI</th>
                                        {{-- <th>Keterangan</th> --}}
                                    </tr>
                                    <?php $no =1; ?>
									@foreach($pendaftars as $row)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $row->nomor_pendaftaran }}</td>	
										<td>{{ $row->nomor_ujian }} </td>
										<td>{{ $row->nama }} </td>
										<td>{{ $row->sekolah_asal }} </td>
										<td>{{ $row->tanggal_lahir }} </td>
										<!--
										<td>{{ $row->total_un }} </td>
										<td>{{ $row->domisili_to_string }} </td>
										-->
										<td>{{ $row->pilihan_1_string }} </td>
										<td>{{ $row->pilihan_2_string }} </td>
										<!--
										<td>{{ $row->{Input::old('pilihan').'_string'} }} </td>
										-->
										<td>{{ $row->nilai_pil_1 }} </td>
                                        <td>{{ ($row->proses_3 <> 0)? 'DITERIMA': 'TIDAK DITERIMA' }}</td>
                                        <td>{{ ($row->terima_3 <> 0)? Xtwoend\Models\Eloquent\Jurusan::find($row->terima_3)->jurusan: '' }}</td>
										{{-- <td>{{ ($row->proses_3 == 1)? 'DITERIMA': 'TIDAK DITERIMA' }}</td> --}}
										{{-- <td>{{ ($row->terima_3 <> 0)? Xtwoend\Models\Eloquent\Jurusan::find($row->terima_3)->jurusan: '' }}</td> --}}
                                        {{-- <td>{{ Xtwoend\Models\Eloquent\Jurusan::find($row->terima_1)->jurusan }}</td> --}}
									</tr>
									@endforeach
								</table>
							</div>
						</div>						
					</div>