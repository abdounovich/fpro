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




            .menubar-enabled.menubar-minimized .menubar {
    width: 120px;
}
.menubar-dark, .menubar-dark .menu-link {
    color: hsla(0,0%,100%,.5);
}
.menubar-dark {
    background-color: #2c333a;
}
.menubar {
    position: fixed;
    bottom: 0;
    left: 0;
    top: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    width: 240px;
    z-index: 1030;
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}
*, :after, :before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
div {
    display: block;
}
body {
    margin: 0;
    font-family: var(--bs-font-sans-serif);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #f0f2f4;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(11,13,15,0);
}
:root {
    --bs-blue: #3b73da;
    --bs-indigo: #6610f2;
    --bs-purple: #6f42c1;
    --bs-pink: #d63384;
    --bs-red: #dc3545;
    --bs-orange: #fd7e14;
    --bs-yellow: #faa700;
    --bs-green: #28a745;
    --bs-teal: #20c997;
    --bs-cyan: #17a2b8;
    --bs-white: #fff;
    --bs-gray: #6c757d;
    --bs-gray-dark: #343a40;
    --bs-primary: #3b73da;
    --bs-secondary: #6c757d;
    --bs-success: #28a745;
    --bs-info: #17a2b8;
    --bs-warning: #faa700;
    --bs-danger: #dc3545;
    --bs-light: #f8f9fa;
    --bs-dark: #343a40;
    --bs-font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    --bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
    --bs-gradient: linear-gradient(180deg,hsla(0,0%,100%,0.15),hsla(0,0%,100%,0));
}
:root {
    --animate-duration: 1s;
    --animate-delay: 1s;
    --animate-repeat: 1;
}
*, :after, :before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
*, :after, :before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
        </style>
    </head>
    <body>




        <div id="main-menu" class="menubar menubar-dark"><div class="menubar-header text-center bg-warning"><a href="/" class="menubar-brand router-link-active"><img src="https://i.morioh.com/RFG2le2.png" title="Morioh" class="menubar-logo"></a></div> <div class="menubar-body" data-scrollbar="true" tabindex="-1" style="overflow: hidden; outline: none;"><div class="scroll-content"><ul class="menu accordion"><li class="menu-item"><a href="/explore" class="menu-link"><i class="menu-icon far fa-compass"></i> <span class="menu-label">Explore</span></a></li> <li class="menu-item"><a href="/courses" class="menu-link"><i class="menu-icon far fa-user-graduate"></i> <span class="menu-label">Courses</span></a></li> <li class="menu-item"><a href="/videos" class="menu-link"><i class="menu-icon far fa-play"></i> <span class="menu-label">Videos</span></a></li> <li class="site-menu-item"><a href="/tool" target="_blank" class="menu-link"><i class="menu-icon far fa-tools"></i> <span class="site-menu-title">Tools</span></a></li> <li class="menu-item"><a href="/topics" class="menu-link"><i class="menu-icon far fa-layer-group"></i> <span class="menu-label">Topics</span></a></li> <li class="menu-item"><a href="http://on.morioh.net/96d5d36367" target="_blank" class="menu-link"><i class="menu-icon far fa-drafting-compass"></i> <span class="menu-label">Templates</span></a></li> <li class="menu-item"><a href="http://on.morioh.net/f294f33d0d" target="_blank" class="menu-link"><i class="menu-icon far fa-tshirt"></i> <span class="menu-label">T-shirts</span></a></li></ul></div><div class="scrollbar-track scrollbar-track-x" style="display: none;"><div class="scrollbar-thumb scrollbar-thumb-x" style="width: 120px; transform: translate3d(0px, 0px, 0px);"></div></div><div class="scrollbar-track scrollbar-track-y" style="display: none;"><div class="scrollbar-thumb scrollbar-thumb-y" style="height: 661px; transform: translate3d(0px, 0px, 0px);"></div></div></div> <div class="menubar-footer bg-dark p-10"><a href="https://morioh.com" class="d-block text-truncate">Morioh Beta</a></div></div>
        <div class="container">
            <div class="content">
                <div class="logo">
                    <img class="img-fluid" src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1596241953/logo_jhat0g.png" width="50" height="50" alt="">
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