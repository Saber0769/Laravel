<!doctype html>
<html lang="fr">
    <head>
        <!-- A compléter avec références css - Done with Larevel2 P12 --*/ -->
        <!-- Scripts -->
        <link href = "{{asset('assets/css/bootstrap.css')}}" rel = "stylesheet">
        <link href = "{{asset('assets/css/mangas.css')}}" rel = "stylesheet">
        <link href = "{{asset('assets/css/bootstrap-theme.css')}}" rel = "stylesheet">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">Mangas World</a>
                    </div>                   
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav">                           
                            <li><a href="{{ url('/listerMangas') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
                            <li><a href="{{ url('/listerGenres') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Mangas par genre</a></li>
                            <li><a href="{{ url('/ajouterManga') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter</a></li>   
                        </ul>  
                        <ul class="nav navbar-nav navbar-right"> 
                            
                        </ul>                         
                    </div>
                </div><!--/.container-fluid -->
            </nav>
        </div> 
        <div class="container">
           <!-- /* A compléter  -- done with Larevel2 P12 -- */  -->
            @yield('content')
        </div>
        <!-- /* A compléter avec références javascript */ done with Larevel:2 P12 -->    
        <script src = "{{ asset('assets/js/jquery-2.1.3.min.js') }}" defer></script>
        <script src = "{{ asset('assets/js/bootstrap.js') }}" defer></script>

    </body>
</html>
