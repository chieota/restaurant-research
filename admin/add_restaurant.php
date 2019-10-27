<?php
  require_once "header.php";
?>

        <section class="main-block">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-8 mt-5">
                  <div class="card">
                      <div class="card-header py-5 mb-2 bg-dark">
                          <h3 class="text-light text-center py-3">Add Restaurant</h3>
                      </div>
                      <div class="card-body">
                      <form action="restaurant_action.php" enctype="multipart/form-data" method="post">
                      <input  type="hidden" name="action" value="add">
                      <div class="form-group">
                          <label>Restaurant Name</label>
                          <input type="text" class="form-control" placeholder="Restaurant Name" name="restaurant_name">
                      </div>
                      <div class="form-group">
                          <label >Genre</label>
                          <select name="genre" id="" class="form-control">
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
                            <label>City</label>
                            <select name="city" id="" class="form-control">
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
                            <label>Address</label>
                          <input type="text" class="form-control" placeholder="Address" name="address">
                          </div>
                          <div class="form-group">
                          <label>Tel</label>  
                          <input type="text" class="form-control" placeholder="Phone Number" name="tel">
                          </div>
                          <div class="form-group">
                          <label>URL</label>
                          <input type="text" class="form-control" placeholder="URL" name="url">
                          </div>
                          <div class="form-group">
                          <label >Budget</label>
                          <input type="text" class="form-control" placeholder="Budget" name="budget">
                          </div>
                          <div class="form-group">
                             <label for="">Top Image</label>
                             <input type="file" name="top_image" id="" class="form-control" >
                           </div> 
                          <div class="form-group">
                          <label>Detail</label>
                          <textarea name="detail" id=""rows="5" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="">Add Date</label>
                            <input type="date" name="add_date" class="form-control">
                          </div>
                          <input type="submit" value="Add" class="btn btn-danger">
                          </form>
                        </div>
                      </div>
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
    <?php
      require_once "footer.php";
    ?>