<?php
    session_start();
    require_once "../classes/Restaurant.php";
    require_once "../classes/RestaurantImage.php";

    $restaurant = new Restaurant;
    $restaurantImage = new RestaurantImage;

    if($_POST['action'] == 'add'){
        $restaurant_name = $_POST['restaurant_name'];
        $genre = $_POST['genre'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $url = $_POST['url'];
        $budget = $_POST['budget'];

        $image_data =addslashes((file_get_contents($_FILES['top_image']['tmp_name'])));
        $top_image_properties = getimageSize($_FILES['top_image']['tmp_name']);
        $image_type = $top_image_properties['mime'];     
            
        $detail = $_POST['detail'];

        $add_date = $_POST['add_date'];


        $saveResult = $restaurant->save($restaurant_name,$genre,$city,$address,$tel,$url,$budget,$detail,$add_date);
        
        $restaurant_id = $saveResult->restaurant_id;
        
        $restaurantImage->save($restaurant_id,$image_type,$image_data);


            if($saveResult->result){
              echo "<script>window.location.replace('restaurants.php');</script>";
            }else{
                echo "Error!!";
            }
    }elseif($_POST['action'] == 'update'){
        $restaurant_id =$_POST['restaurant_id'];
        $restaurant_name =$_POST['restaurant_name'];
        $genre = $_POST['genre'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $url = $_POST['url'];
        $budget = $_POST['budget'];
        $restaurant_image_id = $_POST['restaurant_image_id'];

              

        $detail = $_POST['detail'];

           
        $result = $restaurant->update($restaurant_name,$genre,$city,$address,$tel,$url,$budget,$detail,$restaurant_id);
        

        if ($_FILES['top_image']['size'] > 0)
        {
            $image_data =addslashes((file_get_contents($_FILES['top_image']['tmp_name'])));
            $top_image_properties = getimageSize($_FILES['top_image']['tmp_name']);
            $image_type = $top_image_properties['mime'];  

            $restaurantImage->update($restaurant_id,$image_type,$image_data,$restaurant_image_id);
        }

        if($result){
            echo "<script>window.location.replace('restaurants.php');</script>";
        }
    }
    elseif($_POST['action'] == 'delete'){
        $restaurant_id =$_POST['restaurant_id'];
        $result = $restaurant->delete($restaurant_id);
        if($result){
            echo "<script>window.location.replace('restaurants.php'); </script>";
        }
    }

?>