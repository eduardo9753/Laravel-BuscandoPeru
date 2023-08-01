<div class="modal fade" id="edit-person-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-persona" action="{{ route('usuario.persona.update') }}" method="POST">

                    {{-- METODO ACTUALIZAR --}}
                    @method('PUT')

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf
                    <div class="card mb-3">
                        <div class="card-header fondo-header">
                            <h1 class="lead text-center text-white">Datos de la persona</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $data->id }}" hidden name="persona_id">
                                <input type="text" class="form-control" name="nombres" id="nombres"
                                    value="{{ $data->nombres }}">
                                <label for="nombres">Nombres</label>
                                {{-- alerta de error --}}
                                <span class="text-danger error-text nombres_error"></span>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                    value="{{ $data->apellidos }}">
                                <label for="apellidos">Apellidos</label>
                                {{-- alerta de error --}}
                                <span class="text-danger error-text apellidos_error"></span>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="celular"
                                            name="celular" value="{{ $data->celular }}">
                                        <label for="celular">Celular de Contacto</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text celular_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="edad" name="edad"
                                            value="{{ $data->edad }}">
                                        <label for="edad">Edad</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text edad_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="country_id" id="country_id" class="form-select">
                                            <option value="{{ $data->country_id }}">{{ $data->pais }}</option>
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
                                            value="{{ $data->fecha_suceso }}">
                                        <label for="fecha_suceso">Fecha Suceso</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text fecha_suceso_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="lugar_suceso" id="lugar_suceso" style="height: 100px">{{ $data->lugar_suceso }}</textarea>
                                <label for="lugar_suceso">Lugar del Succeso</label>
                                {{-- alerta de error --}}
                                <span class="text-danger error-text lugar_suceso_error"></span>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="adicional" id="adicional" style="height: 100px">{{ $data->adicional }}</textarea>
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

                            <div class="form-floating mb-3 text-center">
                                <img class="" style="width: 280px"
                                    src="{{ asset('personas') . '/' . $data->imagen }}" alt="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
