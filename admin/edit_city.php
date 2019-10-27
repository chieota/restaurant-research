<?php
    require_once "header.php";
    require_once "../classes/City.php";

    $city = new City;
    $id = $_GET['city_id'];
    $get_city = $city->selectOne($id);

?>
    <section class="main-block">
        <div class="container mt-5">
            <form action="city_action.php?action=update" method="post">
                <div class="row justify-content-center">
                    <div class="col-8 mt-5">
                        <div class="card">
                            <div class="card-header py-5 bg-dark">
                                <h3 class="text-light text-center py-3">Edit City</h3>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="city_id" value="<?php echo $_GET['city_id']?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City" name="city_name" value="<?php echo $get_city['city_name']?>">
                                    </div>
                                    <button type="submit" class="btn btn-outline-danger btn-sm mt-3" name="update">Edit</button>
                                </form>
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
