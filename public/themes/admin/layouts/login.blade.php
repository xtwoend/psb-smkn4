<!DOCTYPE html>
<html class="bg-black">
    <head>
        <title>{{ Theme::get('title') }}</title>
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        {{ Theme::asset()->styles() }}
        
    </head>
    <body class="bg-black">
        
        {{ Theme::content() }}
        
        {{ Theme::asset()->container('login')->scripts() }}
    </body>
</html>