@extends('layouts.admin.default')

@section('head')
    <title>Valencienne | edit</title>
@endsection

@section('content')
    <div>
        <form action="{{ route('user.update', $user) }}" method="post" role="form" class="dash-profile-form">
            @csrf
            {{ method_field('PATCH') }}

            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-headphone"></i> Utilisateur</h4>
                </div>

                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input name="name" class="form-control" type="text" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Prénom</label>
                        <input name="lastname" class="form-control" type="text" value="{{ $user->lastname }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" class="form-control" type="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label>Mobile No.</label>
                        <input name="telephone" class="form-control" type="text" value="{{ $user->telephone }}">
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="tr-single-box">
                <div class="tr-single-body">
                    <div class="form-group">
                        <label>Nouveau Password</label>
                        <input name="password" class="form-control" type="password">
                    </div>
                    <div class="form-group">
                        <label>Confirmer Password</label>
                        <input name="password_confirmation" class="form-control" type="password">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary full-width mb-4">Enregistrer</button>

        </form>
    </div>
@stop
