window.addEventListener('DOMContentLoaded', () => {
    var latitudLima = '-12.0057733';
    var longitudLima = '-75.2174581';
    var zoom = 10;
    var mapaUno = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var mapaDos = 'https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png';
    var mapa = L.map("mapa").setView([latitudLima, longitudLima], zoom);
    L.tileLayer(mapaDos).addTo(mapa);



    //funcion que pregunta para poder acceder 
    //a tus coordenadas actuales y marcar el punto
    const darCoordenadas = () => {
        mapa.locate({ enableHightAccuracy: true });
        mapa.on('locationfound', (e) => {
            console.log('coordenadas', e);
            var coordenadaUsuario = [e.latitude, e.longitude];
            var pintarMapa = L.marker(coordenadaUsuario);
            pintarMapa.bindPopup('Tu ubicación');
            mapa.addLayer(pintarMapa);
        })
    }

    //funcion para recargar el mapa cada segundo
    var person_id = $('#person_id').val();
    if (person_id >= 1) { setInterval(fetchCoordenadas, 1000); }


    //funcion cuando damos click a cualquier punto del mapa
    //te devuelve esos datos y marcar el punto
    const capturarCoordenadasMapa = (e) => {
        console.log('latitud: ' + e.latlng.lat + 'longitud' + e.latlng.lng);
        $('#latitud').val(e.latlng.lat);
        $('#longitud').val(e.latlng.lng);
    }

    //GUARDAR COORDENADAS VIA AJAX
    $('#form-coordenadas-mapa').on('submit', function (e) {
        e.preventDefault(); //PARA TETENER EL RECARGE DE LA PAGINA

        //variable formulario
        var form = this;

        //metodo ajax
        $.ajax({
            url: $(form).attr('action'), //lee la ruta del formulario
            method: $(form).attr('method'), //metodo de envio GET|POST
            data: new FormData(form), //datos del formulario
            processData: false,
            contentType: false,
            dataType: 'json',

            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },

            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $(form)[0].reset(); //reseteamos los datos en el formulario
                    alert(data.msg);
                }
            }
        });
    });


    //datos de las coordenadas que hace click cada persona y ver os puntos 
    //de la persona desaparecida
    fetchCoordenadas();
    function fetchCoordenadas() {
        var person_id = $('#person_id').val();
        $.get('/coordenadas/fecth', { person_id: person_id }, function (data) {
            //console.log(data);
            if (data.code == 1) {
                $.each(data.result, function (prefix, val) {
                    return mapa.addLayer(L.marker([val.latitud, val.longitud]).bindPopup('' + val.person_id + ''));
                });
            }
        }, 'json');
    }

    //funcion que carga las coordenadas pero con nombre de la ubicacion
    //y marcar el punto
    const cargarCoordenadasConNombre = (e) => {
        const coordenadas = [
            { latitud: -12.0257733, longitud: -77.0174581 },
            { latitud: -12.0357733, longitud: -76.3174581 },
            { latitud: -12.0457733, longitud: -75.3174581 },
        ];
        coordenadas.map(function (coordenada) {
            var coordenadaUsuario = [coordenada.latitud, coordenada.longitud];
            var pintarMapa = L.marker(coordenadaUsuario);
            pintarMapa.bindPopup('22/07/2023 16:44');
            return mapa.addLayer(pintarMapa);
        })
    }

    //funcion que carga las coordenadas pero sin nombre de la ubicacion
    //y marcar el punto
    const cargarCoordenadasSinNombre = (e) => {
        const coordenadas = [
            { latitud: -12.0257733, longitud: -77.0174581 },
            { latitud: -12.0357733, longitud: -76.3174581 },
            { latitud: -12.0457733, longitud: -75.3174581 },
        ];
        coordenadas.map(function (coordenada) {
            return mapa.addLayer(L.marker([coordenada.latitud, coordenada.longitud]));
        })
        /*const recorrido = coordenadas.map(function(coordenada){
            return mapa.addLayer(L.marker([coordenada.latitud, coordenada.longitud]));
        })
        console.log(recorrido);*/
    }



    //click al mapa y capturamos las coordenas en donde le damos click
    //window.addEventListener('load', darCoordenadas);
    mapa.on('click', capturarCoordenadasMapa);
    //window.addEventListener('load', cargarCoordenadasConNombre);
})