<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
            $theme->setTitle('');

            // Breadcrumb template.
            $theme->breadcrumb()->setTemplate('
                <ol class="breadcrumb">
                 @foreach ($crumbs as $i => $crumb)
                     @if ($i != (count($crumbs) - 1))
                     <li><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a></li>
                     @else
                     <li class="active">{{ $crumb["label"] }}</li>
                     @endif
                 @endforeach
                </ol>
            ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            // You may use this event to set up your assets.
            $theme->asset()->add('jquery', 'vendor/jquery/jquery-2.1.1.min.js');
            
            $theme->asset()->usePath()->add('jquery-ui', 'js/jquery-ui-1.10.3.min.js', array('jquery'));
            $theme->asset()->usePath()->add('bootstrap', 'js/bootstrap.min.js');

            /*
            $theme->asset()->usePath()->add('morris', 'js/plugins/morris/morris.min.js');
            $theme->asset()->usePath()->add('sparkline', 'js/plugins/sparkline/jquery.sparkline.min.js');
            $theme->asset()->usePath()->add('jvectormap', 'js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
            $theme->asset()->usePath()->add('jvectormap-world', 'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
            $theme->asset()->usePath()->add('fullcalendar', 'js/plugins/fullcalendar/fullcalendar.min.js');
            $theme->asset()->usePath()->add('jqueryKnob', 'js/plugins/jqueryKnob/jquery.knob.js');
            $theme->asset()->usePath()->add('daterangepicker', 'js/plugins/daterangepicker/daterangepicker.js');
            $theme->asset()->usePath()->add('iCheck', 'js/plugins/iCheck/icheck.min.js');
            $theme->asset()->usePath()->add('wysihtml5', 'js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
            $theme->asset()->usePath()->add('jqueryKnob', 'js/plugins/jqueryKnob/jquery.knob.js');
            */
            $theme->asset()->usePath()->add('app', 'js/admin/app.js');
            
            //$theme->asset()->usePath()->add('dashboard', 'js/admin/dashboard.js');
            //$theme->asset()->usePath()->add('demo', 'js/admin/demo.js');

            // Partial composer.
            $theme->partialComposer('header', function($view)
            {
                $view->with('auth', \Sentry::getUser());
            });

            $theme->partialComposer('sidebar', function($view)
            {
                $view->with('auth', \Sentry::getUser());
            });
            

            // theme asset js for login layouts
            $theme->asset()->container('login')->add('jquery', 'vendor/jquery/jquery-2.1.1.min.js');
            $theme->asset()->container('login')->usePath()->add('bootstrap', 'js/bootstrap.min.js');
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(

            'default' => function($theme)
            {
                $theme->asset()->usePath()->add('bootstrap', 'css/bootstrap.min.css');
                $theme->asset()->usePath()->add('font-awesome', 'css/font-awesome.min.css');
                $theme->asset()->usePath()->add('ionicons', 'css/ionicons.min.css');
                /*
                $theme->asset()->usePath()->add('morris', 'css/morris/morris.css');
                $theme->asset()->usePath()->add('jvectormap', 'css/jvectormap/jquery-jvectormap-1.2.2.css');
                $theme->asset()->usePath()->add('fullcalendar', 'css/fullcalendar/fullcalendar.css');
                $theme->asset()->usePath()->add('daterangepicker', 'css/daterangepicker/daterangepicker-bs3.css');
                $theme->asset()->usePath()->add('wysihtml5', 'css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
                */
                $theme->asset()->usePath()->add('AdminLTE', 'css/AdminLTE.css');
            },

            'login' => function($theme)
            {
                $theme->asset()->usePath()->add('bootstrap', 'css/bootstrap.min.css');
                $theme->asset()->usePath()->add('font-awesome', 'css/font-awesome.min.css');
                $theme->asset()->usePath()->add('AdminLTE', 'css/AdminLTE.css');
            }
        )

    )

);