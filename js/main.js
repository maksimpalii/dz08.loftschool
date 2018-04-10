$('.btn-get').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url: 'http://dz08.loftschool/api/books/' + $('#books').val(),
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var content = '<h2>Результат: </h2><table><thead><tr><td>id</td><td>name</td><td>description</td><td>category_id</td></tr></thead><tbody><tr>';
            if (!data.length){
                content += '<td>' + data.id + '</td>';
                content += '<td>' + data.name + '</td>';
                content += '<td>' + data.description + '</td>';
                content += '<td>' + data.category_id + '</td></tr>';
            }else{
                data.forEach(function (element) {
                    content += '<td>' + element.id + '</td>';
                    content += '<td>' + element.name + '</td>';
                    content += '<td>' + element.description + '</td>';
                    content += '<td>' + element.category_id + '</td></tr>';
                });
            }
            $('#outmessage').html(content);
        }
    });
});

$('.btn-post').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url: 'http://dz08.loftschool/api/books/',
        type: 'POST',
        data: $('#post-form').serialize(),
        dataType: 'json',
        success: function (data) {
            var content = '<h2>Запись добавлена</h2><table><thead><tr><td>id</td><td>name</td><td>description</td><td>category_id</td></tr></thead><tbody><tr>';
            content += '<td>' + data.id + '</td>';
            content += '<td>' + data.name + '</td>';
            content += '<td>' + data.description + '</td>';
            content += '<td>' + data.category_id + '</td></tr>';
            $('#outmessage').html(content);
        }
    });
});

$('.btn-put').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url: 'http://dz08.loftschool/api/books/'+ $('#books_id').val(),
        type: 'POST',
        data: $('#put-form').serialize(),
       // dataType: 'json',
        success: function (data) {
            $('#outmessage').html(data);
        }
    });
});
$('.btn-delete').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url: 'http://dz08.loftschool/api/books/'+ $('#id_books').val(),
        type: 'POST',
        data: $('#form-delete').serialize(),
        // dataType: 'json',
        success: function (data) {
            $('#outmessage').html(data);
        }
    });
});