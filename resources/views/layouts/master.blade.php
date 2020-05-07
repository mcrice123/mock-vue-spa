<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <title>My App</title>
        
    </head>
    <body>

        <div id="app">

            @include('layouts.header')

            <router-view></router-view>
            
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
