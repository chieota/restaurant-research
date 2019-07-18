<?php
    require_once "../classes/Restaurant.php";

    $restaurant = new Restaurant;
    $id = $_GET['restaurant_id'];
    $get_restaurant = $restaurant->selectOne($id);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Restaurant</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <form action="restaurant_action.php?action=update" method="post">
            <div class="row justify-content-center">
                <div class="col-9 mt-5">
                    <div class="card">
                        <div class="card-header py-5 bg-success">
                            <h3 class="text-light text-center py-3">Edit Restaurant</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <input type="hidden" name="restaurant_id" value="<?php echo $_GET['restaurant_id']?>">
                                <div class="form-group">
                                    <label>Restaurant Name</label>
                                    <input type="text" class="form-control" name="restaurant_name" value="<?php echo $get_restaurant['restaurant_name']?>">
                                </div>
                                <div class="form-group">
                                    <label>Genre</label>
                                    <select name="genre" id="" class="form-control" value="<?php echo $get_restaurant['genre']?>" >
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
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country" value="<?php echo $get_restaurant['country']?>">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="<?php echo $get_restaurant['city']?>">
                                 </div>
                                 <div class="form-group">
                                     <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $get_restaurant['address']?>">
                                 </div>
                                 <div class="form-group">
                                     <label>Bussinessday</label>
                                    <input type="text" class="form-control" name="bussinessday" value="<?php echo $get_restaurant['bussinessday']?>">
                                 </div>
                                <div class="form-group">
                                    <label>Budget</label>
                                    <input type="text" class="form-control" name="budget" value="<?php echo $get_restaurant['budget']?>">
                                </div>

                                <button type="submit" class="btn btn-outline-success btn-sm mt-3" name="update">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>