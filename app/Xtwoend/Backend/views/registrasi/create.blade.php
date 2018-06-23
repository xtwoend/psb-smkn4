<form method="POST" action="{{ route('admin.registrasi.store') }}">
		
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <h1  class="pull-left">
	    	{{ Theme::get('title') }}
	        <small>{{ Theme::get('subtitle') }}</small>
	    </h1>
		<div class="pull-right">
			<a href="{{URL::previous()}}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Back </a>
			<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan </button>
		</div>
		<div class="clearfix"></div>
	</section>
	<!-- Main content -->
	<section class="content">
	
	@if($errors->count() > 0)
	<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>The following errors have occurred:</p>

	    <ul>
	        @foreach( $errors->all() as $message )
	          <li>{{ $message }}</li>
	        @endforeach
	    </ul>
	</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
		        <div class="box-body">
					<div class="row">
				    	<div class="col-md-12">
							<div class="form-group">
			                    <label>Nomor Ujian Nasional</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('nomor_ujian', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nomor_ujian',
									                'data-inputmask'=> '"mask": "99999999999999[9]"',
									                'data-mask' => true
									                )) }}
			                        <span class="input-group-btn">
			                            <button class="btn btn-info btn-flat" id="search" type="button"><i class="fa fa-search"></i></button>
			                        </span>
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-12">
							<div class="form-group">
			                    <label>Nomor NISN</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('nisn', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nisn'
									                )) }}
			                        <span class="input-group-btn">
			                            <button class="btn btn-info btn-flat" id="search" type="button"><i class="fa fa-search"></i></button>
			                        </span>
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
			                    <label for="name">Nama Lengkap</label>
			                    {{ Form::text('nama', null, array(
									                'class' => 'form-control',
									                'id'	=> 'name'
									                )) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="radio">
								<label><br>
									{{ Form::radio('jenis_kelamin', 1) }}
                                    Laki-Laki
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="radio">
                                <label><br>
                                	{{ Form::radio('jenis_kelamin', 2) }}
                                	Perempuan
								</label>
							</div>             
                        </div>

					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
			                    <label for="tempat_lahir">Tempat Lahir</label>
			                    {{ Form::text('tempat_lahir', null, array(
									                'class' => 'form-control',
									                'id'	=> 'tempat_lahir'
									                )) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-4">
							<div class="form-group">
			                    <label>Tanggal Lahir</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-calendar"></i>
			                        </div>
			                        {{ Form::text('tanggal_lahir', null, array(
									                'class' => 'form-control',
									                'id'	=> 'tanggal_lahir',
									                'data-inputmask'=> '"alias": "dd/mm/yyyy"',
									                'data-mask' => true
									                )) }}
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>
					</div>
					<div class="row">
				    	<div class="col-md-6">
							<div class="form-group">
			                    <label for="sekolah_asal">Sekolah Asal</label>
			                    {{ Form::text('sekolah_asal', null, array(
									                'class' => 'form-control',
									                'id'	=> 'name'
									                )) }}
			                </div><!-- /.form group -->
						</div> 
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                {{ Form::select('tahun_lulus', [2015 => '2015', '2016', '2017', '2018'], null, ['class' => 'form-control']) }}
                            </div>
                        </div>
						<div class="col-xs-4 col-md-2">

							<div class="radio">
								<label><br>
									{{ Form::radio('status_sekolah', '1', array('checked'=>true)) }}
                                    Dalam Kota
								</label>
							</div>
						</div>
						<div class="col-xs-4 col-md-2">
							<div class="radio">
                                <label><br>
                                	{{ Form::radio('status_sekolah', '2') }}
                                	Luar Kota
								</label>
							</div>             
                        </div>
					</div>
					<div class="row">
				    	<div class="col-xs-6 col-md-2">
			                <div class="form-group">
			                    <label for="nilai_ind">Bahasa Indonesia</label>
			                    {{ Form::text('nilai_ind', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ind',
									                //'data-inputmask'=> '"mask": "999"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
							<div class="form-group">
			                    <label for="nilai_ing">Bahasa Inggris</label>
			                    {{ Form::text('nilai_ing', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ing',
									                //'data-inputmask'=> '"mask": "999"',
									                'data-mask' => true
									                )) }}
							</div><!-- /.form group -->
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
			                    <label for="nilai_mtk">Matematika</label>
			                    	{{ Form::text('nilai_mtk', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_mtk',
									                //'data-inputmask'=> '"mask": "999"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
							<div class="form-group">
			                    <label for="nilai_ipa">IPA</label>
			                    {{ Form::text('nilai_ipa', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ipa',
									                //'data-inputmask'=> '"mask": "999"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
			                    <label for="skor_prestasi">Skor Prestasi</label>
			                    	{{ Form::text('skor_prestasi', null, array(
									                'class' => 'form-control',
									                'id'	=> 'skor_prestasi',
									                //'data-inputmask'=> '"mask": "999"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
							<div class="form-group">
			                    <label for="skor_tidak_mampu">Skor Tidak Mampu</label>
			                    {{ Form::text('skor_tidak_mampu', null, array(
									                'class' => 'form-control',
									                'id'	=> 'skor_tidak_mampu',
									                //'data-inputmask'=> '"mask": "999"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-xs-6 col-md-4">
							<label>Jalur Penerimaan</label>
							<div class="form-group">
								{{ Form::select('jalur_penerimaan', [1 => 'UMUM', 'Prestasi', 'Afirmasi', 'Zonasi', 'Luar Provinsi'], null, ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="col-xs-6 col-md-4">
			                <label for="name">Pilihan</label>
							<div class="form-group"> 
								@foreach(Xtwoend\Models\Eloquent\Jurusan::all() as $row)
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_1', $row->id) }}
											{{ $row->jurusan }}
									</label>
								</div>
								@endforeach
							</div>

							
						</div>
						<div class="col-xs-6 col-md-4">
			                {{-- <label for="name">Pilihan II</label>
							<div class="form-group"> 
								@foreach(Xtwoend\Models\Eloquent\Jurusan::all() as $row)
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_2', $row->id) }}
											{{ $row->jurusan }}
									</label>
								</div>
								@endforeach
							</div> --}}
						</div>
						
						{{-- <div class="col-xs-6 col-md-2">
			                <label for="name">Pilihan III</label>
							<div class="form-group"> 
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_3', '1') }}
                                           Teknik Mesin
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_3', '2') }}
                                           Teknik Listrik
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_3', '3') }}
                                           Teknik Sipil
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_3', '4') }}
                                           RPL
									</label>
								</div>
							</div>
						</div>

						<div class="col-xs-6 col-md-2">
			                <label for="name">Pilihan IV</label>
							<div class="form-group"> 
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_4', '1') }}
                                           Teknik Mesin
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_4', '2') }}
                                           Teknik Listrik
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_4', '3') }}
                                           Teknik Sipil
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_4', '4') }}
                                           RPL
									</label>
								</div>
							</div>
							
						</div> --}}
					</div>
					<div class="row">
						<div class="col-md-12">
						<label>Wilayah Domisili</label>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6 col-md-3">
							<div class="radio">
								<label>
									{{ Form::radio('domisili', '1') }}
 									
                                   	RT
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="radio">
                                <label>
                                	{{ Form::radio('domisili', '2') }}
                                	RW
								</label>
							</div>             
                        </div>
                        <div class="col-xs-6 col-md-3">
							<div class="radio">
                                <label>
                                	{{ Form::radio('domisili', '3') }}
                                	KELURAHAN
								</label>
							</div>             
                        </div>
                        <div class="col-xs-6 col-md-3">
							<div class="radio">
                                <label>
                                	{{ Form::radio('domisili', '4') }}
                                	KECAMATAN
								</label>
							</div>             
                        </div>
					</div>
					<div class="form-group">
                        <label>Alamat</label>
                        {{ Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 4]) }}
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        {{ Form::text('desa', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        {{ Form::text('kecamatan', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>Kota/Kab</label>
                        {{ Form::text('kota', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        {{ Form::text('provinsi', null, ['class' => 'form-control']) }}
                    </div>
					{{-- <div class="row">
						<div class="col-md-12">
							<div class="form-group">
			                    <label for="name">Alamat</label>
			                    {{ Form::textarea('alamat', null, array(
									                'class' => 'form-control',
									                'id'	=> 'alamat',
									                'rows'	=> 3
									                )) }}
			                </div><!-- /.form group -->
						</div>
					</div> --}}

                    <h4>Informasi Orang Tua / Wali</h4>
                    <div class="form-group">
                        <label>Nomor KK</label>
                        {{ Form::text('nomor_kk', null, ['class' => 'form-control', 'data-inputmask'=> '"mask": "99999999999999999[9]"','data-mask' => true]) }}
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nama Ayah</label>
                            {{ Form::text('nama_ayah', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pekerjaan</label>
                            {{ Form::text('pekerjaan_ayah', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nama Ibu</label>
                            {{ Form::text('nama_ibu', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pekerjaan</label>
                            {{ Form::text('pekerjaan_ibu', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telp</label>
                        {{ Form::text('nomor_telp', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat Orang Tua</label>
                        {{ Form::textarea('alamat_orangtua', null, ['class' => 'form-control', 'rows' => 4]) }}
                    </div>
				</div>  
			</div><!-- /.BOX -->
		</div>
	</div>	
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->

</form>