<!DOCTYPE html>
<html>

<head lang="FR">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valencienne</title>
    <script src="https://kit.fontawesome.com/2b1a7acadb.js" crossorigin="anonymous"></script>
    <!--Style-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
    <link rel="website icon" type="png" href="{{ asset('assets/front/images/l1.png') }}">
    <!--Police d'écriture-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Qwigley&display=swap" rel="stylesheet">


</head>

<body>
    <header class="head-menu">
        <nav class="nav-bar">
            <a class="title" href="{{ asset('assets/front/css/Valencienne.html') }}">Valencienne</a>
            <ul class="nav-links">
                <li id="li-nav"><a href="{{ route('accueil') }}">Accueil</a></li>
                <li id="li-nav"><a href="{{ route('menu') }}">Menu</a></li>
                <li id="li-nav"><a href="{{ route('reservation') }}">Reservation</a></li>
                <li id="li-nav"><a href="#">Galerie</a></li>
            </ul>
            <a class="material-icons "id="menu">menu</a>

        </nav>
        <div class="Header-Texte">
            <h1 class="txt">Apprécier</h1>
            <h3>notre délicieuse et fine cuisine italienne.</h3>
            <button class="button" type="button">Commander</button>
        </div>
    </header>


    <section class="Menu-du-jour">
        <div class="menu-title">
            <h1>Menu du Jour</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum iure necessitatibus alias, consequatur
                numquam non expedita..</p>
        </div>
        <div class="item-menu">
            <div class="menu1">
                <div> <a class="img-menu1 ai"></a></div>
                <div class="menu-text">
                    <p>Lorem ipsum dolor sit amet.</p>
                    <div class="orloge"><span class="material-symbols-outlined orloge">schedule</span> <span> 10
                            mins</span></div>
                    <span class="container"><span class="fa fa-star checked"></span><span
                            class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span
                            class="fa fa-star checked"></span><span class="fa fa-star checked"></span></span> <span
                        class="menu-commender"> <a href="#" id="cmd"> Commander</a> </span></span>
                </div>
            </div>
            <div class="menu2">
                <div> <a class="img-menu2 ai"></a></div>
                <div class="menu-text">
                    <p>Lorem ipsum dolor sit amet.</p>
                    <div class="orloge"><span class="material-symbols-outlined orloge">schedule</span> <span> 10
                            mins</span></div>
                    <span class="container"><span class="fa fa-star checked"></span><span
                            class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span
                            class="fa fa-star checked"></span><span class="fa fa-star checked"></span></span> <span
                        class="menu-commender"> <a href="#" id="cmd"> Commander</a> </span></span>
                </div>
            </div>
            <div class="menu3">
                <div> <a class="img-menu3 ai"></a></div>
                <div class="menu-text">
                    <p>Lorem ipsum dolor sit amet.</p>
                    <div class="orloge"><span class="material-symbols-outlined orloge">schedule</span> <span> 10
                            mins</span></div>
                    <span class="container"><span class="fa fa-star checked"></span><span
                            class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span
                            class="fa fa-star checked"></span><span class="fa fa-star checked"></span></span> <span
                        class="menu-commender"> <a href="#" id="cmd"> Commander</a> </span></span>
                </div>
            </div>
    </section>

    <footer class="footer">
        <div class="foottiltle">
            <a class="tt" href="{{ asset('assets/front/css/Valencienne.html') }}">Valencienne</a>
        </div>
        <div class="footlink">

        </div>
        <div class="foot">
            <p>Touts droits réservés. © 2023 Valencienne</p>
        </div>
    </footer>
    <script src="{{ asset('assets/front/js/index.js') }}"></script>
</body>

</html>
<!-- width
min-width
max-width-->
