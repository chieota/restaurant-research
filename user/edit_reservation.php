<?php
    require_once "header.php";
    require_once "../classes/Reservation.php";

    $reservation = new Reservation;

    $id = $_GET['reservation_id'];
    $get_reservation = $reservation->selectOne($id);

    if(isset($_POST['submit'])){
        $reservation_id =$_POST['reservation_id'];
        $restaurant_id = $_POST['restaurant_id'];
        $date =$_POST['date'];
        $number_of_people = $_POST['number_of_people'];
        
        $result = update($restaurant_id,$date,$number_of_people,$id);
            if($result){
                echo "Successfull added!";
                header('Refresh:0');
            }else{
                echo "Unsuccessfully added! Please check the erro imediately";
            }

        }

    

    

?>

    <section class="main-block">
        <div class="container">
            <form action="reservation_action.php?action=update" enctype="multipart/form-data" method="post">
                <div class="row justify-content-center">
                    <div class="col-9 mt-5">
                        <div class="card">
                            <div class="card-header py-5 bg-dark">
                                <h3 class="text-light text-center ry-3">Edit Reservation</h3>
                            </div>
                            <div class="card-body">
                            <input  type="hidden" name="reservation_id" value="<?php echo $_GET['reservation_id']?>">
                            <div class="form-group">
                                <label for="">Restaurant Name</label>
                                <input type="text" name="restaurant_id" class="form-control" value="<?php echo $get_reservation['restaurant_name']?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">date</label>
                                <input type="date" name="date" class="form-control" value="<?php echo $get_reservation['date']?>">
                            </div>    
                            <div class="form-group">
                                <label for="">Number of people</label>
                                <input type="number" name="number_of_people" class="form-control" value="<?php echo $get_reservation['number_of_people']?>">
                            </div>  

                            <button type="submit" class="btn btn-primary btn-sm mt-3" name="submit">Edit</button>
                            <!-- <button type="delete" href='reservation_action.php?action=cancel&reservation_id=<?php echo $id; ?>'
                            class="btn btn-danger btn-sm mt-3"  onclick='return confirm("Are you sure to cancel reservation?");'>Cancel</button> -->
                            <button type="delete" class="btn btn-danger btn-sm mt-3" name="submit">Cancel</button>
                            <!-- <a href='reservation_action.php?action=delete&reservation_id=<?php echo $id; ?>'
                            class="btn btn-danger btn-m mt-3 mx-10"  onclick='return confirm("Are you sure to cancel reservation?");'>Cancel</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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