<?php

function connect(){
    $db = mysqli_connect('localhost', 'root', '', 'books');
    if(!$db){
        die('Error: ' . mysqli_error($db));
    }
    return $db;
}
//var_dump(connect());die();