<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Orcusa</title>
        <!-- ICON -->
        <link rel="icon" href="/images/favicon.png" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Ubuntu:wght@500&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">

        
        <script>

            (function(){
                window.Laravel = {
                    csrfToken: '{{ csrf_token() }}'
                };
            })();

        </script>
    </head>
    <body>
        <div class="loading">
            <div class="circle">
                <div class="cut">
                  <div class="circle-2"></div>
                </div>
            </div>
        </div>
        

        <div id="app">
            <navbar></navbar>
        </div>
        <footer id="footer">
            <foot></foot>
        </footer>

    </body>
    <script src="https://player.twitch.tv/js/embed/v1.js"></script>
    <script src="{{mix('/js/app.js')}}"></script>
    <script>
        
        $(window).on('load', function(){
            $('.loading').fadeOut('slow');
        });

    </script>
</html>
