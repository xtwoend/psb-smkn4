<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <h1  class="pull-left">
	    	{{ Theme::get('title') }}
	    </h1>
		<div class="pull-right">
			<a href="{{URL::previous()}}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Back </a>
			<a href="{{ route('admin.api.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New Api </a>
		</div>
		<div class="clearfix"></div>
	</section>
	<!-- Main content -->
	<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
                <div class="box-body table-responsive">
					{{ Datatable::table()
					    ->addColumn('Name', 'ID' ,'Secret', 'Uri')       // these are the column headings to be shown
					    ->setUrl(route('admin.api.datatable'))   // this is the route where data will be retrieved
					    ->render() }}
				</div>
			</div>
		</div>
	</div>		
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->
