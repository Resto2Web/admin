@extends('resto2web-admin::auth.layout.auth')
@section('content')
    <div class="container h-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>{{ __('Login') }}</h1>
                                <p class="text-muted">Connectez-vous à votre compte Resto2Web
                                    <a href="//resto2web.test/login/sso?sso=resto.test">Me connecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
