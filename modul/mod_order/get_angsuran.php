<?php
session_start();

include "../../fungsi/koneksi.php";

$id_order= $_GET['idorder'];
$hasil = mysqli_query("SELECT * FROM d_motor WHERE id_order = '$idorder'");
  
echo "<option>--pilih Jenis Order--</option>";
 
while($w = mysqli_fetch_array($hasil)){
   	echo "<option value=$w[id_order]> $w[no_meja]</option>";
}
?>
