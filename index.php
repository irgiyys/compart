<?php
include("./functions/session.php");
include("./functions/koneksi.php");
user();
$fullname = $_SESSION["fullname"];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="css/custom.min.css" />
    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-white fixed-top ">
    <div class="container-fluid px-md-5 py-2">
            <a class="navbar-brand fs-5 m-0 fw-semibold font-fair" href="index.php"> compart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav px-4">
                <form action="search.php" method="post">
                    <div class="input-group">
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">                            
                            <button type="submit" class="input-group-text btn btn-gray rounded-end m-0" id="inputGroup-sizing-sm">
                                <img src="./assets/svg/search.svg" alt="search"/>
                            </button>
                        </div>
                    </form>
                    <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                    </datalist>
                    <li class="nav-item dropdown px-md-5 py-2 py-md-0">
                        <a class="nav-link dropdown-toggle after-none" href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                            <?= $fullname ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item d-flex justify-content-around" href="profile_seller.php"> 
                                <span>Profile</span><img src="./assets/svg/chevron-right.svg" alt="right">
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-around" href="./functions/logout.php">
                                <span>Logout</span>
                                <img src="./assets/svg/chevron-right.svg" alt="right"></a>
                            </li>
                        </ul>
                    </li>
                    <a class="nav-link" href="#">
                    <img class="" src="./assets/svg/shopping-cart.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid px-md-5 mt-large">
        <!-- carousel -->
        <div>
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="./assets/images/photo-1.webp" class="d-block rounded w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="./assets/images/photo-2.webp" class="d-block rounded w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="./assets/images/photo-3.webp" class="d-block rounded w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>      
        </div>
        <!-- end carousel -->
        <div class="my-5">
            <h3>Choose by Category</h3>
        </div>
    </div>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
