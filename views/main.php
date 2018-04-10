<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>API</title>
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <form id="form-get" action="">
        <input type="text" name="books" id="books" placeholder="id книги">
        <button type="submit" class="btn-get">Получить</button>
    </form>
    <form action="" id="post-form">
        <input type="text" name="name" id="name" placeholder="Название">
        <input type="text" name="description" id="description" placeholder="Описание">
        <select name="category_id" form="post-form">
            <option value="1">category-0</option>
            <option value="2">category-1</option>
            <option value="3">category-2</option>
            <option value="4">category-3</option>
            <option value="5">category-4</option>
        </select>
        <button type="submit" class="btn-post">Добавить</button>
    </form>
    <form action="" id="put-form" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="id" id="books_id" placeholder="id книги">
        <input type="text" name="name" id="name" placeholder="Название">
        <input type="text" name="description" id="description" placeholder="Описание">
        <select name="category_id" form="put-form">
            <option value="1">category-0</option>
            <option value="2">category-1</option>
            <option value="3">category-2</option>
            <option value="4">category-3</option>
            <option value="5">category-4</option>
        </select>
        <button type="submit" class="btn-put">Редактировать</button>
    </form>
    <form id="form-delete" action="" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="text" name="id_books" id="id_books" placeholder="id книги">
        <button type="submit" class="btn-delete">Удалить</button>
    </form>
</div>
<div id="outmessage"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>