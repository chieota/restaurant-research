<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 mt-5">
                <div class="card">
                    <div class="card-header py-5 bg-dark">
                        <h3 class="text-light text-center py-3">Register</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Your password" name="password">
                            </div>
                            <div class="form-group">
                                <select name="user_type" class="form-control">
                                     <option value='user' name="user">User</option>
                                </select>
                                <!-- <input type="option" class="form-control" placeholder="User" name="user_type">
                                <section>
                                    <option value="user"disabled>User</option>
                                </section> -->
                            </div>
                            
                            <button type="submit" class="btn btn-outline-danger btn-sm mt-3" name="register">Register</button>
                            <p class="float-right mt-3 text-muted">Already have an account 
                            <strong><a href="login.php" class="text-decoration text-dark">Log in</a></strong></p>
                        </form>
                        <?php
                            require_once "classes/User.php";
                            $user = new User;

                            if(isset($_POST['register'])){
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $user_type = $_POST['user_type'];
                                $result = $user->save($username,$email,$password,$user_type);

                                if($result){
                                    echo "<script>window.location.replace('admin/users.php');</script>";
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>