@extends('layouts.admin.default')

@section('head')
    <title>Valencienne | Modifier une catégorie</title>
@endsection

@section('content')
    <div>
        <form action="{{ route('categorie.update', $category->id) }}" method="post" class="dash-profile-form">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="tr-single-box">
                <div class="tr-single-header mb-20">
                    <h4><i class="ti-headphone"></i> Catégorie</h4>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input name="nom" class="form-control" type="text" value="{{ $category->nom }}">
                    </div>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Description</label>
                        <input name="description" class="form-control" type="text" value="{{ $category->description }}">
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary full-width mb-4">Enregistrer</button>

        </form>
    </div>
@stop
