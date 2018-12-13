    <!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{csrf_token()}}">
            <title>Laravel artical app with rest api(SPA)</title>

            <!-- Fonts -->
            <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
            <!-- Styles -->
            <style>
                html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 100;
                    height: 100vh;
                    margin: 0;
                }
            </style>
        </head>
        <body>
            <div id="app">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <router-link class="nav-link" to='/example'>Example</router-link>
                    <!-- <router-link class="nav-link" to="/example">Example</router-link> -->
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link" to="/sample">Sample</router-link>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./ws">Link</a>
                  </li>    
                </ul>
              </div>  
            </nav>
            <!-- <example-component></example-component> -->
            <router-view></router-view>
            </div>
            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        </body>
    </html>
