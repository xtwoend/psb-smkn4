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
						{{-- 
						<div class="col-md-3">
							<div class="form-group">
			                    <label for="name">PILIHAN</label>
			                    {{ Form::select('pilihan', 
			                    		array(
			                    			'pilihan_1'=> 'PILIHAN 1', 
											'pilihan_2'=> 'PILIHAN 2', 
			                    			),
			                    		Input::old('pilihan'),
			                    		array('class'=>'form-control')) }}
			                </div><!-- /.form group -->
						</div>
						--}}
						<div class="col-md-3">
							<div class="form-group">
			                    <label for="name">PROGRAM KEAHLIAN</label>
			                    {{ Form::select('pilihan_1', 
			                    		\Xtwoend\Models\Eloquent\Jurusan::lists('jurusan','id') + ['0' => 'HANYA PILIHAN 2'],
			                    		Input::old('pilihan_1'),
			                    		array('class'=>'form-control')) }}
			                </div><!-- /.form group -->
						</div>
						{{-- <div class="col-md-3">
							<div class="form-group">
			                    <label for="name">PILIHAN 2</label>
			                    {{ Form::select('pilihan_2', 
			                    		\Xtwoend\Models\Eloquent\Jurusan::lists('jurusan','id') + ['0' => 'HANYA PILIHAN 1'],
			                    		Input::old('pilihan_2'),
			                    		array('class'=>'form-control')) }}
			                </div><!-- /.form group -->
						</div> --}}
						<div class="col-md-1">
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
			                    <button class="btn btn-primary form-control" name="button" value="proses_1"><i class="fa fa-check-circle"></i> 1</button>
			                </div><!-- /.form group -->
						</div>
						<div class="col-md-1">
							<div class="form-group">
			                    <label for="name">&nbsp;</label>
			                    <button class="btn btn-primary form-control" name="button" value="proses_2"><i class="fa fa-check-circle"></i> 2</button>
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
						@include('admin::grade.show')
					@endif
				</div>
			</div>
		</div>
	</div>		
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->
