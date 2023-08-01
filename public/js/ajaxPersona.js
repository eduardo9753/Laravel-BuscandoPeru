$(function () {


    /*guardar datos ajax persona*/
    $('#form-persona').on('submit', function (e) {
        e.preventDefault();

        var form = this;

        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
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
                    $(form)[0].reset();
                    alert(data.msg);
                    window.location.href = "/usuario/post";
                }
            }
        });
    });

    /*actializar datos aja persona
    $('#form-edit-persona').on('submit', function (e) {
        e.preventDefault();

        var form = this;

        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
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
                    $(form)[0].reset();
                    alert(data.msg);
                    location.reload();
                }
            }
        });
    });*/

    //actualizar datos ajax caracteristicas
    $('#form-edit-caracteristicas').on('submit', function (e) {
        e.preventDefault()

        var form = this;

        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
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
                    $(form)[0].reset();
                    alert(data.msg);
                    location.reload();
                }
            }
        });
    });

    //actualizar datos partiocularidades
    $('#form-edit-particularidad').on('submit', function (e) {
        e.preventDefault()

        var form = this;

        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
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
                    $(form)[0].reset();
                    alert(data.msg);
                    location.reload();
                }
            }
        });
    });


})