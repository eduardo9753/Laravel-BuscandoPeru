@extends('layout.app')


@section('navegador')
    @include('template.nav-usuario')
@endsection


@section('header')
    <header class="" id="header-home"></header>
@endsection


@section('main')
    <section class="centrar-div" id="home-usuario">
        <div class="contenedor">
            <div class="row pt-5">
                <div class="col-md-6">
                    <h1 class="text-center">bienvenido: {{ Auth::user()->name }}</h1>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="correo" value="{{ Auth::user()->email }}">
                        <label for="correo">Correo electrónico</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword">
                        <label for="floatingPassword">Nueva Contraseña</label>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('img/usuario/usuario.png') }}" alt="" class="img-home-usuario">
                </div>
            </div>
        </div>
    </section>
@endsection
