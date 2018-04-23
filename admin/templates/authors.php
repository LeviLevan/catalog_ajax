<?php include('header.php'); ?>
<?php include('functions.php'); ?>
   
    <?=selectAuthors();;?>
    
    <div class="row">
        <form class="form-horizontal">
           <div class="form-group">
              <input type="hidden" class="form-control author_id" name="author_id" id="author_id" placeholder="Author id">
           </div>
           <div class="form-group">
              <input type="text" class="form-control author_name" name="author_name" id="author_name" placeholder="Author">
           </div>
           <div class="form-group">
              <button id="submit_add_author" type="button" class="btn btn-default">Add Author</button>
              <button id="submit_update_author" type="button" class="btn btn-default" style="display:none;">Update</button>
           </div>
        </form>
    </div>
     
<?php include('footer.php'); ?>   