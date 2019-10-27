<?php
   
   require_once "header.php";
   require_once "../classes/Restaurant.php";
   $restaurants = new Restaurant;


?>

    <section class="main-block">
      <h2 class="mr-3">Restaurant List</h2>
      <table class="table table-striped mx-4">
          <thead class="bg-dark text-white">
              <tr>
                  <th>ID</th>
                  <th>Restaurant Name</th>
                  <th>Genre</th>
                  <th>City</th>
                  <th>URL</th>        
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php
                 $get_restaurants = $restaurants->selectAll();

                 if($get_restaurants){
                     foreach($get_restaurants as $key => $row){
                        $id = $row['restaurant_id'];
                        echo "<tr>";
                        echo "<td>".$row['restaurant_id']."</td>";
                        echo "<td>".$row['restaurant_name']."</td>";
                        echo "<td>".$row['genre_name']."</td>";
                        echo "<td>".$row['city_name']."</td>";
                        echo "<td>".$row['url']."</td>";?>
                        <td>
                        <a href="detail.php?restaurant_id=<?php echo $row['restaurant_id']; ?>" class='btn btn-primary btn-sm'>Detail</a>
                        <?php
                        echo "
                        <a href='edit_restaurant.php?restaurant_id=$id' class='btn btn-warning btn-sm'>Edit</a>";
                        ?>
                        <form method="POST" action="restaurant_action.php">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="restaurant_id" value="<?php echo $id; ?> ">
                        <button class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete?");'>Delete</button>
                     </form>
                        </td>
                        </tr>
    
                        <?php
                      }
                    }else{
                      echo "<tr><td colspan='7' class='text-center'>Nothing to show</td></tr>";
                    }
                ?>
          </tbody>
      </table>
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
