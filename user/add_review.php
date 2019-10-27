<?php
    session_start();

    require_once "header.php";
    require_once "../classes/Restaurant.php";
    $restaurant = new Restaurant;
    $id = $_GET['restaurant_id'];
    $get_restaurant = $restaurant->selectOne($id);

?>
  <body>
    <section class="main-block">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-8 mt-5">
            <div class="card">
              <div class="card-header py-5 my-2 bg-dark">
                <h3 class="text-light text-center py-3">Post Review</h3>
              </div>
              <div class="card-body">
                <form action="review_action.php?action=add" method="post">
                <input  type="hidden" name="restaurant_id" value="<?php echo $_GET['restaurant_id']?>">    
                <div class="form-group">
                    <label>Restaurant Name</label>
                    <input type="text" class="form-control" name="restaurant_name" value="<?php echo $get_restaurant['restaurant_name']; ?>" disabled>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Score(1~5)" name="score">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Price($)" name="price">
                </div>
                <div class="form-group">
               <textarea name="comment" id="" cols="75" rows="10" placeholder="comment"></textarea>
               </div>
                <input type="submit" value="Add" class="btn btn-danger" name="action">
                </form>
              </div>
            </div> 
          </div> 
        </div> 
      </div> 
    </section>
  </body>

      
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
<?php
      require_once "footer.php";
    ?>