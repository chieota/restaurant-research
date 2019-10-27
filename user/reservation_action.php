<?php
    session_start();
    require_once "../classes/Reservation.php";
    require_once "../classes/User.php";
    // $user = new User();

    
    // $user_id = $user->selectOne($_SESSION['user_id']);

    $reservation = new Reservation;

    if($_GET['action'] == 'add'){
        

        $date = $_POST['date'];
        $number_of_people = $_POST['number_of_people'];
        $restaurant_id = $_POST['restaurant_id'];

        $result = $reservation->save($restaurant_id,$date,$number_of_people,$_SESSION['user_id']);
        if($result){
            echo "<script>window.location.replace('reservations.php');</script>";
        }else{
            echo "Error!!";
        }
    }elseif($_GET['action'] == 'update'){
        $reservation_id = $_POST['reservation_id'];
        $date = $_POST['date'];
        $number_of_people = $_POST['number_of_people'];
            
        $result = $reservation->update($reservation_id,$date,$number_of_people);
        if($result){
            echo "<script>window.location.replace('reservations.php');</script>";
        }
    }
    elseif($_GET['action'] == 'delete'){
        $reservation_id =$_GET['reservation_id'];
        $result = $reservation->delete($reservation_id);
        if($result){
            echo "<script>window.location.replace('reservations.php'); </script>";
        }
    }


?>