 <!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <h1>
	    	{{ Theme::get('title') }}
	        <small>{{ Theme::get('subtitle') }}</small>
	    </h1>
		
		<!-- Button -->                
		
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
	      	<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
				<div class="small-box bg-yellow">
                	<div class="inner">
						<h3>{{ $totalPendaftar }}</h3>
						<p>
							Total Registrations
						</p>
					</div>
					<div class="icon">
                    	<i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('admin.registrasi.index') }}" class="small-box-footer">
                    	see list <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
		</div>
		<div class="row">
			<div class="col-lg-6 col-xs-6">
				<!-- DONUT CHART -->
	            <div class="box box-danger">
	                <div class="box-header">
	                	<h3 class="box-title">Sebaran Pendaftar</h3>
					</div>
	            	<div class="box-body chart-responsive">
	            		<div class="chart" id="domisili-chart" style="height: 300px; position: relative;"></div>
					</div><!-- /.box-body -->
	            </div><!-- /.box -->
	        </div>
		</div>
	</section><!-- /.content -->
</aside>