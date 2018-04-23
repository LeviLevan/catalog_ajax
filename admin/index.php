<?php include('/templates/header.php'); ?>
<?php include('/templates/functions.php'); ?>

<?php  
    echo returnBooks();
    getBooksAuthorsGenres();
?>
    <div class="row">
        <form class="col-sm-12">
           <div class="form-group">
               <input type="hidden" class="form-control book_id" name="book_id" id="book_id" placeholder="Book Id">
           </div>
           <div class="form-group">
               <input type="text" class="form-control book_name" name="book_name" id="book_name" placeholder="Book name">
           </div>
           <div class="form-group">
           <select required class="form-control" multiple id="authors_id" name="authors_id[]">
                <?php foreach(getBooksAuthorsGenres() as $author){ ?>
                    <option id="author_name" value="<?=$author['author_id'];?>"><?=$author['author_name'] ; ?></option>
                <?php } ?>
           </select>
           </div>
           <div class="form-group">
               <select required class="form-control" multiple id="genres_id" name="genres_id[]">
                <?php foreach(getBooksAuthorsGenres() as $genre){ ?>
                    <option id="genre_name" value="<?=$genre['genre_id'];?>"><?=$genre['genre_name'] ; ?></option>
                <?php } ?>
           </select>
           </div>
           <div class="form-group">
              <input type="text" class="form-control book_price" name="book_price" id="book_price" placeholder="Book price">
           </div>
           <div class="form-group">
              <textarea class="form-control book_content" id="book_content" name="book_content" rows="3" placeholder="Book content"></textarea>
           </div>
           <div class="form-group">
              <button id="submit_add_book" type="button" class="btn btn-default">Add book</button>
              <button id="submit_update_book" type="button" class="btn btn-default" style="display:none;">Update</button>
           </div>
        </form>
    </div>
    
<?php include('/templates/footer.php'); ?>    
    