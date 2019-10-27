<?php
    require_once "header.php";

  
?>
<section class="main-block">
    <div class="container mt-5">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-clock">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Name</label><br>
                                <input type="text" class="form-control-label" name="user_name" value="<?php echo $user['user_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label><br>
                                <input type="email" class="form-control-label" name="user_email" value="<?php echo $user['user_email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Bio</label><br>
                                <textarea name="" id="" cols="60" rows="5"></textarea>
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