@extends('layout.app')


@section('navegador')
    @include('template.nav-usuario')
@endsection


@section('header')
    <header class="" id="header-home"></header>
@endsection


@section('main')
    <section class="" id="persona">
        <div class="contenedor">

            <div class="row pt-5">
                <div class="card mb-3">
                    <div class="card-header fondo-header fondo-header">
                        <h1 class="lead text-center text-white">Mis Publicaciones</h1>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">codigo</th>
                                    <th scope="col">nombres</th>
                                    <th scope="col">apellidos</th>
                                    <th scope="col">fecha del suceso</th>
                                    <th scope="col" class="text-center">Ver Detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($people as $person)
                                    <tr>
                                        <th scope="row">{{ $person->id }}</th>
                                        <td>{{ $person->nombres }}</td>
                                        <td>{{ $person->apellidos }}</td>
                                        <td>{{ $person->fecha_suceso }}</td>
                                        <td class="text-center">
                                            <a class="boton" href="{{ route('usuario.post.show', ['id'=> $person->id]) }}">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
