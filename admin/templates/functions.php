<?php 
include('/db.php');
insertGenre();
updateGenre();
deleteGenre();
//вывод отображения списка Жанров
function selectGenres()
{
    $db = connect();
    $sql = "SELECT * FROM genres";
    $res = mysqli_query($db, $sql);
    //var_dump($res);die();
    $display_genres = '<table class="table table-hover" id="display_genres">';
        while($row = mysqli_fetch_array($res)){
            $display_genres .= 
            '<tbody>
                <tr class="row">
                    <td style="display:none;" class="genre_id">'.$row['genre_id'].'</td>
                    <td class="col-sm-10 genre_name">'.$row['genre_name'].'</td>
                    <td class="col-sm-1 edit_genre far fa-edit" data-id="'.$row['genre_id'].'"></td>
                    <td class="col-sm-1 delete_genre far fa-trash-alt" data-id="' . $row['genre_id'] . '"></td>
                </tr>
            </tbody>';                   
            }
    $display_genres .= '</table>';
    return $display_genres;
}

//получение параметров Жанра из Js и их запись в БД
function insertGenre()
{
    $db = connect();
    if(isset($_POST['save_genre'])){
        $genre_name = $_POST['genre_name'];
        $sql = "INSERT INTO genres (genre_name) VALUES ('{$genre_name}')";
        if(mysqli_query($db, $sql)){
            $genre_id = mysqli_insert_id($db);
            $save_genre =
            '<tbody>
                <tr class="row">
                    <td style="display:none;" class="genre_id">'.$genre_id.'</td>
                    <td class="col-sm-10 genre_name">'.$genre_name.'</td>
                    <td class="col-sm-1 edit_genre far fa-edit" data-id="'.$genre_id.'"></td>
                    <td class=" col-sm-1 delete_genre far fa-trash-alt" data-id="' .$genre_id. '"></td>
                </tr>
            </tbody>';
        echo $save_genre;
        }
        exit();
    } 
}

//редактирование Жанра
function updateGenre()
{
    $db = connect();
    if(isset($_POST['update'])){
        $genre_name = $_POST['genre_name'];
        $genre_id = $_POST['genre_id'];
        //var_dump($genre_id);die();
        $sql = "UPDATE genres SET genre_name='{$genre_name}' WHERE genre_id=".$genre_id;
        if(mysqli_query($db, $sql)){
            $update_genre =
            '<tr class="row">
                <td style="display:none;" class="genre_id">'.$genre_id.'</td>
                <td class="col-sm-10 genre_name">'.$genre_name.'</td>
                <td class="col-sm-1 edit_genre far fa-edit" data-id="'.$genre_id.'"></td>
                <td class="col-sm-1 delete_genre far fa-trash-alt" data-id="' .$genre_id. '"></td>
            </tr>';
        echo $update_genre;
        }
        exit();
    } 
}

//удаление Жанра из БД
function deleteGenre()
{
    if(isset($_GET['delete_genre'])){
        $db = connect();
        $genre_id = $_GET['genre_id'];
        $sql = "DELETE FROM genres WHERE genre_id=" . $genre_id;
        mysqli_query($db, $sql);
        exit();
    }
}


//-------------------------------------------------------------------------------------------------------------
//CRUD для Авторов
insertAuthor();
updateAuthor();
deleteAuthor();
function selectAuthors()
{
    $db = connect();
    $sql = "SELECT * FROM authors";
    $res = mysqli_query($db, $sql);
    $display_authors = '<table class="table table-hover" id="display_authors">';
        while($row = mysqli_fetch_array($res)){
            $display_authors .= 
            '<tbody>
                <tr class="row">
                    <td style="display:none;" class="author_id">'.$row['author_id'].'</td>
                    <td class="col-sm-10 author_name">'.$row['author_name'].'</td>
                    <td class="col-sm-1 edit_author far fa-edit" data-id="'.$row['author_id'].'"></td>
                    <td class="col-sm-1 delete_author far fa-trash-alt" data-id="' . $row['author_id'] . '"></td>
                </tr>
            </tbody>';                   
            }
    $display_authors .= '</table>';
    return $display_authors;
}

