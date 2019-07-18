<?php
    require_once "../classes/Genre.php";

    $genre = new Genre;

    if($_GET['action'] == 'add'){

        $genre_name = $_POST['genre_name'];
        $result = $genre->save($genre_name);
            if($result){
                echo "<script>window.location.replace('genres.php');</script>";
            }else{
                echo "Error!!";
             }
    }

    elseif($_GET['action'] == 'update'){
        $genre_id = $_POST['genre_id'];
        $genre_name = $_POST['genre_name'];

        $result = $genre->update($genre_id,$genre_name);
        if($result){
            echo "<script>window.location.replace('genres.php'); </script>";
        }
    }

    elseif($_GET['action'] == 'delete'){
        $genre_id = $_GET['genre_id'];
        $result = $genre->delete($genre_id);
        if($result){
            echo "<script>window.location.replace('genres.php'); </script>";
        }
    }



?>