<div class="modal fade" id="edit-particualarity-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-particularidad" action="{{ route('usuario.particularidad.update') }}"
                    method="POST">

                    {{-- METODO ACTUALIZAR --}}
                    @method('PUT')

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf

                    <div class="card">
                        <div class="card-header fondo-header">
                            <h2 class="lead text-center text-white">Datos de la persona</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $data->particularity_id }}" hidden
                                    name="particularidad_id">
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