function insertAuthor()
{
    $db = connect();
    if(isset($_POST['save_author'])){
        $author_id = $_POST['author_id'];
        $author_name = $_POST['author_name'];
        $sql = "INSERT INTO authors (author_name) VALUES ('{$author_name}')";
        if(mysqli_query($db, $sql)){
        $author_id = mysqli_insert_id($db);
            $save_author =  
            '<tbody>
                <tr class="row">
                    <td style="display:none;" class="author_id">'.$author_id.'</td>
                    <td class="col-sm-10 author_name">'.$author_name.'</td>
                    <td class="col-sm-1 edit_author far fa-edit" data-id="'.$author_id.'"></td>
                    <td class="col-sm-1 delete_author far fa-trash-alt" data-id="' .$author_id. '"></td>
                </tr>
            </tbody>';
        echo $save_author;
        }
        exit();
    } 
}

//редактирование Автора
function updateAuthor()
{
    $db = connect();
    if(isset($_POST['update_author'])){
        $author_name = $_POST['author_name'];
        $author_id = $_POST['author_id'];
        //var_dump($author_id);die();
        $sql = "UPDATE authors SET author_name='{$author_name}' WHERE author_id=".$author_id;
        if(mysqli_query($db, $sql)){
            $update_author =
            '<tr class="row">
                <td style="display:none;" class="author_id">'.$author_id.'</td>
                <td class="col-sm-10 genre_name">'.$author_name.'</td>
                <td class="col-sm-1 edit_author far fa-edit" data-id="'.$author_id.'"></td>
                <td class="col-sm-1 delete_author far fa-trash-alt" data-id="' .$author_id. '"></td>
            </tr>';
        echo $update_author;
        }
        exit();
    }
}

function deleteAuthor()
{
    if(isset($_GET['delete_author'])){
        $db = connect();
        $author_id = $_GET['author_id'];
        var_dump($_GET['delete_author']);
        $sql = "DELETE FROM authors WHERE author_id=" . $author_id;
        mysqli_query($db, $sql);
        exit();
    }
}

//-------------------------------------------------------------------------------------------------------
//CRUD books
insertBook();
updateBook();
deleteBook();


selectBooksAuthors();

function returnBooks()
{  
    selectBooks();
    selectBooksGeners();
    selectBooksAuthors();
    getBooksAuthorsGenres();
   
    $display_books = '<table class="table table-sm" id="display_book">';
    $display_books .='<tbody>';
    if(!empty(selectBooks())){foreach(selectBooks() as $books){
    $display_books .= '<tr class="row text-center">
                            <td id="'.$books['book_id'].'"class="panel-collapse collapse book_content" style="width:100%">';
    $display_books .=       $books['book_content'];
    $display_books .=      '</td>
                            <td class="book_id" style="display:none;">';
    $display_books .=       $books['book_id'];
    $display_books .=      '</td>
                            <td class="col-sm-3 book_name">';
    $display_books .=       $books['book_name'];
    $display_books .=      '</td>
                            <td class="col-sm-2 author_name">';
                            if(!empty(selectBooksAuthors())){foreach(selectBooksAuthors() as $authors){
                                if($books['book_id'] == $authors['book_id']){
    $display_books .=       $authors['author_name'];
    $display_books .=       '<br>';                                
                                }
                            }};
    $display_books .=       '</td>
                             <td class="col-sm-2 genre_name">';
                             if(!empty(selectBooksGeners())){foreach(selectBooksGeners() as $genres){
                                if($books['book_id'] == $genres['book_id']){
    $display_books .=        $genres['genre_name'];
    $display_books .=        '<br>';
                                }
                             }};
    $display_books .=        '</td>';
    $display_books .=        '<td class="col-sm-1 book_price">';
    $display_books .=        $books['book_price'];
    $display_books .=        '</td>
                              <td class="col-sm-2">
                                 <div class="panel-group" id="accordion">
                                    <h5>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#'.$books['book_id'].'">
                                            <i class="far fa-arrow-alt-circle-up"></i>
                                                Содержание
                                            <i class="far fa-arrow-alt-circle-up"></i>
                                        </a>  
                                    </h5>
                                  </div>
                             </td>
                             <td class="col-sm-1 edit_book far fa-edit" data-id="'.$books['book_id'].'"></td>
                             <td class="col-sm-1 delete_book far fa-trash-alt" data-id="'.$books['book_id'].'"></td>
                         </tr>';
    }
}
    $display_books .= '</tbody>
                       </table>';
    return $display_books;
}

