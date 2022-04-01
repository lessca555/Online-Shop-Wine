<?php
ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d508f9c7b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<style>
    body{
        background-image: url("slider/celler.jpg");
    }
    .login{
        padding-top: 5%;
    }
    .white-c{
        background-color: white;
        height: 50%;
        width: 50%;
    }
    .box-login{
        display: flex;
        flex-direction: column;
        padding-top: 40px;
    }
    .btn{
        margin-left: 80px;
        width: 75%;
        height: 8vh;
        border-radius: 25px 25px;
    }
    .input{
        padding-left: 85px;
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <section class="login">
        <div class="container white-c">
            <div class="box-login pb-3 mb-3">
                <center><h1>Sign Up</h1></center>
                <form action="" method="POST">
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" placeholder="id" name="id" hidden>
                        </div>
                    </div>
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" placeholder="nama" name="nama">
                        </div>
                    </div>
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" placeholder="username" name="username">
                        </div>
                    </div>
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" placeholder="email" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row input">
                        <div class="col-sm-10">
                            <input type="password" class="form-control m-auto" placeholder="password" name="password">
                        </div>
                    </div>
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <?php require_once "koneksi.php";
                            $query = mysqli_query($conn, "SELECT * FROM level_akses WHERE level_akses = 'user' ");
                            while($data = mysqli_fetch_array($query)){ ?>
                            <input readonly type="text" class="form-control m-auto" name="level_akses" value="<?php echo $data['level_akses']; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" name="Submit" class="mt-1 btn btn-dark">Register</button>
                </form>
                
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
</body>
</html>
<?php 

if(isset($_POST['Submit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level_akses = $_POST['level_akses'];

    $insert = mysqli_query($conn, "INSERT INTO `anggota`(`id`, `nama`,`username`, `email`, `password`, `level_akses`) 
                                   VALUES('$id', '$nama', '$username', '$email', '$password', '$level_akses');");
    header("Location: index.php");
}

?>