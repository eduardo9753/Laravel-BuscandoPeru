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
                <div class="col-md-6">
                    <div class="card mb-3">
                        @include('usuario.persona.edit-person-modal')
                        <div class="card-header fondo-header">
                            <h1 class="lead text-center text-white">Datos de la persona <button type="button" class=""
                                    data-bs-toggle="modal" data-bs-target="#edit-person-modal" data-bs-whatever=""><i
                                        class='bx bx-edit bx-tada'></i></button></h1>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nombres" id="nombres"
                                    value="{{ $data->nombres }}" placeholder="nombres">
                                <label for="nombres">Nombres</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                    value="{{ $data->apellidos }}" placeholder="apellidos">
                                <label for="apellidos">Apellidos</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" step="any" id="celular"
                                            name="celular" value="{{ $data->celular }}">
                                        <label for="celular">Celular de Contacto</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="edad" name="edad"
                                            value="{{ $data->edad }}" placeholder="edad">
                                        <label for="edad">Edad</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="pais" name="pais"
                                            value="{{ $data->pais }}" placeholder="pais">
                                        <label for="pais">Pais</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="fecha_suceso" name="fecha_suceso"
                                            value="{{ $data->fecha_suceso }}" placeholder="fecha_suceso">
                                        <label for="fecha_suceso">Fecha Suceso</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Lugar del Suceso" name="lugar_suceso" id="lugar_suceso"
                                    style="height: 100px">{{ $data->lugar_suceso }}</textarea>
                                <label for="lugar_suceso">Lugar del Succeso</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Adicionales" name="adicional" id="adicional" style="height: 100px">{{ $data->adicional }}</textarea>
                                <label for="adicional">Adicionales</label>
                            </div>

                            <div class="form-floating mb-3 caja-img-persona">
                                <img class="img-persona" src="{{ asset('personas') . '/' . $data->imagen }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header fondo-header">
                            @include('usuario.caracteristica.edit-characteristic')
                            <h2 class="lead text-center text-white">Caracteristicas de la persona<button type="button"
                                    class="" data-bs-toggle="modal" data-bs-target="#edit-characteristic-modal"
                                    data-bs-whatever=""><i class='bx bx-edit bx-tada'></i></button></h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="tez" name="tez"
                                            value="{{ $data->tez }}" placeholder="tez">
                                        <label for="tez">Tez / Color</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="cabello" name="cabello"
                                            value="{{ $data->cabello }}" placeholder="cabello">
                                        <label for="cabello">Cabello</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="ojos" name="ojos"
                                            value="{{ $data->ojos }}" placeholder="ojos">
                                        <label for="ojos">Color de Ojos</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nariz" name="nariz"
                                            value="{{ $data->nariz }}" placeholder="nariz">
                                        <label for="nariz">Nariz</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="boca" name="boca"
                                            value="{{ $data->boca }}" placeholder="boca">
                                        <label for="boca">Boca</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="contextura" name="contextura"
                                            value="{{ $data->contextura }}" placeholder="contextura">
                                        <label for="contextura">Contextura</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="estatura" name="estatura"
                                            value="{{ $data->estatura }}" placeholder="estatura" step="any">
                                        <label for="estatura">Estatura (1.70)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header fondo-header">
                            @include('usuario.particularidad.edit-particularity')
                            <h3 class="lead text-center text-white">Particularidades de la persona<button type="button"
                                    class="" data-bs-toggle="modal" data-bs-target="#edit-particualarity-modal"
                                    data-bs-whatever=""><i class='bx bx-edit bx-tada'></i></button></h3>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="vestimenta" name="vestimenta"
                                    value="{{ $data->vestimenta }}" placeholder="vestimenta">
                                <label for="vestimenta">Vestimenta</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Ultima ves Vista" id="ultima_vista" name="ultima_vista"
                                    style="height: 100px">{{ $data->ultima_vista }}</textarea>
                                <label for="ultima_vista">Ultima ves Vista</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Observaciones" id="observaciones" name="observaciones"
                                    style="height: 100px">{{ $data->observaciones }}</textarea>
                                <label for="observaciones">Observaciones</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
