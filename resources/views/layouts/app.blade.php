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
                    <img class="img-fluid" src="https://scontent-mrs2-1.xx.fbcdn.net/v/t1.0-9/80235236_112744907159910_6831236475503328448_n.jpg?_nc_cat=111&_nc_sid=85a577&_nc_eui2=AeFTmygzSK7ANnYwpUrN8Q5OPCTlAZlaEOM8JOUBmVoQ4_khWexOEsxANPzDZtSFSxchB-M0vodQTsABN-Hu-DTY&_nc_ohc=_zNtgNWRkc0AX85lTep&_nc_ht=scontent-mrs2-1.xx&oh=5b8e41813a92e60bd93244842d54fbdb&oe=5F4A7A16" alt="">
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