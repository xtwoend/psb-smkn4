<form method="POST" action="{{ route('admin.api.store') }}">
		
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
			                    <label for="name">Nama App</label>
			                    {{ Form::text('name', null, array(
									                'class' => 'form-control',
									                'id'	=> 'name'
									                )) }}
			                </div><!-- /.form group -->
						</div>
					</div>
					<div class="row">
				    	<div class="col-md-12">
							<div class="form-group">
			                    <label>Client ID</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('id', Str::random(40), array(
									                'class' => 'form-control',
									                'id'	=> 'id',
									                )) }}
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>
					</div>
					<div class="row">
				    	<div class="col-md-12">
							<div class="form-group">
			                    <label>Secret Key</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	<i class="fa fa-credit-card"></i>
			                        </div>
			                        {{ Form::text('secret', Str::random(40), array(
									                'class' => 'form-control',
									                'id'	=> 'secret',
									                )) }}
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>
					</div>
					<div class="row">
				    	<div class="col-md-12">
							<div class="form-group">
			                    <label>URL App</label>
			                    <div class="input-group">
			                    	<div class="input-group-addon">
			                        	http://
			                        </div>
			                        {{ Form::text('redirect_uri', null, array(
									                'class' => 'form-control',
									                'id'	=> 'redirect_uri',
									                )) }}
			                    </div><!-- /.input group -->
			                </div><!-- /.form group -->
						</div>
					</div>
				</div>  
			</div><!-- /.BOX -->
		</div>
	</div>	
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->

</form>