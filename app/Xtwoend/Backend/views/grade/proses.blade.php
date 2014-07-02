<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <h1  class="pull-left">
	    	{{ Theme::get('title') }}
	    </h1>
		<div class="pull-right">
			<button class="btn btn-primary" type="submit"><i class="fa fa-arrow-circle-o-up"></i> Import from Excell </button>
			<a class="btn btn-primary" href="{{ route('admin.registrasi.toexcel') }}"><i class="fa fa-arrow-circle-o-down"></i> Export to Excell </a>
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
			<div class="box">
				<div class="box-body">
					{{ Form::open() }}
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
			                    <label for="name">PILIHAN</label>
			                    {{ Form::select('pilihan', 
			                    		array(
			                    			'pilihan_1'=> 'PILIHAN 1', 
											'pilihan_2'=> 'PILIHAN 2', 
											'pilihan_3'=> 'PILIHAN 3', 
											'pilihan_4'=> 'PILIHAN 4', 
			                    			),
			                    		Input::old('pilihan'),
			                    		array('class'=>'form-control')) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-3">
							<div class="form-group">
			                    <label for="name">JURUSAN</label>
			                    {{ Form::select('jurusan', 
			                    		\Xtwoend\Models\Eloquent\Jurusan::lists('jurusan','id'),
			                    		Input::old('jurusan'),
			                    		array('class'=>'form-control')) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-2">
							<div class="form-group">
			                    <label for="name">LIMIT</label>
			                    {{ Form::text('limit', Input::old('limit'),
			                    		array('class'=>'form-control')) }}
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-2">
							<div class="form-group">
			                    <label for="name">&nbsp;</label>
			                    <button class="btn btn-primary form-control" name="button" value="show">SHOW</button>
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-1">
							<div class="form-group">
			                    <label for="name">&nbsp;</label>
			                    <button class="btn btn-primary form-control" name="button" value="proses"><i class="fa fa-check-circle"></i></button>
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-1">
							<div class="form-group">
			                    <label for="name">&nbsp;</label>
			                    <button class="btn btn-primary form-control" name="button" value="reset"><i class="fa fa-refresh"></i></button>
			                </div><!-- /.form group -->
						</div>
					</div>
					{{ Form::close() }}
					@if($show)
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
                                        <th>Total UN</th>
                                        <th>Domisili</th>
                                        <th>Pilihan 1</th>
                                        <th>Pilihan 2</th>
                                        <th>{{ studly_case(Input::old('pilihan')) }}</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
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
										<td>{{ $row->total_un }} </td>
										<td>{{ $row->domisili_to_string }} </td>
										<td>{{ $row->pilihan_1_string }} </td>
										<td>{{ $row->pilihan_2_string }} </td>
										<td>{{ $row->{Input::old('pilihan').'_string'} }} </td>
										<td>{{ $row->{'nilai_pil_'. substr(Input::old('pilihan'),-1) } }} </td>
										<td>{{ ($row->terima_1==1)? 'DITERIMA': 'TIDAK DITERIMA' }}</td>
									</tr>
									@endforeach
								</table>
							</div>
						</div>						
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>		
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->
