{{ Form::open(array('route' => 'admin.nilaitest.import.proses', 'files' => true )) }}

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
            <div class="col-lg-12 col-xs-12">
                <div class="form-group">
                    <label for="exampleInputFile">File Nilai from Excel</label>
                        {{ Form::file('nilai') }}
                        <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                    <button type="submit">Import</button>
                </div>
            </div><!-- ./col -->
        </div>  
    </section><!-- /.content -->
                
</aside><!-- /.right-side -->
{{ Form::close() }}