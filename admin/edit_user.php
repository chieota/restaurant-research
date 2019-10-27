<?php
    require_once "header.php";
    require_once "../classes/User.php";

    $user = new User;
    $id = $_GET['user_id'];
    $get_user = $user->selectOne($id);
    $selectedtype = $get_user['user_type'];

?>

    <section class="main-block">
    <div>
        <form action="user_action.php?action=update" method="post"> 
            <div class="row justify-content-center">
                <div class="col-8 mt-5">
                    <div class="card">
                        <div class="card-header py-5 bg-dark">
                        <h3 class="text-light text-center py-3">Edit User</h3>
                        </div>
                        <div class="card-body">
                            <input  type="hidden" name="user_id" value="<?php echo $_GET['user_id']?>">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $get_user['username']?>">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $get_user['email']?>">
                            </div>
                                <label>User type</label><br>
                                <select name="user_type">
                                    <?php 
                                        if($selectedtype == 'admin'){
                                    ?>
                                            <option value="admin" selected>Admin</option>
                                            <option value="user">User</option>                                            
                                    <?php    }else{
                                    ?>
                                         <option value="admin">Admin</option>
                                         <option value="user" selected>User</option>    
                                    <?php
                                    }
                                    ?>

                                </select>
                                <br>
                                <br>

                        <input type="submit" value="Edit" name="action" class="btn btn-primary btn-genre">
                        </div>
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
     <?php
      require_once "footer.php";
    ?>
