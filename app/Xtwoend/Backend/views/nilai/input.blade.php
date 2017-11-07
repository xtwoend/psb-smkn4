
		
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
	@if(Session::get('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ Session::get('message') }}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
		        <div class="box-body">
					<div class="row">
				    	<div class="col-md-12">
				    		{{ Form::open(array('route' => 'admin.nilaitest.search')) }}
							<div class="form-group">
			                    <label>Nomor Pendaftaran</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('nomor_pendaftaran', $register->nomor_pendaftaran , array(
									                'class' => 'form-control',
									                'id'	=> 'nomor_pendaftaran',
									                'tabindex' => '1'
									                )) }}
			                        <span class="input-group-btn">
			                            <button class="btn btn-info btn-flat" id="search" type="button"><i class="fa fa-search"></i></button>
			                        </span>
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
			                {{ Form::close() }}
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	{{ Form::model($register, array('url' => route('admin.nilaitest.update', $register->id), 'method' => 'PUT', 'role' => 'form')) }}
	<div class="row">
		<div class="col-md-8">
			<div class="box box-danger">
		        <div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
			                    <label>Nomor Ujian Nasional</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('nomor_ujian', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nomor_ujian',
									                'disabled'	 => true,
									                'data-inputmask'=> '"mask": "9999999999"',
									                'data-mask' => true						                
									                )) }}
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>

				    	<div class="col-md-6">
							<div class="form-group">
			                    <label>Nomor Pendaftaran</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('nomor_pendaftaran', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nomor_pendaftaran',
									                'disabled'	 => true,
									                )) }}
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
			                    <label for="name">Nama Lengkap</label>
			                    {{ Form::text('nama', null, array(
									                'class' => 'form-control',
									                'id'	=> 'name',
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="radio">
								<label><br>
									{{ Form::radio('jenis_kelamin', 'Laki-Laki', ['disabled'	 => true]) }}
                                    Laki-Laki
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="radio">
                                <label><br>
                                	{{ Form::radio('jenis_kelamin', 'Perempuan', ['disabled'	 => true]) }}
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
									                'id'	=> 'tempat_lahir',
									                'disabled'	 => true,
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
									                'data-mask' => true,
									                'disabled'	 => true,
									                )) }}
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>
					</div>

					<div class="row">
				    	<div class="col-md-6">
							<div class="form-group">
			                    <label for="sekolah_asal">Asal Sekolah</label>
			                    {{ Form::text('sekolah_asal', null, array(
									                'class' => 'form-control',
									                'id'	=> 'sekolah_asal',
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
						</div> 
						<div class="col-xs-6 col-md-3">

							<div class="radio">
								<label><br>
 									{{ Form::radio('status_sekolah', '1',  ['disabled'	 => true]) }}
                                    Dalam Kota
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="radio">
                                <label><br>
                                	{{ Form::radio('status_sekolah', '2',  ['disabled'	 => true]) }}
                                	Luar Kota
								</label>
							</div>             
                        </div>
					</div>
					<div class="row">
				    	<div class="col-xs-6 col-md-4">
			                <div class="form-group">
			                    <label for="nilai_ind">Bahasa Indonesia</label>
			                    {{ Form::text('nilai_ind', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ind',
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true,
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
							<div class="form-group">
			                    <label for="nilai_ing">Bahasa Inggris</label>
			                    {{ Form::text('nilai_ing', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ing',
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true,
									                'disabled'	 => true,
									                )) }}
							</div><!-- /.form group -->
						</div>
						<div class="col-xs-6 col-md-4">
							<div class="form-group">
			                    <label for="nilai_mtk">Matematika</label>
			                    	{{ Form::text('nilai_mtk', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_mtk',
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true,
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
							<div class="form-group">
			                    <label for="nilai_ipa">IPA</label>
			                    {{ Form::text('nilai_ipa', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ipa',
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true,
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-xs-6 col-md-4">
							<div class="form-group">
			                    <label for="nilai_ipa">TOTAL UN</label>
			                    {{ Form::text('total_un', null, array(
									                'class' => 'form-control',
									                'id'	=> 'total_un',
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true,
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
			                <!--
			                <div class="form-group">
			                    <label for="nilai_ipa">Domisili Dalam</label>
			                    {{ Form::text('domisili_to_string', null, array(
									                'class' => 'form-control',
									                'id'	=> 'domisili_to_string',
									                'disabled'	 => true,
									                )) }}
			                </div> -->
						</div>
						
					</div>
									
					<div class="row">
				    	<div class="col-md-12">
							<div class="form-group">
			                    <label for="name">Alamat</label>
			                    {{ Form::textarea('alamat', null, array(
									                'class' => 'form-control',
									                'id'	=> 'alamat',
									                'rows'	=> 4,
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
						</div>
					</div>
				</div>  
			</div><!-- /.BOX -->	
		</div>
		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12 col-xm-12">
							<div class="form-group">
			                    <label for="name">Pilihan 1</label>
			                    {{ Form::text('pilihan_1_string', null, array(
									                'class' => 'form-control',
									                'id'	=> 'pilihan_1_string',
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
							
							<div class="form-group">
			                    <label for="name">Pilihan 2</label>
			                    {{ Form::text('pilihan_2_string', null, array(
									                'class' => 'form-control',
									                'id'	=> 'pilihan_2',
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
						
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-body">
					<div class="row">
						{{-- <div class="col-md-12 col-xm-12">							
							<div class="form-group">
			                    <label for="name">SOAL BENAR</label>
			                    {{ Form::text('nilai_benar', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_benar',
									                'tabindex' => '2'
									                )) }}
			                </div><!-- /.form group -->
							
							<div class="form-group">
			                    <label for="name">SOAL SALAH</label>
			                    {{ Form::text('nilai_salah', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_salah',
									                'tabindex' => '3'
									                )) }}
			                </div><!-- /.form group -->

			                <div class="form-group">
			                    <label for="name">SOAL KOSONG</label>
			                    {{ Form::text('nilai_kosong', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_kosong',
									                )) }}
			                </div><!-- /.form group -->
						</div> --}}
						{{-- <div class="col-md-12 col-xm-12">							
							<div class="form-group">
			                    <label for="name">SKOR PRESTASI</label>
			                    {{ Form::text('skor_prestasi', null, array(
									                'class' => 'form-control',
									                'id'	=> 'skor_prestasi',
									                'tabindex' => '1'
									                )) }}
			                </div>
							
							<div class="form-group">
			                    <label for="name">SKOR TIDAK MAMPU</label>
			                    {{ Form::text('skor_tidak_mampu', null, array(
									                'class' => 'form-control',
									                'id'	=> 'skor_tidak_mampu',
									                'tabindex' => '2'
									                )) }}
			                </div>
						</div> --}}
					<div class="col-md-12 col-xm-12">							
						<div class="form-group">
							<label for="name">GELOMBANG KEDUA</label>
							<div class="radio">
								<label><br>
 									{{ Form::checkbox('tahap_2',  1, null) }}
                                 	GELOMBANG II
								</label>
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-primary" type="submit" tabindex="3"><i class="fa fa-save"></i> Simpan </button>
			</div>
			
		</div>
	</div>	

	{{ Form::close() }}	

	</section><!-- /.content -->
                
</aside><!-- /.right-side -->
