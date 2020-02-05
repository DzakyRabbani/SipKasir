<?php

session_start();

    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'user' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed

        $cek = mysqli_query($koneksi,"SELECT username FROM d_user WHERE username = '$username'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Username yang anda masukkan sudah ada. Periksa kembali data Username yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi,"INSERT INTO d_user(
                                    username,password,nama_user,id_level)
                            VALUES(
                                    '$_POST[username]',
                                    '$_POST[password]',
                                    '$_POST[nama_user]',
                                    '$_POST[id_level]')") or die(mysqli_error());
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }
    //MODUL UBAH MERK
    elseif ($module == 'user' AND $act == 'ubah') {
        mysqli_query($koneksi,"UPDATE d_user SET 
         username = '$_POST[username]',
         password     = '$_POST[password]' , 
         nama_user = '$_POST[nama_user]',
         id_level = '$_POST[id_level]'
        WHERE id_user = '$_POST[id_user]'") ;
        header('location:../../index.php?modul=' . $module . '&pesan=ubah');

    } elseif ($module == 'user' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi,"DELETE FROM d_user WHERE id_user='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?modul=' . $module . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?modul=$module';
                </script>";
            }
    }

?>
