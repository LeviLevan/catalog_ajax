<?php include('header.php'); ?>
<?php include('functions.php'); ?>
   
    <?=selectGenres();?>
    
    <div class="row">
        <form class="form-horizontal">
           <div class="form-group">
                <input type="hidden" class="form-control genre_id" name="genre_id" id="genre_id" placeholder="Genre id">
           </div>
           <div class="form-group">
              <input type="text" class="form-control genre_name" name="genre_name" id="genre_name" placeholder="Genre name">
           </div>
           <div class="form-group">
              <button id="submit_add_genre" type="button" class="btn btn-default">Add Genre</button>
              <button id="submit_update_genre" type="button" class="btn btn-default" style="display:none;">Update</button>
           </div>
        </form>
    </div>
     
<?php include('footer.php'); ?>    