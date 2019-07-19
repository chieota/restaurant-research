<?php
    require_once "../classes/User.php";

    $user = new User;

    if($_GET['action'] == 'add'){

        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nationality = $_POST['nationality'];
        $comment = $_POST['comment'];
        $result = $user->save($username,$email,$password,$nationality,$comment);

        if($result){
            echo "<script>window.location.replace('users.php');</script>";

    }else{
        echo "Error!!";
    }

    }
    elseif($_GET['action'] == 'update'){
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nationality = $_POST['nationality'];
        $comment = $_POST['comment'];

        $result = $user->update($user_id,$username,$email,$nationality,$comment);

        if($result){
            echo "<script>window.location.replace('users.php'); </script>";
        }
    }

    elseif($_GET['action'] == 'delete'){
        $user_id = $_GET['user_id'];
        $result = $user->delete($user_id);
        if($result){
            echo "<script> window.location.replace('users.php'); </script>";
        }
    }
?>