<div class="modal fade" id="edit-characteristic-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-caracteristicas" action="{{ route('usuario.caracteristica.update') }}"
                    method="POST">

                    {{-- METODO ACTUALIZAR --}}
                    @method('PUT')

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf
                    <div class="card mb-3">
                        <div class="card-header fondo-header">
                            <h1 class="lead text-center text-white">Datos de la persona</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="{{ $data->characteristic_id }}" hidden
                                            name="caracteristica_id">
                                        <input type="text" class="form-control" id="tez" name="tez"
                                            value="{{ $data->tez }}">
                                        <label for="tez">Tez / Color</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text tez_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="cabello" name="cabello"
                                            value="{{ $data->cabello }}">
                                        <label for="cabello">Cabello</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text cabelloerror"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="ojos" name="ojos"
                                            value="{{ $data->ojos }}">
                                        <label for="ojos">Color de Ojos</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text ojos_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nariz" name="nariz"
                                            value="{{ $data->nariz }}">
                                        <label for="nariz">Nariz</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text nariz_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="boca" name="boca"
                                            value="{{ $data->boca }}">
                                        <label for="boca">Boca</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text boca_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="contextura" name="contextura"
                                            value="{{ $data->contextura }}">
                                        <label for="contextura">Contextura</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text contextura_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="estatura" name="estatura"
                                            value="{{ $data->estatura }}" step="any">
                                        <label for="estatura">Estatura (1.70)</label>
                                        {{-- alerta de error --}}
                                        <span class="text-danger error-text estatura_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerra</button>
            </div>
        </div>
    </div>
</div>
