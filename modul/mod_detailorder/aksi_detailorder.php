<?php

session_start();
    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'detailorder' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $tanggal = format_indotosql($_POST['tanggal']);
        
        $cek = mysqli_query($koneksi,"SELECT id_order FROM detail_order WHERE id_order = 'id_order'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Transaksi yang anda masukkan sudah ada. Periksa kembali data Transaksi yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi,"INSERT INTO detail_order(id_order,
                                    id_masakan,keterangan,status_detail_order)
                            VALUES(
                                    '$_POST[id_order]',
                                    '$_POST[id_masakan]',
                                    '$_POST[keterangan]',
                                    '$_POST[status_detail_order]')") or die(mysqli_error());

                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }

     elseif ($module == 'detailorder' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi,"DELETE FROM detail_order WHERE id_detail_order='$_GET[id]'");
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
