<?php
include "koneksi.php";

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
      <h2 class="text-center">Cetak Barcode Product</h2>
      <form class="form-horizontal" method="GET" action="index.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="search">Cari Product:</label>
          <div class="col-sm-10">
            <input autocomplete="OFF" type="text" class="form-control" id="cari" name="cari">
            <br><input type="submit" value="Cari"><br><br>
          </div>
          <?php
          if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : " . $cari . "</b>";
          }
          ?>
          <table border='1' class="align-items-center" width='100%'>
            <thead>
              <tr>
                <td align='center'><b>No</b></td>
                <td align='center'><b>ID</b></td>
                <td align='center'><b>Kode Barcode</b></td>
                <td align='center'><b>Nama Product</b></td>
                <td align='center'><b>Harga</b></td>
                <td align='center'><b>Action</b></td>
              </tr>
            </thead>
            <tbody>

              <?php
              if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $sql = "SELECT * FROM item where id like '%" . $cari . "%' OR nama like '%" . $cari . "%'";
              } else {
                $sql = "SELECT * FROM item";
              }

              $query = $db->query($sql);
              $i = 0;
              while ($barang = $query->fetch_array(MYSQLI_BOTH)) {
                $i++;
                echo "<tr>";
                echo "<td align='center'>$i</td>";
                echo "<td align='center'>" . $barang['id'] . "</td>";
                echo "<td align='center'>" . $barang['barcode'] . "</td>";
                echo "<td>" . $barang['nama'] . "</td>";
                echo "<td align='center'>" . $barang['harga'] . "</td>";

                echo "<td align='center'>";
                echo "| <a href='chart.php?id=" . $barang['id'] . "'>Cetak</a> | ";


                // <?php
                echo "</td>";

                echo "</tr>";
              }
              ?>

            </tbody>
          </table>

          <p>Total: <?php echo mysqli_num_rows($query) ?></p>
        </div>
      </form>
    </div>
  </div>

</body>

</html>