<?php
    session_start();

    require_once "header.php";
    require_once "../classes/Review.php";

    $review = new Review;
    $id = $_GET['review_id'];

    $get_review = $review->selectOne($id);

?>

    <section class="main-block">
    <div>
        <form action="review_action.php?action=update" method="post"> 
            <div class="row justify-content-center">
                <div class="col-6 mt-5">
                    <div class="card">
                        <div class="card-header py-5 bg-dark">
                        <h3 class="text-light text-center py-3">Edit Review</h3>
                        </div>
                        <div class="card-body">
                            <input  type="hidden" name="review_id" value="<?php echo $_GET['review_id']?>">
                            <input type="hidden" name="restaurant_id" value="<?php echo $get_review['restaurant_id'] ?>">
                            <div class="form-group">
                                <label for="">Restaurant Name</label>
                                <input type="text" name="restaurant_name" class="form-control" value="<?php echo $get_review['restaurant_name']?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Score</label>
                                <input type="number" name="score" class="form-control" value="<?php echo $get_review['score']?>">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" class="form-control" value="<?php echo $get_review['price']?>">
                            </div>
                            <div class="form-group">
                                <label>Comment</label><br>
                                <textarea name="comment" id="" cols="70" rows="10"><?php echo $get_review['comment']?></textarea>
                            </div>

                        <input type="submit" name="action" value="Edit" class="btn btn-primary btn-genre">
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