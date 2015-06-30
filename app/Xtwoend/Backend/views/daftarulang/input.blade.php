{{ Form::model($register, array('url' => route('admin.daftarulang.update', $register->id), 'method' => 'PUT', 'role' => 'form')) }}
		
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
			<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Daftar Ulang </button>
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
									{{ Form::radio('jenis_kelamin', 'Laki-Laki') }}
                                    Laki-Laki
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="radio">
                                <label><br>
                                	{{ Form::radio('jenis_kelamin', 'Perempuan') }}
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
			                    {{ Form::text('asal_sekolah', null, array(
									                'class' => 'form-control',
									                'id'	=> 'asal_sekolah',
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
						</div> 
						<div class="col-xs-6 col-md-3">

							<div class="radio">
								<label><br>
 									{{ Form::radio('status_sekolah', '1') }}
                                    Dalam Kota
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="radio">
                                <label><br>
                                	{{ Form::radio('status_sekolah', '2') }}
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

			                <div class="form-group">
			                    <label for="nilai_ipa">Asal Pendaftar</label>
			                    {{ Form::text('asal_pendaftar', null, array(
									                'class' => 'form-control',
									                'id'	=> 'asal_pendaftar',
									                'disabled'	 => true,
									                )) }}
			                </div><!-- /.form group -->
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
						<div class="col-md-8 col-xm-8">
							<div class="radio">
								<label><br>
									{{ Form::checkbox('daftarulang', 1, TRUE) }}
                                    Daftar Ulang
								</label>
							</div>
							<div class="radio">
								<label><br>
									{{ Form::checkbox('biodata', 1) }}
                                    Bio Data
								</label>
							</div>
							<div class="radio">
								<label><br>
									{{ Form::checkbox('spot', 1) }}
                                    Surat Pernyataan Orang Tua
								</label>
							</div>
							<div class="radio">
								<label><br>
									{{ Form::checkbox('spcs', 1) }}
                                    Surat Pernyataan Calon Siswa
								</label>
							</div>
							<div class="radio">
								<label><br>
									{{ Form::checkbox('spttn', 1) }}
                                    Surat Penyataan Narkoba
								</label>
							</div>
							<div class="radio">
								<label><br>
									{{ Form::checkbox('foto', 1) }}
                                    Foto
								</label>
							</div>     
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
		</div>
	</div>		
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->

{{ Form::close() }}