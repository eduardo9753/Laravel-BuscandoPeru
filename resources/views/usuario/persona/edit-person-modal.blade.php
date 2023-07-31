

<div class="modal fade" id="edit-person-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card mb-3">
                        <div class="card-header fondo-header">
                            <h1 class="lead text-center text-white">Datos de la persona</h1>
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
                                        <input type="text" class="form-control" id="edad" name="edad"
                                            value="{{ $data->edad }}" placeholder="edad">
                                        <label for="edad">Edad</label>
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
                                    style="height: 100px"></textarea>
                                <label for="lugar_suceso">Lugar del Succeso</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Adicionales" name="adicional" id="adicional" style="height: 100px"></textarea>
                                <label for="adicional">Adicionales</label>
                            </div>

                            <div class="form-floating mb-3">
                                <img class="w-100" src="{{ asset('personas') . '/' . $data->imagen }}" alt="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
