<?php

session_start();

    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'level' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed

        $cek = mysqli_query($koneksi,"SELECT nama_level FROM d_level WHERE nama_level = '$nama_level'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Level yang anda masukkan sudah ada. Periksa kembali data Level yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi,"INSERT INTO d_level(
                                    nama_level)
                            VALUES(
                                    '$_POST[nama_level]')") or die(mysqli_error());
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }
    //MODUL UBAH MERK
    elseif ($module == 'level' AND $act == 'ubah') {
        mysqli_query($koneksi,"UPDATE d_level SET 
         nama_level = '$_POST[nama_level]'
        WHERE id_level = '$_POST[id_level]'") ;
        header('location:../../index.php?modul=' . $module . '&pesan=ubah');

    } elseif ($module == 'level' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi,"DELETE FROM d_level WHERE id_level='$_GET[id]'");
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
