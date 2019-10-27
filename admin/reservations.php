<?php
  require_once "header.php";
  require_once "../classes/Reservation.php";
  $reservations = new Reservation;

?>
    <section class="main-block">
      <div class="container">
      <h2 class="mr-3">Manage Reservation</h2>
      <table class="table table-striped mx-4">
          <thead class="bg-dark text-white">
             <tr>
                 <th>Reservation NO</th>
                 <th>Restaurant Name</th>
                 <th>Date</th>
                 <th>Number of people</th>
                 <th>Action</th>
             </tr>
          </thead>
          <tbody>
          <?php
                 $get_reservations = $reservations->selectAll();

                 if($get_reservations){
                     foreach($get_reservations as $key => $row){
                        $id = $row['reservation_id'];
                        echo "<tr>";
                        echo "<td>".$row['reservation_id']."</td>";
                        echo "<td>".$row['restaurant_name']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['number_of_people']."</td>";
                        echo "<td>
                        <a href='edit_reservation.php?reservation_id=$id' class='btn btn-info btn-sm'>Edit</a>";
                        ?>
                        <a href='reservation_action.php?action=delete&reservation_id=<?php echo $id; ?>'
                        class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete?");'>Delete</a>
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