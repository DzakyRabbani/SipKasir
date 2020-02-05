<?php
session_start();

include "../../fungsi/koneksi.php";

$idmerk= $_GET['idmasakan'];
$hasil = mysqli_query("SELECT * FROM d_masakan WHERE id_masakan = '$idmasakan'");
  
echo "<option>--pilih Jenis Masakan--</option>";
 
while($w = mysqli_fetch_array($hasil)){
   	echo "<option value=$w[id_masakan]> $w[nama_masakan]</option>";
}
?>
