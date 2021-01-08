@extends('resto2web-admin::layout.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.settings.index') }}">Paramètres</a>
    </li>
    <li class="breadcrumb-item active">
        Paramètres de base
    </li>
@endsection

@section('content')
    @include('resto2web-admin::pages.settings.partials.topMenu')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.general') }}" method="post" class="form-validate">
                @method("PATCH")
                @csrf
                @include('resto2web-admin::layout.alerts')
                <div class="form-group">
                    {!! Form::label('email','Email du restaurant') !!}
                    {!! Form::text('email',$settings->email, ['class'=> 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phoneNumber','Numéro de téléphone du restaurant') !!}
                    {!! Form::text('phoneNumber',$settings->phoneNumber, ['class'=> 'form-control']) !!}
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Enregister les modifications</button>
                </div>
            </form>
        </div>
    </div>

@endsection
