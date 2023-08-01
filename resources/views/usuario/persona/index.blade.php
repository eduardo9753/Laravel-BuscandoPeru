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
            <form action="{{ route('usuario.save') }}" id="form-persona" method="POST"
                enctype="application/x-www-form-urlencoded">

                {{-- token de seguridad --}}
                @csrf

                <div class="row pt-5">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header fondo-header fondo-header">
                                <h1 class="lead text-center text-white">Datos de la persona</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nombres" id="nombres">
                                    <label for="nombres">Nombres</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text nombres_error"></span>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="apellidos" id="apellidos">
                                    <label for="apellidos">Apellidos</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text apellidos_error"></span>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="celular"
                                                name="celular">
                                            <label for="celular">Celular de Contacto</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text celular_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="edad" name="edad">
                                            <label for="edad">Edad</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text edad_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="country_id" id="country_id" class="form-select">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <label for="edad">Pais</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="fecha_suceso" name="fecha_suceso"
                                                value="{{ date('Y-m-d') }}">
                                            <label for="fecha_suceso">Fecha Suceso</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text fecha_suceso_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="lugar_suceso" id="lugar_suceso"
                                        style="height: 100px"></textarea>
                                    <label for="lugar_suceso">Lugar del Succeso</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text lugar_suceso_error"></span>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="adicional" id="adicional" style="height: 100px"></textarea>
                                    <label for="adicional">Adicionales</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text adicional_error"></span>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" id="imagen" name="imagen"
                                        accept=".jpg, .jpeg, .png">
                                    <label for="imagen">Foto de la Persona</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text imagen_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-center">
                        <div class="card">
                            <div class="card-header fondo-header">
                                <h2 class="lead text-center text-white">Caracteristicas de la persona</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tez" name="tez">
                                            <label for="tez">Tez / Color</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text tez_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="cabello" name="cabello">
                                            <label for="cabello">Cabello</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text cabello_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="ojos" name="ojos">
                                            <label for="ojos">Color de Ojos</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text ojos_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nariz" name="nariz">
                                            <label for="nariz">Nariz</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text nariz_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="boca" name="boca">
                                            <label for="boca">Boca</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text boca_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="contextura" name="contextura">
                                            <label for="contextura">Contextura</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text contextura_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="estatura" name="estatura"
                                                step="any">
                                            <label for="estatura">Estatura (1.70)</label>
                                            {{-- alerta de error --}}
                                            <span class="text-danger error-text estatura_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header fondo-header">
                                <h3 class="lead text-center text-white">Particularidades de la persona</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="vestimenta" name="vestimenta">
                                    <label for="vestimenta">Vestimenta</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text vestimenta_error"></span>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="ultima_vista" name="ultima_vista"
                                        style="height: 100px"></textarea>
                                    <label for="ultima_vista">Ultima ves Vista</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text ultima_vista_error"></span>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="observaciones" name="observaciones"
                                        style="height: 100px"></textarea>
                                    <label for="observaciones">Observaciones</label>
                                    {{-- alerta de error --}}
                                    <span class="text-danger error-text observaciones_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="boton boton-100" type="submit">Guardar Los Datos</button>
                </div>
            </form>
        </div>
    </section>
@endsection
