{{ Form::open(['url' => route('admin.product.store'), 'method' => 'POST', 'files' => true]) }}
    {{ Form::file('files[]', array('multiple'=>true)) }}
    {{ Form::submit('save') }} 
{{ Form::close() }}