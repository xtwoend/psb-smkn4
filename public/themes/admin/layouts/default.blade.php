<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::get('title') }}</title>
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        {{ Theme::asset()->styles() }}
        {{ Theme::asset()->scripts() }}
    </head>
    <body class="skin-blue">
        
        {{ Theme::partial('header') }}
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                
                {{ Theme::partial('sidebar') }}
            
            </aside>           
            <!-- Content -->
                {{ Theme::content() }}
            <!-- ./Content -->  

        </div><!-- ./wrapper -->


        {{ Theme::partial('footer') }}

        {{ Theme::asset()->container('footer')->scripts() }}
    </body>
</html>