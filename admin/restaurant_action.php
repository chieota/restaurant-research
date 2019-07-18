<?php
    session_start();
    require_once "../classes/Restaurant.php";
    $user_id = $_SESSION['user_id'];
    $restaurant = new Restaurant;

    if($_GET['action'] == 'add'){
        $restaurant_name = $_POST['restaurant_name'];
        $genre = $_POST['genre'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $bussinessday = $_POST['bussinessday'];
        $budget = $_POST['budget'];

        $result = $restaurant->save($restaurant_name,$genre,$country,$city,$address,$bussinessday,$budget,$user_id);
            if($result){
                echo "<script>window.location.replace('restaurants.php');</script>";
            }else{
                echo "Error!!";
            }
    }elseif($_GET['action'] == 'update'){
        $restaurant_id = $_POST['restaurant_id'];
        $restaurant_name = $_POST['restaurant_name'];
        $genre = $_POST['genre'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $bussinessday = $_POST['bussinessday']; 
        $budget = $_POST['budget'];       

        $result = $restaurant->update($restaurant_id,$restaurant_name,$genre,$country,$city,$address,$bussinessday,$budget);
        if($result){
            echo "<script>window.location.replace('restaurants.php');</script>";
        }
    }
    elseif($_GET['action'] == 'delete'){
        $restaurant_id =$_GET['restaurant_id'];
        $result = $restaurant->delete($restaurant_id);
        if($result){
            echo "<script>window.location.replace('restaurants.php'); </script>";
        }
    }

?>