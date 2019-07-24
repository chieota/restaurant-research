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

?>