//добавление Книги
function insertBook()
{
    $db = connect();
    if(isset($_POST['save_book'])  && isset($_POST['book_content']) && 
       isset($_POST['book_price']) && isset($_POST['authors_id']) && isset($_POST['genres_id'])){
        $book_name = $_POST['book_name'];
        $book_content = $_POST['book_content'];
        $book_price = $_POST['book_price'];
        $authors_id = $_POST['authors_id'];
        $genres_id = $_POST['genres_id'];
        //var_dump($_POST);die();
        $sql = "INSERT INTO books (book_name,book_content,book_price) VALUES ('$book_name','$book_content','$book_price');";
        if(mysqli_query($db, $sql)){
            $book_id = mysqli_insert_id($db);
        }
        if(isset($authors_id)){
            foreach($authors_id as $author_id){
                $sql = "INSERT INTO books_authors (book_id, author_id) VALUES ('$book_id','$author_id')";
                mysqli_query($db, $sql);
                }
            }
        if(isset($genres_id)){
            foreach($genres_id as $genre_id){
                $sql = "INSERT INTO books_genres (book_id, genre_id) VALUES ('$book_id','$genre_id')";
                mysqli_query($db, $sql);
                }
            }
        //var_dump($authors_id);die();
        $insert_book  =  '<table class="table table-sm" id="display_book">
                              <tbody>
                              <tr class="row text-center">
                              <td id="'.$book_id.'" class="panel-collapse collapse book_content" style="width:100%">';
        $insert_book .=   $book_content;
        $insert_book .=  '</td>
                              <td class="col-sm-3 book_name">';
        $insert_book .=   $book_name;    
        $insert_book .=  '</td>
                              <td class="col-sm-2 author_name">';
                              if(!empty(selectBooksAuthors()))
                                 {foreach(selectBooksAuthors() as $authors){
                                    if($book_id == $authors['book_id']){
        $insert_book .=    $authors['author_name'];
        $insert_book .=   '<br>';                                
                                      }
                                   }
                                };
        $insert_book .=   '</td>
                               <td class="col-sm-2 genre_name">';
                               if(!empty(selectBooksGeners()))
                                  {foreach(selectBooksGeners() as $genres){
                                    if($book_id == $genres['book_id']){
        $insert_book .=    $genres['genre_name'];
        $insert_book .=   '<br>';
                                        }
                                     }
                                  };
        $insert_book .=   '</td>
                                <td class="col-sm-1 book_price">';
        $insert_book .=    $book_price;
        $insert_book .=   '</td>
                                <td class="col-sm-2">
                               <div class="panel-group" id="accordion">
                                    <h5>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#'.$book_id.'">
                                        <i class="far fa-arrow-alt-circle-up"></i>
                                            Содержание!
                                        <i class="far fa-arrow-alt-circle-up"></i>
                                    </h5>
                                </div>
                                </td>
                                <td class="col-sm-1 edit_book far fa-edit" data-id="'.$book_id.'"></td>
                                <td class="col-sm-1 delete_book far fa-trash-alt" data-id="'.$book_id.'"></td>
                                </tr>';
        $insert_book .=   '</tbody>';              
        $insert_book .=   '</table>';
        echo $insert_book;
        exit();
    }
}

//редактирование Книги
function updateBook()
{
    selectBooks();
    selectBooksAuthors();
    selectBooksGeners();
    getBooksAuthorsGenres();
    
    $db = connect();
    if(isset($_POST['update_book'])){
        $book_id = $_POST['book_id'];
        $book_name = $_POST['book_name'];
        $book_content = $_POST['book_content'];
        $book_price = $_POST['book_price'];
        $authors_id = $_POST['authors_id'];
        $genres_id = $_POST['genres_id'];
        $author_name = $_POST['author_name'];
        $genre_name = $_POST['genre_name'];
        $res = $db->query("UPDATE books SET book_name='$book_name', book_content='$book_content', book_price='$book_price' WHERE book_id = '$book_id'");
        $res = $db->query("DELETE FROM `books_authors` WHERE book_id = '$book_id'");
        if(isset($authors_id)){foreach($authors_id as $author_id):
            $res = $db->query("INSERT INTO books_authors (author_id, book_id) VALUES ('$author_id','$book_id')");
        endforeach;
        }
        $res = $db->query("DELETE FROM `books_genres` WHERE book_id = '$book_id'");
        if(isset($genres_id)){foreach($genres_id as $genre_id){
            $res = $db->query("INSERT INTO books_genres (genre_id, book_id) VALUES ('$genre_id','$book_id')");
          }
        }
            $update_book  =  '<table class="table table-sm" id="display_book">
                              <tbody>
                              <tr class="row text-center">
                              <td id="'.$book_id.'" class="panel-collapse collapse book_content" style="width:100%">';
            $update_book .=   $book_content;
            $update_book .=  '</td>
                              <td class="col-sm-3 book_name">';
            $update_book .=   $book_name;    
            $update_book .=  '</td>
                              <td class="col-sm-2 author_name">';
                              if(!empty(selectBooksAuthors()))
                                 {foreach(selectBooksAuthors() as $authors){
                                    if($book_id == $authors['book_id']){
            $update_book .=    $authors['author_name'];
            $update_book .=   '<br>';                                
                                      }
                                   }
                                };
            $update_book .=   '</td>
                               <td class="col-sm-2 genre_name">';
                               if(!empty(selectBooksGeners()))
                                  {foreach(selectBooksGeners() as $genres){
                                    if($book_id == $genres['book_id']){
            $update_book .=    $genres['genre_name'];
            $update_book .=   '<br>';
                                        }
                                     }
                                  };
            $update_book .=   '</td>
                                <td class="col-sm-1 book_price">';
            $update_book .=    $book_price;
            $update_book .=   '</td>
                                <td class="col-sm-2">
                               <div class="panel-group" id="accordion">
                                    <h5>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#'.$book_id.'">
                                        <i class="far fa-arrow-alt-circle-up"></i>
                                            Содержание!
                                        <i class="far fa-arrow-alt-circle-up"></i>
                                    </h5>
                                </div>
                                </td>
                                <td class="col-sm-1 edit_book far fa-edit" data-id="'.$book_id.'"></td>
                                <td class="col-sm-1 delete_book far fa-trash-alt" data-id="'.$book_id.'"></td>
                                </tr>';
           $update_book .=   '</tbody>';              
           $update_book .=   '</table>';
           echo $update_book;
           exit();
        }  
}

