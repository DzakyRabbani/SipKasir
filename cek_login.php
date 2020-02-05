<?php
include "fungsi/koneksi.php";

$username = $_POST['username'];
$password     = $_POST['password'];

$login=mysqli_query($koneksi,"SELECT * FROM d_user
        WHERE username='$username' AND password='$password'")or die(mysql_error());
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";

  $_SESSION['id_user']     = $r['username'];
  $_SESSION['nama_user']   = $r['nama_user'];
  $_SESSION['passuser']    = $password;
  $_SESSION['id_level']    = $r['id_level'];
  //$_SESSION['foto']            = $r['foto_admin'];
  

  // session timeout
  $_SESSION['login'] = 1;
  timer();

  $sid_lama = session_id();

  session_regenerate_id();

  $sid_baru = session_id();

  header('location:index.php?modul=home');
}
else{
  echo "<script>alert('Username/ Password yang anda masukkan salah, silahkan coba kembali !.'); window.location = 'index.php'</script>";
}
?>
