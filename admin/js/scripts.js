$(document).ready(function(){
    //CRUD для Жанров
    //добавление Жанра, передача параметров Жанра после нажатия на кнопку
    $(document).on('click', '#submit_add_genre', function(){
        var genre_name = $('#genre_name').val();
        $.ajax({
            url: '/templates/functions.php',
            type: 'POST',
            data: {
                'save_genre': 1,
                'genre_name': genre_name
            },
            success: function(response){
                $('#genre_name').val('');
                //вывод отображения без перезагрузки
                $('#display_genres').append(response);
            }
        });
    });
        
    var genre_edit_id ;
    var $genre_edit_name;
    $(document).on('click','.edit_genre', function(){
        //отправка данные Жанра для редактирования
         genre_edit_id = $(this).data('id');
        $genre_edit_name = $(this).parent();
        //получаем данные для редактирования
        var genre_id = $(this).siblings('.genre_id').text();
        var genre_name = $(this).siblings('.genre_name').text();
        console.log(genre_id);
        //помещаем в форму значения
        $('#genre_id').val(genre_id);
        $('#genre_name').val(genre_name);
        //появление кнопки update при нажати на Add genre
        $('#submit_add_genre').hide();
        $('#submit_update_genre').show();
        
    });
    
    //обновление Жанра с взаимодейтсвием БД
    $(document).on('click', '#submit_update_genre', function(){
        var genre_id = $('#genre_id').val();
        var genre_name = $('#genre_name').val();
        $.ajax({
            url: '/templates/functions.php',
            type: 'POST',
            data: {
                'update': 1,
                'genre_id': genre_id,
                'genre_name': genre_name
            },
            success: function(response){
                $('#genre_id').val('');
                $('#genre_name').val('');
                $('#submit_add_genre').show();
                $('#submit_update_genre').hide();
                //вывод отображения без перезагрузки
                $genre_edit_name.replaceWith(response);
            }
        });
    });
    
    //удаление Жанра по Id
    $(document).on('click', '.delete_genre', function(){
        console.log($(this).data('id'));
        var genre_id = $(this).data('id');
        $delete_genre = $(this);
        $.ajax({
            url: '/templates/functions.php',
            type: 'GET',
            data: {
                'delete_genre': 1,
                'genre_id': genre_id,
            },
            success: function(response){
                $delete_genre.parent().remove();
            }
        });
    });
    
    //------------------------------------------------------------
    //CRUD для Авторов
    //добавление Автора
    $(document).on('click', '#submit_add_author', function(){
        var author_name = $('#author_name').val();
        $.ajax({
            url: '/templates/functions.php',
            type: 'POST',
            data: {
                'save_author': 1,
                'author_name': author_name
            },
            success: function(response){
                $('#author_name').val('');
                //вывод отображения без перезагрузки
                $('#display_authors').append(response);
            }
        });
    });
    
    var author_edit_id ;
    var $author_edit_name;
    $(document).on('click','.edit_author', function(){
        //получаем данные Автора для редактирования
        author_edit_id = $(this).data('id');
        $author_edit_name = $(this).parent();
        //получаем данные для редактировании
        var author_id = $(this).siblings('.author_id').text();
        var author_name = $(this).siblings('.author_name').text();
        console.log(author_id);
        //помещаем в форму значения
        $('#author_id').val(author_id);
        $('#author_name').val(author_name);
        //появление кнопки update при нажати на Add author
        $('#submit_add_author').hide();
        $('#submit_update_author').show();
        
    });
    
    //обновление Автора с взаимодейтсвием БД
    $(document).on('click', '#submit_update_author', function(){
        var author_id = $('#author_id').val();
        var author_name = $('#author_name').val();
        console.log(author_id);
        $.ajax({
            url: '/templates/functions.php',
            type: 'POST',
            data: {
                'update_author': 1,
                'author_id': author_id,
                'author_name': author_name
            },
            success: function(response){
                $('#author_id').val('');
                $('#author_name').val('');
                $('#submit_add_author').show();
                $('#submit_update_author').hide();
                //вывод отображения без перезагрузки
                $author_edit_name.replaceWith(response);
            }
        });
    });
    
     //удаление Автора
     $(document).on('click', '.delete_author', function(){
        console.log($(this).data('id'));
        var author_id = $(this).data('id');
        $delete_author = $(this);
        $.ajax({
            url: '/templates/functions.php',
            type: 'GET',
            data: {
                'delete_author': 1,
                'author_id': author_id,
            },
            success: function(response){
                $delete_author.parent().remove();
            }
        });
    });
    
    //------------------------------------------------------------
    //CRUD для траницы Home
        $(document).on('click', '#submit_add_book', function(){
        var book_name = $('#book_name').val();
        var authors_id = $('#authors_id').val();
        var genres_id = $('#genres_id').val();
        var book_price = $('#book_price').val();
        var book_content = $('#book_content').val();
        $.ajax({
            url: '/templates/functions.php',
            type: 'POST',
            data: {
                'save_book': 1,
                'book_name': book_name,
                'authors_id': authors_id,
                'genres_id': genres_id,
                'book_price': book_price,
                'book_content': book_content
            },
            success: function(response){
                $('#book_name').val('');
                $('#authors_id').val('');
                $('#genres_id').val('');
                $('#book_price').val('');
                $('#book_content').val('');
                //вывод отображения без перезагрузки
                $('#display_book').append(response);
            }
        });
    });
    
    var book_edit_id ;
    var $book_edit_price;
    var $book_edit_name;
    var $book_edit_content;
    var $book_edit_genres;
    var $book_edit_authors;
    $(document).on('click','.edit_book', function(){
        //получаем данные Книги для редактирования
        book_edit_id = $(this).data('id');
        $book_edit_price = $(this).parent();
        $book_edit_name = $(this).parent();
        $book_edit_content = $(this).parent();
        $book_edit_genres = $(this).parent();
        $book_edit_authors = $(this).parent();
        //получаем данные для отображения в редактировании
        var book_id = $(this).siblings('.book_id').text();
        var book_name = $(this).siblings('.book_name').text();
        var book_price = $(this).siblings('.book_price').text();
        var genre_name = $(this).siblings('.genre_name').text();
        var author_name = $(this).siblings('.author_name').text();
        var book_content = $(this).siblings('.book_content').text();
        //console.log(genre_name);
        console.log(author_name);
        //помещаем в форму значения
        $('#book_id').val(book_id);
        $('#book_name').val(book_name);
        $('#book_price').val(book_price);
        $('#genre_name').val(genre_name);
        $('#author_name').val(author_name);
        $('#book_content').val(book_content);
        //появление кнопки update при нажати на Add book
        $('#submit_add_book').hide();
        $('#submit_update_book').show();
        
    });
    
    //обновление Книги с взаимодейтсвием БД
    $(document).on('click', '#submit_update_book', function(){
        var book_id = $('#book_id').val();
        var book_name = $('#book_name').val();
        var author_name = $('#author_name').val();
        var genre_name = $('#genre_name').val();
        var authors_id = $('#authors_id').val();
        var genres_id = $('#genres_id').val();
        var book_price = $('#book_price').val();
        var book_content = $('#book_content').val();
        console.log(author_name);
        //console.log(authors_id);
        $.ajax({
            url: '/templates/functions.php',
            type: 'POST',
            data: {
                'update_book': 1,
                'book_id': book_id,
                'book_name': book_name,
                'author_name': author_name,
                'genre_name': genre_name,
                'authors_id': authors_id,
                'genres_id': genres_id,
                'book_price': book_price,
                'book_content': book_content
            },
            success: function(response){
                $('#book_id').val('');
                $('#book_name').val('');
                $('#author_name').val('');
                $('#genre_name').val('');
                $('#authors_id').val('');
                $('#genres_id').val('');
                $('#book_price').val('');
                $('#book_content').val('');
                $('#submit_add_book').show();
                $('#submit_update_book').hide();
                //вывод отображения без перезагрузки
                $book_edit_price.replaceWith(response);
                $book_edit_name.replaceWith(response);
                $book_edit_content.replaceWith(response);
                $book_edit_genres.replaceWith(response);
                $book_edit_authors.replaceWith(response);
            }
        });
    });
    
    //удаление Книги по Id
    $(document).on('click', '.delete_book', function(){
        console.log($(this).data('id'));
        var book_id = $(this).data('id');
        $delete_book = $(this);
        var a = $.ajax({
            url: '/templates/functions.php',
            type: 'GET',
            data: {
                'delete_book': 1,
                'book_id': book_id,
            },
            success: function(response){
                $delete_book.parent().remove();
            }
        });
        console.log(a);
    });
    
    
    
    
    
});