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
    <title>Edit Item</title>
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
        height: 75vh;
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
                        
                        $id_item = $_GET['id_item'];
                        $query = mysqli_query($conn, "SELECT * FROM content WHERE id='$id_item' ");
                        while($data = mysqli_fetch_array($query)){
                        
                    ?>
            <div class="box-login">
                <center><h1>Halo <?php if($_SESSION['nama']){
                    echo $_SESSION['nama'];
                }; ?></h1></center>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 row mt-3 input" hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" id="id" value="<?php echo $data['id']; ?>" name="id">
                        </div>
                    </div>
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" id="nama" value="<?php echo $data['nama_produk']; ?>" name="nama_produk">
                        </div>
                    </div>
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" id="username" value="<?php echo $data['nama_seller']; ?>" name="nama_seller" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row mt-3 input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" id="password" value="<?php echo $data['deskripsi']; ?>" name="deskripsi">
                        </div>
                    </div>
                    <div class="mb-3 row input">
                        <div class="col-sm-10">
                            <input type="file" class="form-control m-auto" id="email" value="<?php echo $data['foto']; ?>" name="foto">
                        </div>
                    </div>
                    <div class="mb-3 row input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" id="akses" value="<?php echo $data['kategori']; ?>" name="kategori">
                        </div>
                    </div>
                    <div class="mb-3 row input">
                        <div class="col-sm-10">
                            <input type="text" class="form-control m-auto" id="akses" value="<?php echo $data['harga']; ?>" name="harga">
                        </div>
                    </div>
                    <button type="submit" name="Submit" class="mt-1 btn btn-dark">Edit</button>
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
    $msg = "";

    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $nama_seller = $_POST['nama_seller'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    $filename = $_FILES["foto"]["name"];
    $tempname = $_FILES["foto"]["tmp_name"];
    $folder = "slider/".$filename;


    // $foto = upload();

    $insert = mysqli_query($conn, "UPDATE `content` SET `nama_produk` = '$nama_produk', `nama_seller` = '$nama_seller',
    `deskripsi` = '$deskripsi', `foto` = '$filename', `kategori` = '$kategori', `harga` = '$harga' WHERE `id` = '$id'");

    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    header("Location: index.php");
}
?>