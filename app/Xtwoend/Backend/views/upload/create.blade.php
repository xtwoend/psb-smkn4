{{ Form::open(array('route' => 'admin.registrasi.upload', 'files' => true )) }}
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <h1>
	    	{{ Theme::get('title') }}
	        <small>{{ Theme::get('subtitle') }}</small>
	    </h1>
		
		<div class="pull-right">
			<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Back </a>
			<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Upload </button>
		</div>
		<div class="clearfix"></div>              
		
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
	      	<div class="col-lg-12 col-xs-12">
            	<div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    	{{ Form::file('excel') }}
                        <p class="help-block">Example block-level help text here.</p>
				</div>
			</div><!-- ./col -->
		</div>
		
	</section><!-- /.content -->
</aside>
{{ Form::close() }}