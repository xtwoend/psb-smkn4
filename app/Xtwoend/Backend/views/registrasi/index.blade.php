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
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				
                <div class="box-body table-responsive">
			
					{{ Datatable::table()
					    ->addColumn('id', 'Nomor Daftar' ,'Nomor Ujian', 'Nama', 'Tanggal Lahir', 'Total UN', 'Total Nilai', 'Pilihan 1','Pilihan 2','')       // these are the column headings to be shown
					    ->setUrl(route('admin.registrasi.datatable'))   // this is the route where data will be retrieved
					    ->render() }}
				</div>
			</div>
		</div>
	</div>		
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->
