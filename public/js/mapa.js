window.addEventListener('DOMContentLoaded', () => {
    var latitudLima = '-12.0257733';
    var longitudLima = '-77.3174581';
    var zoom = 8;
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

    /*funcion para recargar el mapa cada segundo*/
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
            //console.log('datos:', data);
            if (data.code == 1) {
                $.each(data.result, function (prefix, val) {
                    var greenIcon = L.icon({
                        //iconUrl: 'http://127.0.0.1:8000/personas/' + val.imagen, //url ruta local
                        iconUrl: 'https://miagroperu.familc.com/uploads/ec75e757-7f9f-4486-baf9-551c4885fe64.jpg' , //url ruta local
                        shadowUrl: 'https://cdn-icons-png.flaticon.com/512/2642/2642502.png', //sombra 

                        iconSize: [45, 45], // tamaño de la imagen [ancho , alto]
                        shadowSize: [35, 50], // tamaño del icono [ancho , alto]
                        iconAnchor: [10, 115], // posicion de la imagen con respecto al punto [laterales(mayoy[izquierda],menor[derecha]),altura]
                        shadowAnchor: [14, 72],  // the same for the shadow
                        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
                    });
                    return mapa.addLayer(L.marker([val.latitud, val.longitud], { icon: greenIcon }).bindPopup('' + val.nombres + '-' + val.created_at + ''));
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