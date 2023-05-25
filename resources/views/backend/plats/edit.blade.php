@extends('layouts.admin.default')

@section('head')
    <title>Valencienne | Modifier un plat</title>
@endsection

@section('content')
    <div>
        <form action="{{ route('plat.update', $plat->id) }}" method="post" class="dash-profile-form">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="tr-single-box">
                <div class="tr-single-header mb-20">
                    <h4><i class="ti-headphone"></i> Modifier le plat</h4>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input name="nom" class="form-control" type="text" value="{{ $plat->nom }}">
                    </div>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ $plat->description }}</textarea>
                    </div>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Prix</label>
                        <input name="prix" class="form-control" type="number" value="{{ $plat->prix }}">
                    </div>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="categorie_id" class="form-control">
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}"
                                    {{ $plat->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Restaurant</label>
                        <select name="restaurant_id" class="form-control">
                            <option value="">Sélectionnez un restaurant</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}"
                                    {{ $plat->restaurant_id == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary full-width mb-4">Enregistrer les modifications</button>

        </form>
    </div>
@endsection
