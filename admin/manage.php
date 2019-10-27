<?php
    require_once "header.php";

?>

    <section class="main-block">
    <div class="container mt-5">
    <h2 class="mr-3">Management Page</h2>
        <table class="table table-striped mx-4">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Category</th>
                    <th>List</th>
                    <th>Add</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>User</td>
                    <td><a href='users.php' class='btn btn-info btn-sm'>List</a></td>
                    <td><a href='add_user.php' class='btn btn-info btn-sm'>Add</a></td>
                </tr>
                <tr>
                    <td>Restaurant</td>
                    <td><a href='restaurants.php' class='btn btn-info btn-sm'>List</a></td>
                    <td><a href='add_restaurant.php' class='btn btn-info btn-sm'>Add</a></td>
                </tr>
                <tr>
                    <td>Restaurant Genre</td>
                    <td><a href='genres.php' class='btn btn-info btn-sm'>List</a></td>
                    <td><a href='add_genre.php' class='btn btn-info btn-sm'>Add</a></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><a href='cities.php' class='btn btn-info btn-sm'>List</a></td>
                    <td><a href='add_city.php' class='btn btn-info btn-sm'>Add</a></td>
                </tr>
                <tr>
                    <td>Reservation</td>
                    <td><a href='reservations.php' class='btn btn-info btn-sm'>List</a></td>
                    <td><a href='add_reservation.php' class='btn btn-info btn-sm'>Add</a></td>
                </tr>
                <tr>
                    <td>Review</td>
                    <td><a href='reviews.php' class='btn btn-info btn-sm'>List</a></td>
                    <td><a href='add_review.php' class='btn btn-info btn-sm'>Add</a></td>
                </tr>


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