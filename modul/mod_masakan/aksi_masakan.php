<?php

session_start();

    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'masakan' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $nama_masakan = trimed($_POST['nama_masakan']);

        $cek = mysqli_query($koneksi,"SELECT nama_masakan FROM d_masakan WHERE nama_masakan = '$nama_masakan'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Masakan yang anda masukkan sudah ada. Periksa kembali data Masakan yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi,"INSERT INTO d_masakan(
                                    nama_masakan,harga,status_masakan)
                            VALUES(
                                    '$_POST[nama_masakan]',
                                    '$_POST[harga]',
                                    '$_POST[status_masakan]')") or die(mysqli_error());
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }
    //MODUL UBAH MERK
    elseif ($module == 'masakan' AND $act == 'ubah') {
	$nama_masakan = trimed($_POST['nama_masakan']);
        mysqli_query($koneksi,"UPDATE d_masakan SET 
         nama_masakan = '$nama_masakan',
         harga     = '$_POST[harga]' , 
         status_masakan = '$_POST[status_masakan]'
        WHERE id_masakan = '$_POST[id_masakan]'") ;
        header('location:../../index.php?modul=' . $module . '&pesan=ubah');

    } elseif ($module == 'masakan' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi,"DELETE FROM d_masakan WHERE id_masakan='$_GET[id]'");
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
