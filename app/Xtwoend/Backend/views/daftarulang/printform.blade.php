<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 class="pull-left">
                        {{ Theme::get('title') }}
                        <small>{{ Theme::get('subtitle') }}</small>
                    </h1>
                    <div class="pull-right">
                        <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Back </a>
                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <a class="btn btn-primary" target="_blank" style="margin-right: 5px;" href="{{ route('admin.registrasi.pdf', array('id'=>$pendaftar->id)) }}"><i class="fa fa-download"></i> Generate PDF</a>
                    </div>
                    <div class="clearfix"></div>
                </section>

                <!-- Main content -->
                <section class="content cetakbukti">                    
                    
                    <!-- title row -->
                   <div class="row">
                        <div class="col-xs-1">
                            {{ HTML::image('assets/img/logokotatangerang32.png'); }}
                        </div>
                        <div class="col-xs-4 center">
                            <strong>PEMERINTAH KOTA TANGERANG</strong>
                            <br><strong>DINAS PENDIDIKAN</strong>
                            <br>Jl. Ks. Tubun No. 1 Gedung Cisadane Lt. 1 Kota Tangerang 15111
                        </div> 
                        <div class="col-xs-4">
                            <strong>BUKTI DAFTAR ULANG JALUR UMUM</strong>
                            <br>PERSERTA DIDIK SMK NEGERI
                            <br>TAHUN PELAJARAN 2015/2016
                        </div> 
                        <div class="col-xs-2">
                           <table border="1" class="pull-right">
                               <tr>
                                   <td> &nbsp; <strong>Lembar</strong> &nbsp;</td>
                               </tr>
                               <tr>
                                   <td class="center space"> <strong> 1 </strong> </td>
                               </tr>
                           </table> 
                        </div>
                        <div class="col-xs-1">
                            {{ HTML::image(DNS2D::getBarcodePNGPath($pendaftar->nomor_pendaftaran , "QRCODE", 2, 2)) }}                            
                        </div>
                    </div>
                    <hr>  
                    <!-- info row -->
                    <div class="row">
                        <div class="col-xs-12">
                           <table cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="150">No. Daftar</td>
                                <td width="5">:</td>
                                <td width="161">{{ $pendaftar->nomor_pendaftaran }}</td>
                                <td width="64"></td>
                                <td width="10"></td>
                                <td width="130">No. Ujian</td>
                                <td width="11">:</td>
                                <td>{{ $pendaftar->nomor_ujian }}</td>
                              </tr>
                              <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>{{ $pendaftar->nama }}</td>
                                <td></td>
                                <td></td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ $pendaftar->jenis_kelamin }}</td>
                              </tr>
                              <tr>
                                <td>Asal Sekolah</td>
                                <td>:</td>
                                <td>{{ $pendaftar->sekolah_asal }}</td>
                                <td></td>
                                <td></td>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $pendaftar->tanggal_lahir }}</td>
                              </tr>
                              <tr>
                                <td>Asal Pendaftar</td>
                                <td>:</td>
                                <td>{{ $pendaftar->asal_pendaftar }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Nilai Ujian Nasional</td>
                                <td>:</td>
                                <td>A. Bahasa Indonesia</td>
                                <td>: {{ $pendaftar->nilai_ind }}</td>
                                <td></td>
                                <td>Total Nilai</td>
                                <td>: </td>
                                <td> {{ ($pendaftar->nilai_mtk + $pendaftar->nilai_ind + $pendaftar->nilai_ipa + $pendaftar->nilai_ing) }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td>B. Matematika</td>
                                <td>: {{ $pendaftar->nilai_mtk }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td>C. IPA</td>
                                <td>: {{ $pendaftar->nilai_ipa }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td>D. Bahasa Inggis</td>
                                <td>: {{ $pendaftar->nilai_ing }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>Diterima DI</td>
                                <td>:</td>
                                <td>SMK Negeri 4 Kota Tangerang</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td>{{ $pendaftar->terima_3 }}</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </table>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                         <div class="col-xs-12"><p>&nbsp;</p></div>
                    </div>
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-7">
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <strong>Datang kembali untuk mengikuti kegiatan MBS tanggal 25 Juli 2015 jam 07.00</strong><br>
                                <strong>Manggunakan Seragam Sekolah Lengkap ( SMP ) dan Perlalatan Tulis </strong><br><br>

                               
                            </p>
                        </div><!-- /.col -->
                        <div class="col-xs-2">
                            <p>
                                <br>Operator,
                            </p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <strong>{{ \Sentry::getUser()->first_name }} {{ \Sentry::getUser()->last_name }}</strong>
                        </div><!-- /.col -->
                        <div class="col-xs-3">
                            <p>
                                Tangerang, {{ date('d M Y') }}
                                <br>Calon Peserta Didik,
                            </p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <strong>{{ $pendaftar->nama }}</strong>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                         <div class="col-xs-12">
                            <strong> Lembar 1 - Untuk Sekolah </strong><br>
                            Penerimaan siwa jalur umum SMK Negeri 4 Tangerang
                         <p>&nbsp;</p>
                         <hr>
                         <p>&nbsp;</p>
                         </div>
                    </div>
                    
                    <!-- lembar ke 2 -->

                <div class="row">
                        <div class="col-xs-1">
                            {{ HTML::image('assets/img/logokotatangerang32.png'); }}
                        </div>
                        <div class="col-xs-4 center">
                            <strong>PEMERINTAH KOTA TANGERANG</strong>
                            <br><strong>DINAS PENDIDIKAN</strong>
                            <br>Jl. Ks. Tubun No. 1 Gedung Cisadane Lt. 1 Kota Tangerang 15111
                        </div> 
                        <div class="col-xs-4">
                            <strong>BUKTI DAFTAR ULANG JALUR UMUM</strong>
                            <br>PERSERTA DIDIK SMK NEGERI
                            <br>TAHUN PELAJARAN 2015/2016
                        </div> 
                        <div class="col-xs-2">
                           <table border="1" class="pull-right">
                               <tr>
                                   <td> &nbsp; <strong>Lembar</strong> &nbsp;</td>
                               </tr>
                               <tr>
                                   <td class="center space"> <strong> 2 </strong> </td>
                               </tr>
                           </table> 
                        </div>
                        <div class="col-xs-1">
                            {{ HTML::image(DNS2D::getBarcodePNGPath($pendaftar->nomor_pendaftaran , "QRCODE", 2, 2)) }}                            
                        </div>
                    </div>
                    <hr>  
                    <!-- info row -->
                    <div class="row">
                        <div class="col-xs-12">
                           <table cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="150">No. Daftar</td>
                                <td width="5">:</td>
                                <td width="161">{{ $pendaftar->nomor_pendaftaran }}</td>
                                <td width="64"></td>
                                <td width="10"></td>
                                <td width="130">No. Ujian</td>
                                <td width="11">:</td>
                                <td>{{ $pendaftar->nomor_ujian }}</td>
                              </tr>
                              <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>{{ $pendaftar->nama }}</td>
                                <td></td>
                                <td></td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ $pendaftar->jenis_kelamin }}</td>
                              </tr>
                              <tr>
                                <td>Asal Sekolah</td>
                                <td>:</td>
                                <td>{{ $pendaftar->sekolah_asal }}</td>
                                <td></td>
                                <td></td>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $pendaftar->tanggal_lahir }}</td>
                              </tr>
                              <tr>
                                <td>Asal Pendaftar</td>
                                <td>:</td>
                                <td>{{ $pendaftar->asal_pendaftar }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Nilai Ujian Nasional</td>
                                <td>:</td>
                                <td>A. Bahasa Indonesia</td>
                                <td>: {{ $pendaftar->nilai_ind }}</td>
                                <td></td>
                                <td>Total Nilai</td>
                                <td>: </td>
                                <td> {{ ($pendaftar->nilai_mtk + $pendaftar->nilai_ind + $pendaftar->nilai_ipa + $pendaftar->nilai_ing) }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td>B. Matematika</td>
                                <td>: {{ $pendaftar->nilai_mtk }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td>C. IPA</td>
                                <td>: {{ $pendaftar->nilai_ipa }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td>D. Bahasa Inggis</td>
                                <td>: {{ $pendaftar->nilai_ing }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>Diterima Di</td>
                                <td>:</td>
                                <td>SMK Negeri 4 Kota Tangerang</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td>{{ $pendaftar->terima_3 }}</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </table>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                         <div class="col-xs-12"><p>&nbsp;</p></div>
                    </div>
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-7">
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <strong>Datang kembali untuk mengikuti kegiatan MBS tanggal 25 Juli 2015 jam 07.00</strong><br>
                                <strong>Manggunakan Seragam Sekolah Lengkap ( SMP ) dan Perlalatan Tulis </strong><br><br>
                            </p>
                        </div><!-- /.col -->
                        
                        <div class="col-xs-2">
                            <p>
                                <br>Operator,
                            </p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <strong>{{ \Sentry::getUser()->first_name }} {{ \Sentry::getUser()->last_name }}</strong>
                        </div><!-- /.col -->
                        <div class="col-xs-3">
                            <p>
                                Tangerang, {{ date('d M Y') }}
                                <br>Calon Peserta Didik,
                            </p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <strong>{{ $pendaftar->nama }}</strong>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                         <div class="col-xs-12">
                            <strong> Lembar 2 - Untuk Calon Peserta Didik </strong><br>
                            Penerimaan siwa jalur umum SMK Negeri 4 Tangerang
                         </div>
                         <hr>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->