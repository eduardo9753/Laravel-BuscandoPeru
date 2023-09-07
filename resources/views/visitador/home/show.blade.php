@extends('layout.app')


@section('navegador')
    @include('template.nav')
@endsection


@section('header')
    <header class="" id="header-home"></header>
@endsection


@section('main')
    <section class="" id="home-visitador-ver">
        <div class="contenedor">
            <div class="cuerpo">
                <h1>{{ $person->nombres }}</h1>

                <div class="caja-imagen">
                    <img src="{{ asset('personas') . '/' . $person->imagen }}" alt="">
                </div>

                <div class="persona">
                    <h1>{{ $person->nombres }} {{ $person->apellidos }}</h1>
                    <p>{{ $person->edad }} año(s)</p>
                    <p>Fecha del suceso: {{ $person->fecha_suceso }}</p>
                    <p>Lugar del suceso: {{ $person->lugar_suceso }}</p>
                    <p>Adicionales: {{ $person->adicionales }}</p>
                    <p>Pais: {{ $person->pais }}</p>
                </div>

                <div class="caracteristica">
                    <button><img src="{{ asset('img/caracteristicas/tez.png') }}"
                            alt="">{{ $person->tez }}</button>
                    <button><img src="{{ asset('img/caracteristicas/cabello.png') }}"
                            alt="">{{ $person->cabello }}</button>
                    <button><img src="{{ asset('img/caracteristicas/ojos.png') }}"
                            alt="">{{ $person->ojos }}</button>
                    <button><img src="{{ asset('img/caracteristicas/nariz.png') }}"
                            alt="">{{ $person->nariz }}</button>
                    <button><img src="{{ asset('img/caracteristicas/boca.png') }}"
                            alt="">{{ $person->boca }}</button>
                    <button><img src="{{ asset('img/caracteristicas/contextura.png') }}"
                            alt="">{{ $person->contextura }}</button>
                </div>

                <div class="particularidad">
                    <p>Vestimenta: {{ $person->vestimenta }}</p>
                    <p>Vista ultima vez: {{ $person->ultima_vista }}</p>
                    <p>Observaciones: {{ $person->observaciones }}</p>
                </div>

                <div class="text-center my-3">
                    {!! QrCode::size(150)->color(255, 85, 0)->generate($person->id) !!}
                </div>

                <div title="para mandar las coordenadas de algun lugar , favor de dar click a cualquier punto del mapa">
                    <h2 class="titulo-mapa">mapa de seguimiento</h2>
                    <form action="{{ route('visitador.coordenada.save') }}" method="POST" class="mb-3"
                        id="form-coordenadas-mapa">
                        {{-- token de seguridad --}}
                        @csrf

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" value="{{ $person->id }}" name="person_id" id="person_id"
                                        hidden>
                                    <input class="form-control me-2 mb-2" type="text" id="latitud" name="latitud"
                                        placeholder="Latitud" readonly>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text latitud_error"></span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input class="form-control me-2" type="text" id="longitud" name="longitud"
                                        placeholder="Longitud" readonly>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text longitud_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-gropu">
                                    <button class="btn btn-outline-success w-100" type="submit">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="mapa"></div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/mapa.js') }}"></script>
@endsection
