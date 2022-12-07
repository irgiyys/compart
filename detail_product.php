<?php
include("./functions/koneksi.php");
include("./functions/session.php");
include("./functions/cutword.php");
user();
$id = $_GET['id'];
// $query = "SELECT p.*, s.fullname FROM product AS p JOIN seller AS s ON (p.seller_id = s.id) WHERE deleted_at IS NULL ORDER BY p.discount DESC";

$query = "SELECT p.*, pi.quantity, pi.sold, s.fullname
          FROM product AS p 
          JOIN product_inventory AS pi 
                ON (p.inventory_id = pi.id)
          JOIN seller AS s
                ON (p.seller_id = s.id) WHERE p.id = '$id'";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
if ($product === null) {
    header("location:index.php");
    exit;
}

$idInventory = $product["inventory_id"];
$fullname = $_SESSION["fullname"];
$name = $product["name"];
$desc = $product["desc"];
$category = $product["category"];
$merk = $product["merk"];
$price = $product["price"];
$discount = $product["discount"];
$picture = $product["picture"];
$sold = $product["sold"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
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
            <div class="navbar-nav px-4 sm:align-items-center align-items-end">
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
    <div class="container-fluid mt-large px-md-5">
        <!-- navigasi -->
        <nav>
            <a class="text-decoration-none" href="index.php">Home </a>
            <p class="d-inline text-capitalize"> > <?= $category ?> > </p>
            <p class="d-inline text-capitalize"><?= cutword($name,30) ?></p>
        </nav>
        <div class="row my-4">
            <div class="col-md-4">
                <div class="border rounded d-flex justify-content-center w-fit overflow-hidden">
                    <img class="image-product hover-zoom" src="./assets/images/products/<?= $picture ?>" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <h4 class="d-inline text-capitalize"> <?= $name ?></h4>
                <!-- $product["price"] - ($product["discount"] / 100 * $product["price"] -->
                <h6 class="pt-2">Sold <?= $sold ?></h6>
                <h3 class="pt-4">$<?= $price - $discount / 100 * $price ?></h3>
                <?php if($discount > 0) : ?>
                    <span class="p-1 rounded bg-danger fw-semibold text-white"><?= $discount ?>%</span>
                    <p class="d-inline mx-1 text-decoration-line-through">$<?= $price ?></p>
                <?php endif ?>
                <div class="border-top border-bottom my-4 py-2">
                    <h6 class="py-2">Details</h6>
                    <p class="fs-mb my-1">Category : 
                        <span class="text-altprimary fw-semibold"><?= $category ?> </span>
                    </p>
                    <p class="fs-mb">Merk: 
                        <span class="text-altprimary fw-semibold"><?= $merk ?> </span>
                    </p>
                    <p><?= $desc ?></p>
                </div>
                <div class="d-flex align-items-end">    
                    <img src="./assets/svg/user.svg" alt="user" width="20" height="20">
                    <h6 class="px-2 m-0 d-inline">
                        <?= $product["fullname"] ?>
                    </h6>
            </div>
            </div>
                <div class="col">
                    <div class="border rounded p-4">
                        <h5>Set amount</h5>
                        <div class="d-flex align-items-center">
                            <img class="image-thumbnail" src="./assets/images/products/<?= $picture ?>" alt="<?= $name ?>">
                            <p class="fs-mb"><?= cutword($name,20,"") ?></p>
                        </div>
                    </div>
                </div>
        </div>    
    </div>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>