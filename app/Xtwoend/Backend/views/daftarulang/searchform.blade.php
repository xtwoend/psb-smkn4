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
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
		        <div class="box-body">
					<div class="row">
				    	<div class="col-md-12">
				    		{{ Form::open(array('route' => 'admin.daftarulang.search')) }}
							<div class="form-group">
			                    <label>Nomor Pendaftaran</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('nomor_pendaftaran', null, array(
									                'class' => 'form-control',
									                'id'	=> 'nomor_pendaftaran',
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
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->