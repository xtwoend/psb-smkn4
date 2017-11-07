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
			<div class="col-md-12">
				<table class="table table-striped">
					<tr>
						<th> NO </th>
						<th> KOMPETENSI KEAHLIAN </th>
						<th> JUMLAH PILIHAN 1 </th>
						<th> JUMLAH PILIHAN 2 </th>
					</tr>
					<?php 
						$no = 1;
						$pilihan_1 = 0;
						$pilihan_2 = 0;
					?>
					@foreach(Xtwoend\Models\Eloquent\Jurusan::all() as $jurusan) 
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $jurusan->jurusan }}</td>
						<td>{{ Xtwoend\Models\Eloquent\Registrasi::where('pilihan_1', $jurusan->id)->count() }}</td>
						<td>{{ Xtwoend\Models\Eloquent\Registrasi::where('pilihan_2', $jurusan->id)->count() }}</td>
					</tr>
					<?php
						$pilihan_1 += Xtwoend\Models\Eloquent\Registrasi::where('pilihan_1', $jurusan->id)->count();
						$pilihan_2 += Xtwoend\Models\Eloquent\Registrasi::where('pilihan_2', $jurusan->id)->count();
					?>
					@endforeach
					<tr>
						<td colspan="2"> TOTAL </td>
						<td>{{ $pilihan_1 }}</td>
						<td>{{ $pilihan_2 }}</td>
					</tr>
				</table>
			</div>
		</div>
	</section><!-- /.content -->
</aside>