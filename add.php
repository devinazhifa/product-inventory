<?php
  // Include database file
  include 'product.php';
  $produkObj = new Produk();
  // Insert Record in produk table
  if(isset($_POST['submit'])) {
    $produkObj->insertData($_POST);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Product Inventory</h4>
</div><br> 
<div class="container">
  <form action="add.php" method="POST">
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <input type="text" class="form-control" name="nama_barang" placeholder="Nama barang" required="">
    </div>
    <div class="form-group">
      <label for="kode_barang">Kode Barang</label>
      <input type="text" class="form-control" name="kode_barang" placeholder="Kode barang" required="">
    </div>
    <div class="form-group">
      <label for="jumlah">Jumlah</label>
      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required="">
    </div>
    <div class="form-group">
      <label for="tanggal">Tanggal</label>
      <input type="date" class="form-control" name="tanggal" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>