<html>

    <head>
        <title>App Name - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      
    
        <style>
            body {
                font-family: "Varela Round", sans-serif;
                margin: 0;
                padding: 0;
                background: radial-gradient(#57bfc7, #45a6b3);
            }
    
        
    
            .content {
                text-align: center;
            }
    
            .logo {
                margin-right: 40px;
                margin-bottom: 20px;
            }
    
            .links a {
                font-size: 1.25rem;
                text-decoration: none;
                color: white;
                margin: 10px;
            }
    
            @media all and (max-width: 500px) {
    
                .links {
                    display: flex;
                    flex-direction: column;
                }
            }
        </style>
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