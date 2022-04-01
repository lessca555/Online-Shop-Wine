<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d508f9c7b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Shalz</title>
</head>

<style>
    .content-1{
    margin-top: 30px;
    }

    .content-1 img{
        padding-left: 0;
        width: 20vw;
        height: 30vh;
    }

    .card{
        margin-right: 50px;
        margin-bottom: 50px;
    }

    footer{
        background-color: white;
        height: 10vh;
    }
    footer .container{
        display: flex;
    }

    footer .contact{
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <header>
    <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Shalz Collection</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <section class="slider">
        <div class="container mt-3 mb-3">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="slider/chateau-lafite.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Chateau Lafite 1787</h5>
                        <p>A finest collection of the Noble House Rothschild.</p>
                        <a href="login.php" class="btn btn-dark">Login to order</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="slider/penfolds.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Penfolds Grange Hermitage 1951</h5>
                        <p>Fermented from 1951 a geniune Australian red wine with amazing taste, makes you fly into the nine realm</p>
                        <a href="login.php" class="btn btn-dark">Login to order</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="slider/screaming_eagle.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Screaming Eagle Cabernet 1992</h5>
                        <p>Special taste of nobility, makes your bank account screaming like an eagle</p>
                        <a href="login.php" class="btn btn-dark">Login to order</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="box1">
                    <h1><i>Top 4 Products</i></h1>
                    <div class="line"></div>
                    <div class="row mt-4">
                        <?php
                        
                        include_once("koneksi.php");

                        $query = mysqli_query($conn, "SELECT * FROM content WHERE kategori='top-6'");
                        while($data = mysqli_fetch_array($query)){
                        
                        ?>

                        <div class="card" style="width: 18rem;">
                            <div hidden><?php echo $data['id']; ?></div>
                            <img src="slider/<?php echo $data['foto']; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['nama_produk']; ?></h5>
                            </div>
                            <div class="card-body">
                                <a href="login.php" class="btn btn-dark mb-3">Login to order</a>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
        
    </section>

    <section class="content-1">
        <div class="container">
            <div class="box-2">
                <h1><i>Local pride</i></h1>
                <div class="line-2"></div>
                <div class="row mt-4">
                <?php
                        
                include_once("koneksi.php");

                $query = mysqli_query($conn, "SELECT * FROM content WHERE kategori='Lokal'");
                while($data = mysqli_fetch_array($query)){
                
                ?>

                <div class="card" style="width: 18rem;">
                    <div hidden><?php echo $data['id']; ?></div>
                    <img src="slider/<?php echo $data['foto']; ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['nama_produk']; ?></h5>
                    </div>
                    <div class="card-body">
                        <a href="login.php" class="btn btn-dark mb-3">Login to order</a>
                    </div>
                </div>

                <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <h1>Owner Contact : </h1>
            <div class="contact mx-3 mt-1">
                <a href="https://www.instagram.com/christariot_/"><i class="fa-brands fa-instagram fa-2xl mb-4">christariot_</i></a>
                <a href="https://www.facebook.com/christiansasep/"><i class="fa-brands fa-facebook fa-2xl">Christian</i></a>
            </div>
            
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>