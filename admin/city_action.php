<?php
    require_once "../classes/City.php";

    $city = new City;

    if($_GET['action'] == 'add'){
        $city_name = $_POST['city_name'];
        $result = $city->save($city_name);
        if($result){
            echo "<script>window.location.replace('cities.php');</script>";
        }else{
            echo "Error!!";
        }
    }

    elseif($_GET['action'] == 'update'){
        $city_id = $_POST['city_id'];
        $city_name = $_POST['city_name'];
        $result = $city->update($city_id,$city_name);

        if($result){
            echo "<script>window.location.replace('cities.php'); </script>";
        }
    }


    elseif($_GET['action'] == 'delete'){
        $city_id = $_GET['city_id'];
        $result = $city->delete($city_id);
        if($result){
            echo "<script> window.location.replace('cities.php'); </script>";
        }
    }

?>