<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Orcusa | Admin</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/admin.css">

        <script>

            (function(){
                window.Laravel = {
                    csrfToken: '{{ csrf_token() }}'
                };
            })();
        </script>
        
    </head>
    <body>
        <div id="admin">
            <mainapp></mainapp>
        </div>
    </body>
    <script src="{{mix('/js/app.js')}}"></script>
</html>
