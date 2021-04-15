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
        <div id="app">
            <navbar></navbar>
        </div>
        
        <footer class="site-footer">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h6>À propos</h6>
                  <p class="text-justify">Orcusa.fr Cette <i>association</i> a pour but d'aider les personnes en situation de handicap afin d'améliorer ou permettre de pouvoir accéder à l'univers du jeu vidéo via des logiciels ou matériels adaptés.</p>
                </div>
      
                <div class="col-xs-6 col-md-3">
                  <h6>INFOS</h6>
                  <ul class="footer-links">
                    <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                    <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                    <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                    <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                    <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                    <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
                  </ul>
                </div>
      
                <div class="col-xs-6 col-md-3">
                  <h6>Quick Links</h6>
                  <ul class="footer-links">
                    <li><a href="/association">L'association</a></li>
                    <li><a href="/association">Évènements</a></li>
                    <li><a href="/engagement">Vous engager & donation</a></li>
                    <li><a href="/stream">Stream</a></li>
                    <li><a href="/forum">Forum</a></li>
                    <li><a href="/contact">Contactez-nous</a></li>
                  </ul>
                </div>
              </div>
              <hr>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
                    <a target="_blank"href="https://www.orcusa.fr/">Orcusa</a>.
                    </p>
                </div>
      
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <ul class="social-icons">
                    <li><a target="_blank" href="https://www.facebook.com/Orcusaasso/"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/orcusa_off"><i class="fab fa-instagram"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/Orcusa2"><i class="fab fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://discord.gg/E6Ht7Yxn"><i class="fab fa-discord"></i></a></li>
                    <li><a target="_blank" href="https://www.twitch.tv/orcusa2"><i class="fab fa-twitch"></i></a></li>   
                  </ul>
                </div>
              </div>
            </div>
      </footer>
    </body>
    <script src="{{mix('/js/app.js')}}"></script>
    
    <script>
        const toggles = document.querySelectorAll('.faq-toggle');

        toggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                toggle.parentNode.classList.toggle('active');
            });
        });
    </script>
</html>
