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
    <header class="head">
        <nav class="nav-bar">
            <a class="title" href="{{ asset('assets/front/css/Valencienne.html') }}">Valencienne</a>
            <ul class="nav-links">
                <li id="li-nav"><a href="{{ asset('assets/front/css/Valencienne.html') }}">Acceuil</a></li>
                <li id="li-nav"><a href="{{ route('menu') }}">Menu</a></li>
                <li id="li-nav"><a href="{{ route('reservation') }}">Reservation</a></li>
                <li id="li-nav"><a href="#">Galerie</a></li>
            </ul>
            <a class="material-icons "id="menu">menu</a>

        </nav>
        <div class="Header-Texte">
            <h1 class="txt">Nourriture de qualité, Ambiance chaleureuse</h1>
            <h3>Bienvenue chez Valencienne, le restaurant où les saveurs s'invitent à votre table ! Nous sommes ravis de
                vous accueillir dans notre établissement et de vous offrir une expérience culinaire unique en son genre.
                Nous espérons que vous apprécierez votre expérience chez Valencienne et que vous reviendrez nous voir
                bientôt !</h3>
        </div>
    </header>

    <section class="Our-story">
        <div class="Our-img">
            <div class="lot-img1">
                <a class="our-img1" href="#"></a>
                <a class="our-img2" href="#"></a>
            </div>
            <div class="lot-img2">
                <a class="our-img3" href="#"></a>
                <a class="our-img4" href="#"></a>
            </div>
        </div>
        <div class="Story-txt">
            <h1>Notre Histoire</h1>
            <p>Notre restaurant est un endroit chaleureux et accueillant où vous pourrez déguster de délicieux plats
                préparés avec soin. Nous utilisons des ingrédients frais et de qualité pour créer des saveurs uniques et
                authentiques. Notre menu propose une grande variété de plats pour tous les goûts, du traditionnel au
                contemporain. Nous avons également une sélection de vins de premier choix pour accompagner votre repas.
                Le service de notre personnel est attentif et professionnel, et ils seront ravis de vous aider à choisir
                le meilleur plat pour vous. Nous espérons vous voir bientôt dans notre restaurant pour une expérience
                culinaire inoubliable.</p>
            <a href="#">En savoir plus</a>
        </div>
    </section>


    <section class="Menu-du-jour" style="margin-bottom: 50px">
        <div class="menu-title">
            <h1>Menu du Jour</h1>
            <p>Bienvenue dans notre restaurant ! Nous sommes ravis de vous accueillir et nous espérons que vous passerez
                un agréable moment en notre compagnie. Nous espérons que vous apprécierez notre menu et que vous
                passerez un moment mémorable dans notre établissement...</p>
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


    <section class="taste">
        <div class="taste-txt">
            <h1>Découvrir le vrai sens du goût</h1>
            <p>Notre restaurant est l'endroit idéal pour découvrir le vrai sens du goût. Nous mettons un point d'honneur
                à utiliser des ingrédients frais et de qualité pour créer des plats savoureux et authentiques. Que vous
                soyez en quête d'une cuisine traditionnelle ou d'expériences culinaires plus innovantes, notre menu
                varié saura répondre à vos envies. Les talents de notre chef et son équipe se reflètent dans chaque
                plat, préparé avec soin et passion pour vous offrir une expérience culinaire inoubliable. Réservez votre
                table dès maintenant et venez découvrir le vrai sens du goût.</p>
            <button class="button" type="button">Commander</button>
        </div>
        <div class="taste-img" alt="">
            <img src="{{ asset('assets/front/img/Restaurant.jpg') }}">
        </div>
    </section>

    <section class="opignon">
        <h1 id="opignon-title">What people are saying about Us.</h1>
        <div class="p-opignon">
            <div class="opignon-img">
                <img src="{{ asset('assets/front/img/profil1.jpg') }}">
            </div>
            <div class="opignon-txt">
                <p>.. Exercitatione suscipit iure.</p>
            </div>
        </div>
    </section>

    <section class="our-chefs" style="margin-bottom: 50px">
        <div class="our-chef-head">
            <h1>Nos Chefs</h1>
            <p>Nous sommes fiers de vous présenter nos chefs cuisiniers . Passionnés par l'art culinaire, ils ont acquis
                une solide expérience dans certains des meilleurs restaurants de la région avant de rejoindre notre
                équipe. Leur expertise en matière de cuisine leur permet de créer des plats savoureux et inventifs qui
                vous surprendront à chaque bouchée.</p>
        </div>
        <div class="our-chef-body">
            <div class="chef1">
                <div class="chef1-img"></div>
                <div class="chef1-name">
                    <h3 class="firstname">Albert Bustier.</h3>
                    <p class="work">Station-chef</p>
                </div>
            </div>
            <div class="chef2">
                <div class="chef2-img"></div>
                <div class="chef2-name">
                    <h3 class="firstname">Xavier Robertson.</h3>
                    <p class="work">Chef-patissier</p>
                </div>
            </div>
            <div class="chef3">
                <div class="chef3-img"></div>
                <div class="chef3-name">
                    <h3 class="firstname">Maxime Lopez.</h3>
                    <p class="work">Head-chef</p>
                </div>
            </div>
        </div>
    </section>

    <section class="galerie">
        <h1 class="galérie-title">Galérie</h1>
        <div class="item-gallerie">
            <div class=" ig1"></div>
            <div class=" ig2"></div>
            <div class=" ig3"></div>
            <div class=" ig4"></div>
            <div class=" ig5"></div>
            <div class=" ig6"></div>
        </div>
        <div class="button-galérie">
            <button class="btn-glr" type="button" href="#">See More</button>
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
