$('.btn-default').on('click', function (e) {
    e.preventDefault();
    //var formData = new FormData($('.form-horizontal')[0]);

    // $.ajax({
    //     url: 'http://dz08.loftschool/api/books/',
    //     type: 'GET',
    //     //data: formData, // Данные которые мы передаем
    //     data: $('#books').val(),
    //     //data: 3,
    //     //data: $('.form-horizontal').serialize(),
    //     dataType:'json'
    // }).done(function (resultat) {
    //     $('#outmessage').html(resultat)
    //
    // })

    $.ajax({
        url: 'http://dz08.loftschool/api/books/' + $('#books').val(),
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (!data.length){
                content += '<td>' + data.id + '</td>';
                content += '<td>' + data.name + '</td>';
                content += '<td>' + data.description + '</td>';
                content += '<td>' + data.description + '</td></tr>';
            }else{
            var content = '<table><tr>';
                data.forEach(function (element) {
                    content += '<td>' + element.id + '</td>';
                    content += '<td>' + element.name + '</td>';
                    content += '<td>' + element.description + '</td>';
                    content += '<td>' + element.description + '</td></tr>';
                });
            }
            $('#outmessage').html(content);
        }
    });
});

