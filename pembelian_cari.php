<!--AIRLA ISMAIL-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
	include "connection/db.php";

	$cari = $_POST['cari'];
	$QuerySql = "SELECT *,harga_beli*jumlah_obat AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat AND obat.nama_obat LIKE '%$cari%'";

	$SQL = mysqli_query($connect, $QuerySql); 
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DATA PEMBELIAN</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col"><a href="s_pembelian_supplier.php"> ID PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_ko.php">KODE OBAT</a></th>
      <th scope="col"><a href="s_pembelian_nama.php">NAMA OBAT</a></th>
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th>
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th>
      <th scope="col"><a href="s_pembelian_kadaluarsa.php">TANGGAL KADALUARSA</a></th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[kode_supplier]</td>
						<td>$key[tanggal_beli]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[harga_beli]</td>
						<td>$key[jumlah_obat]</td>
						<td>$key[total]</td>
						<td>$key[tanggal_kadaluarsa]</td>
				</tr>";
                	
				}
		?>
</table>
</body>
</html>
