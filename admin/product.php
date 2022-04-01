<?php
session_start();
if($_SESSION['nama'] == ''){
    header("Location: ../login.php");
}
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
    <title>My Product</title>
</head>
<style>
    body{
        background-image: url("slider/celler.jpg");
    }
    .login{
        padding-top: 3%;
        padding-bottom: 3%;
    }
    .white-c{
        background-color: white;
        height: 100%;
        width: 100%;
    }
    .box-login{
        display: flex;
        flex-direction: column;
        padding-top: 40px;
    }
    .btn{
        width: 75%;
        height: 8vh;
    }
    .input{
        padding-left: 85px;
    }
    td img{
        width: 20vw;
        height: 30vh;
        border-radius: 15px 15px;
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
                <a class="navbar-brand" href="index.php">Shalz Collection</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

    </header>

    <section class="login">
        <div class="container white-c">
                    <?php
                        
                        include_once("../koneksi.php");

                        $ses_id = $_SESSION['id'];
                        $query = mysqli_query($conn, "SELECT * FROM anggota WHERE id='$ses_id' ");
                        while($data = mysqli_fetch_array($query)){
                        
                    ?>
            <div class="box-login">
                <center><h1>Halo <?php echo $data['nama']; ?></h1></center>
                <form action="" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php

                        $no = 1;
                        $ses_nama = $_SESSION['nama'];
                        $query = mysqli_query($conn, "SELECT * FROM content WHERE nama_seller='$ses_nama' ");
                        while($data = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td hidden><?php echo $data['id'] ?></td>
                                <td><img src="slider/<?php echo $data['foto']; ?>" alt=""></td>
                                <td><?php echo $data['nama_produk'] ?></td>
                                <td><?php echo $data['deskripsi'] ?></td>
                                <td><?php echo $data['kategori'] ?></td>
                                <td><?php echo $data['harga'] ?></td>
                                <td>
                                    <a href="edit.php?id_item=<?php echo $data['id'] ?>" class="btn btn-warning mb-3">Edit</a>
                                    <a href="delete.php?id_item=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </form>
                <?php } ?>
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
    $password = $_POST['password'];
    $email = $_POST['email'];
    $level_akses = $_POST['level_akses'];

    $update = mysqli_query($conn, "UPDATE `anggota` SET `nama` = '$nama', `username` = '$username',
     `password` = '$password', `email` = '$email', `level_akses` = '$level_akses' WHERE `id` = '$id'");
    header("Location: index.php");
}

?>