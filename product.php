<?php
	class Produk
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "produk";
		public  $con;
		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}
		// Insert product data into produk table
		public function insertData($post)
		{
			$nama_barang = $this->con->real_escape_string($_POST['nama_barang']);
			$kode_barang = $this->con->real_escape_string($_POST['kode_barang']);
			$jumlah = $this->con->real_escape_string($_POST['jumlah']);
			$tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
			$query="INSERT INTO produk(nama_barang,kode_barang,jumlah,tanggal) VALUES('$nama_barang','$kode_barang','$jumlah','$tanggal')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg1=insert");
			}else{
			    echo "Input failed try again!";
			}
		}
		// Fetch produk records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM produk";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}
		// Fetch single data for edit from produk table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM produk WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}
		// Update customer data into produk table
		public function updateRecord($postData)
		{
		    $nama_barang = $this->con->real_escape_string($_POST['unama_barang']);
		    $kode_barang = $this->con->real_escape_string($_POST['ukode_barang']);
			$jumlah = $this->con->real_escape_string($_POST['ujumlah']);
			$tanggal = $this->con->real_escape_string($_POST['utanggal']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE produk SET nama_barang = '$nama_barang', kode_barang = '$kode_barang', jumlah = '$jumlah', tanggal = '$tanggal' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
			    echo "Product updated failed try again!";
			}
		    }
			
		}
		// Delete produk data from produk table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM produk WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
	}
?>