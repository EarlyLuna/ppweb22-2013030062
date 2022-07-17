<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    // kalau tidak ada id di query string
    header('Location: index.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM item WHERE id='$id'";
$query = mysqli_query($db, $sql);
$barang = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Barcode Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div style="margin: 10%;">
            <h2 class="text-center">PCetak Barcode Product</h2>
            <form class="form-horizontal" method="post" action="barcode.php" target="_blank">
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="id">Product ID:</label>
            <div class="col-sm-10">
                <input autocomplete="OFF" type="text" class="form-control" name="id" readonly value="<?php echo $barang['id'] ?> ">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="barcode">Kode BC:</label>
            <div class="col-sm-10">
                <input autocomplete="OFF" type="text" class="form-control" name="barcode" readonly value="<?php echo $barang['barcode'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nama">Nama</label>
            <div class="col-sm-10">
                <input autocomplete="OFF" type="text" class="form-control" name="nama" readonly value="<?php echo $barang['nama'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="harga">Harga</label>
            <div class="col-sm-10">
                <input autocomplete="OFF" type="text" class="form-control" name="harga" readonly value="<?php echo $barang['harga'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="print_qty">Barcode Quantity</label>
            <div class="col-sm-10">
                <input autocomplete="OFF" type="print_qty" class="form-control" id="print_qty" name="print_qty">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <br><button type="submit" class="btn btn-default">Cetak Price Tag</button>
            </div>
        </div>
        </form>
        <div class="col-sm-offset-2 col-sm-10">
            <a href="chart.php"><button class="btn btn-default" style="background-color:red; color:white">Kembali</button></a>
        </div>
    </div>

</body>

</html>