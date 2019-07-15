<?php
    require_once "classes/User.php";

    //create instance
    $user = new User;

    if($_GET['action'] == 'add'){

        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $comment = $_POST['comment'];
        $result = $user->save($username,$email,$password,$gender,$nationality,$comment);

        if($result){
            echo "<script>window.location.replace('admin/users.php');</script>";

    }else{
        echo "Error!!";
    }

    }
    elseif($_GET['action'] == 'update'){
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $comment = $_POST['comment'];

        $result = $user->update($user_id,$username,$email,$gender,$nationality,$comment);

        if($result){
            echo "<script>window.location.replace('admin/users.php'); </script>";
        }
    }

    elseif($_GET['action'] == 'delete'){
        $user_id = $_GET['user_id'];
        $result = $user->delete($user_id);
        if($result){
            echo "<script> window.location.replace('admin/users.php'); </script>";
        }
    }
?>