//удаление Книги из БД
function deleteBook(){
    if(isset($_GET['delete_book'])){
        $db = connect();
        $book_id = $_GET['book_id'];
        $sql = "DELETE books_authors, books_genres FROM books
                             LEFT JOIN books_authors ON books_authors.book_id=books.book_id
                             LEFT JOIN books_genres ON books_genres.book_id=books.book_id
                             WHERE books.book_id = '$book_id'";
        mysqli_query($db, $sql);
        $sql = "DELETE FROM books WHERE books.book_id = '$book_id'";
        mysqli_query($db, $sql);
        exit();
    }
}





//---------------------------------------------------------------------
function selectBooks()
{
    $db = connect();
    $sql = "SELECT * FROM books";
    $res = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($res)) {
	        $books[$i]['book_id'] = $row['book_id'];
            $books[$i]['book_name'] = $row['book_name'];
            $books[$i]['book_content'] = $row['book_content'];
            $books[$i]['book_price'] = $row['book_price'];
			$i++;
		}
    return $books;
}

function selectBooksGeners()
{
    $db = connect();
    $res = $db->query("SELECT books.book_id,genres.genre_name, genres.genre_id FROM books 
                          JOIN books_genres ON books.book_id=books_genres.book_id 
                          JOIN genres ON genres.genre_id=books_genres.genre_id");
    $i = 0;
    while($row = mysqli_fetch_array($res)) {
	    $genres[$i]['book_id'] = $row['book_id'];
        $genres[$i]['genre_id'] = $row['genre_id'];
        $genres[$i]['genre_name'] = $row['genre_name'];
    $i++;
    }
    return  $genres;
}

function selectBooksAuthors()
{
    $db = connect();
    $res = $db->query("SELECT books.book_id,authors.author_name, authors.author_id FROM books 
                       JOIN books_authors ON books.book_id=books_authors.book_id 
                       JOIN authors ON authors.author_id=books_authors.author_id ");
    $i = 0;
    while($row = mysqli_fetch_array($res)) {
	    $authors[$i]['book_id'] = $row['book_id'];
        $authors[$i]['author_id'] = $row['author_id'];
        $authors[$i]['author_name'] = $row['author_name'];
    $i++;
    }
    return  $authors;
   
}

function getBooksAuthorsGenres()
{
    $db = connect();
    $res = $db->query("SELECT * FROM authors");
    $i = 0;
    while($row = mysqli_fetch_array($res)) {
        $books[$i]['author_id'] = $row['author_id'];
        $books[$i]['author_name'] = $row['author_name'];
        $i++;
    }  
    $db = connect();
    $res = $db->query("SELECT * FROM genres");
    $i = 0;
    while($row = mysqli_fetch_array($res)) {
            $books[$i]['genre_id'] = $row['genre_id'];
    $books[$i]['genre_name'] = $row['genre_name'];
    $i++;
    }     
    return  $books;
}
