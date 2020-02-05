<?php
session_start();

include "../../fungsi/koneksi.php";

$idmerk= $_GET['iduser'];
$hasil = mysqli_query("SELECT * FROM d_user WHERE id_user = '$iduser'");
  
echo "<option>--pilih Nama--</option>";
 
while($w = mysqli_fetch_array($hasil)){
   	echo "<option value=$w[id_user]> $w[nama_user]</option>";
}
?>
