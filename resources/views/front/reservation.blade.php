<!DOCTYPE html>
<html>

<head lang="FR">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valencienne</title>
    <script src="https://kit.fontawesome.com/2b1a7acadb.js" crossorigin="anonymous"></script>
    crossorigin="anonymous"></script>

    <!--Style-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
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
            <h1 class="txt">Ma commande</h1>
            <h3>Commandez vos plats , livraison gratuite, notre délicieuse et fine cuisine italienne.</h3>
            <button class="button" type="button">Commander</button>
        </div>
    </header>

    @push('styles')
        <link href="{{ asset('assets/css/css-custom.css') }}" rel="stylesheet">
    @endpush

    <section class="Menu-du-jour">


        <!-- Votre HTML -->
        <div class="container">
            <form action="{{ route('commande.store') }}" method="post" class="dash-profile-form">
                {{ csrf_field() }}
                <div class="g-start-2" style="grid-row: 2">
                    <div class="card" style="width=500px !important ;margin:100px;">

                        <div class="card-body">
                            <!-- Personnes -->
                            <div class="mb-3">
                                <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="">
                                @if ($errors->has('prenom'))
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="">
                                @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label>Liste des plats</label>
                                <select name="plat_id" class="form-control">
                                    <option value="">Sélectionnez un plat</option>
                                    @foreach ($plats as $plat)
                                        <option value="{{ $plat->id }}">{{ $plat->nom }} - {{ $plat->prix }}
                                            DH</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Quantite</label>
                                <input name="quantite" class="form-control" value="1" type="number"
                                    step="1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Commentaire</label>
                                <textarea class="form-control" name="commentaire" id="commentaire" rows="3"></textarea>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">commander</button>
                            </div>
                        </div>


                    </div>
                </div>
            </form>
        </div>


    </section>
    <!-- Dans votre fichier Blade -->
    @stack('styles')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/front/js/index.js') }}"></script>
    @if (session('success'))
        <script>
            swal("Succès", "{{ session('success') }}", "success");
        </script>
    @endif
</body>

</html>
<!-- width
min-width
max-width-->
