<?php
session_start();

include "../../fungsi/koneksi.php";

$id_transaksi= $_GET['idtransaksi'];
$hasil = mysqli_query("SELECT * FROM d_transaksi WHERE id_transaksi = '$idtransaksi'");
  
echo "<option>--pilih Jenis Transaksi--</option>";
 
while($w = mysqli_fetch_array($hasil)){
   	echo "<option value=$w[id_transaksi]> $w[id_user]</option>";
}
?>
