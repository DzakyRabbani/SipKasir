<?php

session_start();
    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'transaksi' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $tanggal = format_indotosql($_POST['tanggal']);
        
        $cek = mysqli_query($koneksi,"SELECT id_user FROM d_transaksi WHERE id_user = 'id_user'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Transaksi yang anda masukkan sudah ada. Periksa kembali data Transaksi yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi,"INSERT INTO d_transaksi(id_user,
                                    id_order,nama_user,tanggal,total_bayar)
                            VALUES(
                                    '$_POST[id_user]',
                                    '$_POST[id_order]',
                                    '$_POST[nama_user]',
                                    '$tanggal',
                                    '$_POST[total_bayar]')") or die(mysqli_error());

                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }

     elseif ($module == 'transaksi' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi,"DELETE FROM d_transaksi WHERE id_transaksi='$_GET[id]'");
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
