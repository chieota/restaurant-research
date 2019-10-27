<?php
    session_start();
    require_once "../classes/Review.php";

    $review = new Review;

    if($_GET['action'] == 'add'){
        $restaurant_id = $_POST['restaurant_id'];
        $score = $_POST['score'];
        $price = $_POST['price'];
        $comment = $_POST['comment'];

        $result = $review->save($restaurant_id,$score,$price,$comment);
        if($result){
            echo "<script>window.location.replace('reviews.php');</script>";
        }else{
            echo "Error!!";
        }
    }elseif($_GET['action'] == 'update'){
        $review_id = $_POST['review_id'];
        $restaurant_id = $_POST['restaurant_id'];
        $score = $_POST['score'];
        $price = $_POST['price'];
        $comment = $_POST['comment'];
            
        $result = $review->update($review_id,$restaurant_id,$score,$price,$comment);
        if($result){
            echo "<script>window.location.replace('reviews.php');</script>";
        }
    }
    elseif($_GET['action'] == 'delete'){
        $review_id =$_GET['review_id'];
        $result = $review->delete($review_id);
        if($result){
            echo "<script>window.location.replace('reviews.php'); </script>";
        }
    }

?>