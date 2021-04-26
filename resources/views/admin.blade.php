<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Orcusa | Admin</title>

        
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
