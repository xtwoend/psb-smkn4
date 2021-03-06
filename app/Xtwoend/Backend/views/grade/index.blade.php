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
				
                <div class="box-body table-responsive">			
					{{ Datatable::table()
					    ->addColumn('#ID', 'Nomor Daftar' ,'Nomor Ujian', 'Nama', 'Tanggal Lahir', 'Nilai UN', 'Nilai Test', 'Nilai Total', 'Pilihan 1', 'Pilihan 2', 'Keterangan')       // these are the column headings to be shown
					    ->setUrl(route('admin.prosesgrade.datatable'))   // this is the route where data will be retrieved
					    //->setOrder(array(5=>'asc', 6=>'desc', 4=>'desc')) // sort by last name then first name
					    ->render() }}
				</div>
			</div>
		</div>
	</div>		
	</section><!-- /.content -->
                
</aside><!-- /.right-side -->
