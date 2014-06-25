{{ Form::model($register, array('url' => route('admin.registrasi.update', $register->id), 'method' => 'PUT', 'role' => 'form')) }}
		
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
									                'data-inputmask'=> '"mask": "9999999999"',
									                'data-mask' => true
									                )) }}
			                        <span class="input-group-btn">
			                            <button class="btn btn-info btn-flat" type="button"><i class="fa fa-search"></i></button>
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
									{{ Form::radio('jenis_kelamin', 'Laki-Laki') }}
                                    Laki-Laki
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
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
									                'data-mask' => true
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
									                'id'	=> 'name'
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
				    	<div class="col-xs-6 col-md-2">
			                <div class="form-group">
			                    <label for="nilai_ind">Bahasa Indonesia</label>
			                    {{ Form::text('nilai_ind', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ind',
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
							<div class="form-group">
			                    <label for="nilai_ing">Bahasa Inggris</label>
			                    {{ Form::text('nilai_ing', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ing',
									                'data-inputmask'=> '"mask": "99.99"',
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
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
							<div class="form-group">
			                    <label for="nilai_ipa">IPA</label>
			                    {{ Form::text('nilai_ipa', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nilai_ipa',
									                'data-inputmask'=> '"mask": "99.99"',
									                'data-mask' => true
									                )) }}
			                </div><!-- /.form group -->
						</div>
						
						<div class="col-xs-6 col-md-2">
			                <label for="name">Pilihan I</label>
							<div class="form-group"> 
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_1', '1') }}
                                           Teknik Mesin
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_1', '2') }}
                                           Teknik Sipil
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_1', '3') }}
                                           Teknik Listrik
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_1', '4') }}
                                           Teknik Informatika
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
			                <label for="name">Pilihan II</label>
							<div class="form-group"> 
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_2', '1') }}
                                           Teknik Mesin
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_2', '2') }}
                                           Teknik Sipil
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_2', '3') }}
                                           Teknik Listrik
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_2', '4') }}
                                           Teknik Informatika
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
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
                                           Teknik Sipil
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_3', '3') }}
                                           Teknik Listrik
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_3', '4') }}
                                           Teknik Informatika
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
                                           Teknik Sipil
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_4', '3') }}
                                           Teknik Listrik
									</label>
								</div>
								<div class="radio">
									<label>
										{{ Form::radio('pilihan_4', '4') }}
                                           Teknik Informatika
									</label>
								</div>
							</div>
						</div>
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
					<div class="row">
				    	<div class="col-md-12">
							<div class="form-group">
			                    <label for="name">Alamat</label>
			                    {{ Form::textarea('alamat', null, array(
									                'class' => 'form-control',
									                'id'	=> 'alamat',
									                'rows'	=> 4
									                )) }}
			                </div><!-- /.form group -->
						</div>
					</div>
				</div>  
			</div><!-- /.BOX -->
		</div>
	</div>		
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->

{{ Form::close() }}