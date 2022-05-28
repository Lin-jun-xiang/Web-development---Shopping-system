<?php
    echo '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="" />
                <meta name="author" content="" />
                <title>Shopping page</title>
                <!-- Favicon-->
                <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
                <!-- Bootstrap icons-->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
                <!-- Core theme CSS (includes Bootstrap)-->
                <link href="../css/shopHomePage.css" rel="stylesheet" />
            </head>
        <body>
        ';

    echo '<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Male favor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="./index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./shopPage.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="./logout.php">';

    session_start();
    if (isset($_SESSION["id"])) {
        echo $_SESSION["username"];
        echo '/SignOut';
    }
    else {
        echo 'SignIn';
    }

    echo '</a></li>
                </ul>
                <form class="d-flex" action="./cart.php" method="post">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Release Personality</h1>
                <p class="lead fw-normal text-white-50 mb-0">Adjust this shop hompeage template</p>
            </div>
        </div>
    </header>';

    require_once "../includes/dbh.inc.php";

    $sql = "SELECT * FROM item";
    $stmt = mysqli_stmt_init($connect);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    echo '<section class="py-1">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">';

    while ($row = mysqli_fetch_assoc($resultData)) {
        echo '<div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src=',$row["picture"],' alt="" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">',$row["name"],'</h5>
                            <!-- Product price-->
                            $',$row["price"],'
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="javascript:addCart(',$row["item_id"],');">Add to cart</a></div>
                    </div>
                </div>
            </div>';
    }

    echo '</div>
    </div>
    </section>';

    echo '<!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    <script src="../js/cart.js"></script>
    </body>
    </html>';
    mysqli_stmt_close($stmt);
?>