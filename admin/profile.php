<?php
    session_start();
    require_once "header.php";
    require_once "../classes/User.php";

    $user = selectOne($_SESSION['id']);

?>


  <body>
  <section>
  <div class="container mt-5">
        <div class="row">
            <div class="col-md-9">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-clock">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Name</label><br>
                            <input type="text" class="form-control" name="username" value="<?php echo $users['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label><br>
                            <input type="email" class="form-control" name="email" value="<?php echo $users['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">User Profile</label>
                            <input type="file" name="user_image" id="" class="form-control">
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </form>
                </div>
                </div>
            <div class="col-md-3">
                <h3><?php echo $_SESSION['name'];?></h3>
                <?php echo "<img src='".$user['user_image']."' width='400' />"; ?>

            </div>
        </div>
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