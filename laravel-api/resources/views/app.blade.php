<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perros</title>
        <link rel="stylesheet" type="text/css" href="{{asset('dist/app.css')}}">
    </head>
    <body>
        <div class="container">
            <div id="app">
                <router-view :key="$route.fullPath"></router-view>
            </div>
        </div>
    </body>
        <script type="text/javascript" src="{{asset('dist/app.js')}}"></script>
</html>