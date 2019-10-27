<?php
   session_start();

   require 'functions/admin.php';
   if(isset($_POST['login'])){
      $user_email = $_POST['user_email'];
      $user_pass = $_POST['user_pass'];
      $check = login($user_email, $user_pass);
         if(count($check) > 0){
            $_SESSION['id'] = $check['user_id'];
            $_SESSION['name'] = $check['user_name'];
            $_SESSION['email'] = $check['user_email'];
            $_SESSION['image'] = $check['user_image'];
            header('Location: dashboard.php');
         }else{
            header('Location: logout.php');
         }
      }
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18a4c41afe.js"></script>
    <title>Document</title>
</head>
<style>
        body{
            font-family: 'Crimson Text', serif;
        }

        .navbar{
            background-color: #2f3133;
            color:#000;
            height:100px;
            font-size:30px;
        }

 </style>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark stickiy-top" style="background-color:#1f98a3">
        <ul class="navbar-nav mr-auto ml-5">
           <li class="nav-item">
            <a href="#" class="nav-link" style="font-family: 'Indie Flower', cursive;">Blogen</a>
           </li>                           
           <li class="nav-item">
            <a href="#" class="nav-link">Dashboard</a>
           </li>
           <li class="nav-item">
             <a href="add_post.php" class="nav-link">Posts</a>
           </li>
           <li class="nav-item">
              <a href="add_category.php" class="nav-link">Categories</a>
           </li>
           <li class="nav-item">
              <a href="add_user.php" class="nav-link">Users</a>
           </li>            
        </ul>
        
         <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle mr-3"><i class="fas fa-user-alt mr-2"></i></a>
            <div class="dropdown-menu">
               <a href="profile.php" class="dropdown-item"><i class="fas fa-user-circle"></i>Profile</a>
               <a href="setting.php" class="dropdown-item"><i class="fas fa-cog"></i>Setting</a>
            </div>
 
             <li class="nav-item">
             <a href="logout.php" class="nav-link"><i class="fas fa-user-times mr-2"></i>Logout</a>
             </li>
        </ul>       
         </nav>

         <div class="row h-75" style="background-color:#3068c1;">
            <i class="fas fa-user-times ml-5 py-3 text-white" style="font-size: 40px;"></i>
            <h1 class="text-white ml-2 py-3">Logout</h1>
         </div>

         <div class="container mt-4">
            <form action="" method="post">
               <div class="card-header">
                     <h4>Account Login</h4>
               </div>
               
               <div class="form-group">
                     <label for="">Email</label><br>
                     <input type="email" name="user_email" class="form-control">
               </div>
               <div class="form-group">
                     <label for="">Password</label><br>
                     <input type="password" name="user_pass" class="form-control">
               </div>
               <input type="submit" value="Login" name="login" class="btn btn-primary">
            </form>
         </div>

    <footer class="mt-5 py-5 h-25" style="background-color: #313d4f;">
       <p class="text-center" style="color:aliceblue; text-alighn;">Copyright © Blogen Admin UI</p>
    </footer>


</body>
</html>
<?php
      require_once "footer.php";
    ?>