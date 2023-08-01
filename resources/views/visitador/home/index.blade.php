@extends('layout.app')


@section('navegador')
    @include('template.nav')
@endsection


@section('header')
    <header class="" id="header-home"></header>
@endsection


@section('main')
    <section class="" id="home-visitador">
        <div class="contenedor">

            <div class="form-buscador">
                <form class="">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group mb-1">
                                <input type="text" class="form-control" name="nombres" id="nombres"
                                    placeholder="nombres">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-1">
                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                    placeholder="apellidos">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-success w-100" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($people as $person)
                <div class="home-visitador-flex"
                    title="Si tiene alguna referencia llame al número de whasap que pude visualizar en la publicacion o click en el mapa para dejar sus coordenadas donde usted se encuentra actualmente">
                    <div class="home-visitador-imagen">
                        <img src="{{ asset('personas') . '/' . $person->imagen }}" alt="">
                    </div>
                    <div class="home-visitador-descripcion">
                        <div class="persona">
                            <h1>{{ $person->nombres }} {{ $person->apellidos }}</h1>
                            <div class="flex-persona">
                                <p>{{ $person->edad }} año(s)</p>
                                <p>Suceso: {{ $person->fecha_suceso }}</p>
                            </div>
                        </div>

                        <div class="caracteristica">
                            <button>{{ $person->tez }}</button>
                            <button>{{ $person->cabello }}</button>
                            <button>{{ $person->ojos }}</button>
                            <button>{{ $person->nariz }}</button>
                            <button>{{ $person->boca }}</button>
                            <button>{{ $person->contextura }}</button>
                        </div>

                        <div class="particularidad">
                            <p>Vestimenta: {{ $person->vestimenta }}</p>
                            <p>Vista ultima vez: {{ $person->ultima_vista }}</p>
                        </div>

                        <div class="botones">
                            <div>
                                <a href="https://wa.me/{{ $person->codigo }}{{ $person->celular }}?text=Quisiera" target="_blank" class="whatsapp"><i class='bx bxl-whatsapp bx-burst'></i></a>
                                <a href="{{ route('visitador.show', ['id' => $person->id]) }}" class="mapa"><i
                                        class='bx bx-map bx-burst'></i></a>
                            </div>
                            <div>
                                <a href="{{ route('visitador.show', ['id' => $person->id]) }}">Saber más</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
