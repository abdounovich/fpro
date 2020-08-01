<html>

    <head>
        <title>App Name - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      
    
  
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="logo">
                    <img class="img-fluid" src="https://laravel.com/img/logomark.min.svg" alt="">
                </div>
        
                <div class="links">
                    <a href="/AP">Ajouter un produit</a>
                    <a href="/commandes">Les commandes </a>
                    <a href="show_p">Liste des produits</a>
                </div>
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>