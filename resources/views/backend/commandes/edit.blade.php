@extends('layouts.admin.default')

@section('head')
    <title>Valencienne | Modifier une commande</title>
@endsection

@section('content')
    <div>
        <form action="{{ route('commande.update', $commande->id) }}" method="post" class="dash-profile-form">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-headphone"></i> Commande</h4>
                </div>

                <div class="tr-single-body">

                    <div class="tr-single-body">
                        <div class="form-group">
                            <label>Liste des clients</label>
                            <select name="user_id" class="form-control">
                                <option value="">Sélectionnez un client</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $commande->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
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
                                    <option value="{{ $plat->id }}"
                                        {{ $commande->plat_id == $plat->id ? 'selected' : '' }}>
                                        {{ $plat->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Quantité</label>
                        <input name="quantite" class="form-control" type="number" step="1"
                            value="{{ $commande->quantite }}">
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary full-width mb-4">Enregistrer</button>

        </form>
    </div>
@stop
