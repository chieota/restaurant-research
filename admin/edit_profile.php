<?php
    session_start();
    require_once "header.php";
    require_once "../classes/User.php";

    $user = new User;

    $id = $_SESSION['user_id'];
    $get_user = $user->selectOne($id);

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email =$_POST['email'];
        
        $result = update($esername,$email,$id);
            if($result){
                echo "Successfull added!";
                header('Refresh:0');
            }else{
                echo "Unsuccessfully added! Please check the erro imediately";
            }
    }
?>


  <body>
  <section class="main-block">
    <div class="container">
        <form action="user_action.php" enctype="multipart/form-data" method="post">
                <div class="row justify-content-center">
                    <div class="col-md-9 mt-5">
                        <div class="card-header py-5 bg-dark">
                            <h3 class="text-light text-center ry-3">Edit Profile</<i class="fas fa-h3    "></i>
                        </div>
                        <div class="card-body">
                              <input  type="hidden" name="action" value="update">
                               <input  type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <div class="form-group">
                                    <label for="">Name</label><br>
                                    <input type="text" class="form-control" name="username" value="<?php echo $get_user['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label><br>
                                    <input type="email" class="form-control" name="email" value="<?php echo $get_user['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="top_image" id="" class="form-control">
                                </div> 

                                <input type="submit" value="submit" name="submit" class="btn btn-primary">
                        </div>
                        </div>

                </div>
            </form>
        </div>
    </section>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>  
</body>
</html>