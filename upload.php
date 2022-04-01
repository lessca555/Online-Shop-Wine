<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("koneksi.php");
    
    
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <tr>
            <td><input type="text" name="id" hidden></td><br>
            <td>Nama : <input type="text" name="nama_produk"></td><br>
            <td>Seller : <input type="text" name="nama_seller"></td><br>
            <td>Desc : <input type="text" name="deskripsi"></td><br>
            <td><input type="file" name="foto" id="foto"></td><br>
            <td>Price : <input type="text" name="harga"></td><br><br>
        <button type="submit" name="Submit">Submit</button>
        </tr>
    </form>
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

    $filename = $_FILES["foto"]["name"];
    $tempname = $_FILES["foto"]["tmp_name"];
    $folder = "slider/".$filename;


    // $foto = upload();

    $insert = mysqli_query($conn, "INSERT INTO `content`(`id`, `nama_produk`, `nama_seller`,`deskripsi`, `foto`, `harga`) 
                                   VALUES('', '$nama_produk', '$nama_seller', '$deskripsi', '$filename', '$harga')");

    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}



?>