<html>

    <head>

      
            <link rel="stylesheet" href="bootstrap.min.css" />
            <link rel="stylesheet" href="Navigation-with-Search.css" />
            <link rel="stylesheet" href="styles.css" />
      


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <title>App Name - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      
    
        <style>
body{
    background-color:darkslategray;
    color: azure;
}
            .content {
                text-align: center;
            }
    
            .logo {
                padding: 20px;
                margin-right: 40px;
                margin-bottom: 20px;
            }
    
            .links a {
                font-size: 1.25rem;
                text-decoration: none;
                color: white;
                margin: 10px;
            }
    

        </style>
    </head>
    <body>








        <div class="container">
            <div class="content">
                <div class="logo p-4">
                    <img class="img-fluid" src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1596241953/logo_jhat0g.png" width="100" height="100" alt="">
                </div>
        
                <div class="links p-4" >
                    <div class="row align-content-center">
                    <div class="sm-4 "><img class="img-fluid" src="{{asset('images/add_p.png')}}" width="50" height="50" alt="aaaa">
                    <a href="/AP">Ajouter un produit</a></div>
                    <div class="sm-4">
                    <img class="img-fluid" src="{{asset('images/commandes.png')}}" width="50" height="50" alt="aaaa">

                    <a href="/commandes">Les commandes </a></div><div class="sm-4">
                    <img class="img-fluid" src="{{asset('images/products.png')}}" width="40" height="40" alt="aaaa">

                    <a href="show_p">Liste des produits</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>