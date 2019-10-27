<?php
    require_once "header.php";
    require_once "../classes/Restaurant.php";
    require_once "../classes/RestaurantImage.php";

    $restaurant = new Restaurant;
    $restaurantImage = new RestaurantImage;

    $id = $_GET['restaurant_id'];
    $get_restaurant = $restaurant->selectOne($id);
    $get_restaurant_image = $restaurantImage->selectOne($id);

    // if(isset($_POST['submit'])){
    //     $restaurant_id =$_POST['restaurant_id'];
    //     $restaurant_name =$_POST['restaurant_name'];
    //     $genre = $_POST['genre'];
    //     $city = $_POST['city'];
    //     $address = $_POST['address'];
    //     $tel = $_POST['tel'];
    //     $url = $_POST['url'];
    //     $budget = $_POST['budget'];

    //     $image_data =addslashes((file_get_contents($_FILES['top_image']['name'])));
    //     $top_image_properties = getimageSize($_FILES['top_image']['tmp_name']);
    //     $image_type = $top_image_properties['mime'];        

    //     $detail = $_POST['detail'];

     
    //     $restaurantImage->update($restaurant_id,$image_type,$image_data);        
    //     $result = update($restaurant_name,$genre,$city,$address,$tel,$url,$budget,$top_image_filename,
    //     $top_image_tmpname,$second_image_filename,$second_image_tmpname,$third_image_filename,$third_image_tmpname,$directory,$detail,$id);
    //         if($result){
    //             echo "Successfull added!";
    //             header('Refresh:0');
    //         }else{
    //             echo "Unsuccessfully added! Please check the erro imediately";
    //         }

    // }

?>

    <section class="main-block">
        <div class="container">
            <form action="restaurant_action.php" enctype="multipart/form-data" method="post">
                <div class="row justify-content-center">
                    <div class="col-9 mt-5">
                        <div class="card">
                            <div class="card-header py-5 bg-dark">
                                <h3 class="text-light text-center ry-3">Edit Restaurant</h3>
                            </div>
                            <div class="card-body">
                            <input  type="hidden" name="action" value="update">
                            <input  type="hidden" name="restaurant_image_id" value="<?php echo $get_restaurant_image['restaurant_image_id']?>">
                            <input  type="hidden" name="restaurant_id" value="<?php echo $_GET['restaurant_id']?>">
                            <div class="form-group">
                                <label for="">Restaurant Name</label>
                                <input type="text" name="restaurant_name" class="form-control" value="<?php echo $get_restaurant['restaurant_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="">Genre</label><br>
                                <select name="genre" value="<?php echo $get_restaurant['genre']?>">
                                <?php
                                require_once "../classes/Genre.php";
                                $genre = new Genre;
                                $get_genres = $genre->selectAll();
                                foreach($get_genres as $key => $row){
                                    $genre_id = $row['genre_id'];
                                    $genre_name = $row['genre_name'];
                                    echo "<option value='$genre_id'>$genre_name</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">City</label><br>
                                <select name="city" value="<?php echo $get_restaurant['city']?>">
                                <?php
                                    require_once "../classes/City.php";
                                    $city = new City;
                                    $get_cities = $city->selectAll();
                                    foreach($get_cities as $key => $row){
                                    $city_id = $row['city_id'];
                                    $city_name = $row['city_name'];
                                    echo "<option value='$city_id'>$city_name</option>";
                                }
                                 ?>
                                </select>
                            </div>    
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $get_restaurant['address']?>">
                            </div>    
                            <div class="form-group">
                                <label for="">Tel</label>
                                <input type="text" name="tel" class="form-control" value="<?php echo $get_restaurant['tel']?>">
                            </div>  
                            <div class="form-group">
                                <label for="">URL</label>
                                <input type="text" name="url" class="form-control" value="<?php echo $get_restaurant['url']?>">
                            </div>  
                            <div class="form-group">
                                <label for="">Budget</label>
                                <input type="number" name="budget" class="form-control" value="<?php echo $get_restaurant['budget']?>">
                            </div> 
                            <div class="form-group">
                                 <label for="">Image</label>
                                 <input type="file" name="top_image" id="" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="">Detail</label><br>
                                <textarea name="detail" id="" cols="85" rows="10" ><?php echo $get_restaurant['detail']?></textarea>
                            </div>  
                            <button type="submit" class="btn btn-primary btn-sm mt-3" name="register">Edit</button>
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