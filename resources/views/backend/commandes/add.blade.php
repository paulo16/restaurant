@extends('layouts.admin.default')

@section('head')
    <title>Valencienne | Ajouter une commande</title>
@endsection

@section('content')
    <div>
        <form action="{{ route('commande.store') }}" method="post" class="dash-profile-form">

            {{ csrf_field() }}
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-headphone"></i> Commande</h4>
                </div>

                <div class="tr-single-body">

                    <div class="tr-single-body">
                        <div class="form-group">
                            <label>Liste des clients</label>
                            <select name="user_id" class="form-control">
                                <option value="">Sélectionnez un utilisateur</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="tr-single-body">
                        <div class="form-group">
                            <label>Liste des plats</label>
                            <select name="plat_id" class="form-control">
                                <option value="">Sélectionnez un plat</option>
                                @foreach ($plats as $plat)
                                    <option value="{{ $plat->id }}">{{ $plat->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Quantite</label>
                        <input name="prix" class="form-control" type="number" step="1">
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary full-width mb-4">Enregistrer</button>

        </form>
    </div>
@stop
