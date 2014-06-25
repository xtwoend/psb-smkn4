<!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{ $auth->first_name }} </p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="{{ route('dashboard') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Registrasi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="{{ route('admin.registrasi.create') }}"><i class="fa fa-angle-double-right"></i> Pendaftaran </a></li>
                               <li><a href="{{ route('admin.registrasi.index') }}"><i class="fa fa-angle-double-right"></i> Daftar Pendaftar </a></li>
                               <li><a href=""><i class="fa fa-angle-double-right"></i> Export to Excell </a></li>
                               <li><a href=""><i class="fa fa-angle-double-right"></i> Import from Excell </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Nilai</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('admin.nilaitest.create') }}"><i class="fa fa-angle-double-right"></i> Input Nilai Test</a></li>
                                <li><a href="{{ route('admin.nilaitest.index') }}"><i class="fa fa-angle-double-right"></i> Passing grade Sementara</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Setting</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Proses Penerimaan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('admin.prosesgrade.index') }}"><i class="fa fa-angle-double-right"></i> Passing grade Sementara </a></li>
                                <li><a href="{{ route('admin.prosesgrade.proses') }}"><i class="fa fa-angle-double-right"></i> Proses grade </a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Export to Excel </a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Export to PDF </a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Cetak Kartu Penerimaan </a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Setting </a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->