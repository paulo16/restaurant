<!DOCTYPE html>
<html>

<head lang="FR">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valencienne</title>
    <script src="https://kit.fontawesome.com/2b1a7acadb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

    <!--Style-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
    <link rel="website icon" type="png" href="{{ asset('assets/front/images/l1.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
            <h1 class="txt">Ma commande</h1>
            <h3>Commandez vos plats , livraison gratuite, notre délicieuse et fine cuisine italienne.</h3>
            <button class="button" type="button">Commander</button>
        </div>
    </header>


    <section class="Menu-du-jour">
        <div>
            <form>
                <div class="g-start-2" style="grid-row: 2">
                    <div class="card" style="width=500px !important ;margin:100px;">

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="plat" class="form-label">Nos plats</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Le couscous</option>
                                    <option value="2">Le Thé</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Taille du plat</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Les tailles</option>
                                    <option value="1">Petite</option>
                                    <option value="2">Moyenne</option>
                                    <option value="3">Grande</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="montant" class="col-sm-2 col-form-label">Montant (DH)</label>
                                <input type="number" class="form-control" id="montant" placeholder="100">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>


                            <div class="text-center">
                                <button type="button" class="btn btn-primary btn-lg">commander</button>
                            </div>
                        </div>


                    </div>
                </div>
            </form>

        </div>


    </section>

    <script src="{{ asset('assets/front/js/index.js') }}"></script>
</body>

</html>
<!-- width
min-width
max-width-->
