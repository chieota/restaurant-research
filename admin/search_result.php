<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>Listing &amp; Directory Website Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/18a4c41afe.js"></script>
</head>

<style>
.img-height{
    height:200px;
}

</style>

<body>
    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"><i class="fas fa-glass-cheers mr-1"></i>Gourmet Advisor</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-menu"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                               
                                    <li><a href="manage.php" class="btn btn-outline-light top-btn mx-2"><i class="fas fa-tasks mr-2"></i>Manage</span> </a></li>                                    
                                    <!-- <li><a href="#" class="btn btn-outline-light top-btn"><i class="fas fa-user-circle mr-2"></i>profile</span> </a></li> -->
                                    <li><a href="../logout.php" class="btn btn-outline-light top-btn mx-2"><i class="fas fa-user-times mr-2"></i>Logout</span> </a></li>
                                </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- content -->
    <section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Search Result</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                    require_once "../classes/Restaurant.php";

                    $restaurants = new Restaurant;
                    $city_id = $_GET['city'];
                    $genre_id = $_GET['genre']; 

                    $get_restaurants = $restaurants->searchResult($city_id,$genre_id);

                    if($get_restaurants){
                        foreach($get_restaurants as $key => $row){
                            $id = $row['restaurant_id'];
                            ?>
                <div class="col-md-4 featured-responsive">
                        <div class="featured-place-wrap">
                            <a href="detail.php?restaurant_id=<?php echo $row['restaurant_id']; ?>">
                                <img src="<?php echo 'data:'.$row['image_type'].';base64,'.base64_encode($row['image_data']); ?>" class="img-fluid img-height" alt="#"> 
                                <span class="featured-rating-orange">6.5</span>
                                <div class="featured-title-box">


                                <h6><?php echo $row['restaurant_name']?></h6>
                                <p value= ><?php echo $row['city_name']?></p> <span>• </span>
                                <p>3 Reviews</p> <span> • </span>
                                <p><span>$</span><?php echo $row['budget']?></p>
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p><?php echo $row['address']?></p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p><?php echo $row['tel'] ?></p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p><?php echo $row['url']?></p>
                                    </li>

                                </ul>
                                <div class="bottom-icons">
                                    <div class="closed-now">CLOSED NOW</div>
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            }
                    }else{
                        echo "Sorry no result";
                    }

                ?>
            </div>
        </div>
    </section>
    <!--//END FEATURED PLACES -->

        <!--============================= FOOTER =============================-->
        <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright &copy; 2018 Listing. All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <ul>
                            <li><a href="#"><span class="ti-facebook"></span></a></li>
                            <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                            <li><a href="#"><span class="ti-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--//END FOOTER -->




    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

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