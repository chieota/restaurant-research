<?php
    require_once "classes/Genre.php";

    $genres = new Genre;

    if($_GET[action] == 'add'){
        $genre_id = $_POST['genre_id'];
        $genre_name = $_POST['genre_name'];
        $result = $genre->save($genre_name);
    }if($result){
        echo "<script>window.location.replace(admin/genres.php);</script>";
    }else{
        echo "Error!!";
    }

    elseif($_GET['action'] == 'update'){
        $genre_id = $_POST['genre_id'];
        
    }

?>