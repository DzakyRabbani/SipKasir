<?php
if ($_SESSION == NULL) {
    echo "<script>alert('Anda belum login, silahkan login untuk mengakses halaman administrator !.'); window.location = 'login.php'</script>";
} else {
    //NOTIFIKASI PESAN ERROR BERDASARKAN GET URL pesan
    include"fungsi/fungsi_pesan.php";
    //AKHIR NOTIFIKASI

    if ($_GET['modul'] == 'home') {
        include "modul/mod_home/home_admin.php";
    } elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL KARYAWAN
    elseif ($_GET['modul'] == 'petugas') {
        include "modul/mod_petugas/petugas.php";
    } elseif ($_GET['modul'] == 'tambah_petugas') {
        include "modul/mod_petugas/tambah_petugas.php";
    } elseif ($_GET['modul'] == 'ubah_petugas') {
        include "modul/mod_petugas/ubah_petugas.php";
    } elseif ($_GET['modul'] == 'hapus_petugas') {
        include "modul/mod_petugas/hapus_petugas.php";
    }

    //MODUL MASAKAN
    elseif ($_GET['modul'] == 'masakan') {
        include "modul/mod_masakan/masakan.php";
    } elseif ($_GET['modul'] == 'tambah_masakan') {
        include "modul/mod_masakan/tambah_masakan.php";
    } elseif ($_GET['modul'] == 'ubah_masakan') {
        include "modul/mod_masakan/ubah_masakan.php";
    } elseif ($_GET['modul'] == 'hapus_masakan') {
        include "modul/mod_masakan/hapus_masakan.php";
    }

    //MODUL LEVEL
    elseif ($_GET['modul'] == 'level') {
        include "modul/mod_level/level.php";
    } elseif ($_GET['modul'] == 'tambah_level') {
        include "modul/mod_level/tambah_level.php";
    } elseif ($_GET['modul'] == 'ubah_level') {
        include "modul/mod_level/ubah_level.php";
    } elseif ($_GET['modul'] == 'hapus_level') {
        include "modul/mod_level/hapus_level.php";
    }


    //MODUL USER
    elseif ($_GET['modul'] == 'user') {
        include "modul/mod_user/user.php";
    } elseif ($_GET['modul'] == 'tambah_user') {
        include "modul/mod_user/tambah_user.php";
    } elseif ($_GET['modul'] == 'ubah_user') {
        include "modul/mod_user/ubah_user.php";
    } elseif ($_GET['modul'] == 'hapus_user') {
        include "modul/mod_user/hapus_user.php";
    }

    //MODUL ORDER
     elseif ($_GET['modul'] == 'order') {
        include "modul/mod_order/order.php";
    } elseif ($_GET['modul'] == 'tambah_order') {
        include "modul/mod_order/tambah_order.php";
    } elseif ($_GET['modul'] == 'ubah_order') {
        include "modul/mod_order/ubah_order.php";
    } elseif ($_GET['modul'] == 'hapus_order') {
        include "modul/mod_order/hapus_order.php";
    }

    
    elseif ($_GET['modul'] == 'transaksi') {
        include "modul/mod_transaksi/transaksi.php";
    } elseif ($_GET['modul'] == 'tambah_transaksi') {
        include "modul/mod_transaksi/tambah_transaksi.php";
    } elseif ($_GET['modul'] == 'ubah_transaksi') {
        include "modul/mod_transaksi/ubah_transaksi.php";
    } elseif ($_GET['modul'] == 'hapus_transaksi') {
        include "modul/mod_transaksi/hapus_transaksi.php";
    }

    elseif ($_GET['modul'] == 'detailorder') {
        include "modul/mod_detailorder/detailorder.php";
    } elseif ($_GET['modul'] == 'tambah_detailorder') {
        include "modul/mod_detailorder/tambah_detailorder.php";
    } elseif ($_GET['modul'] == 'ubah_detailorder') {
        include "modul/mod_detailorder/ubah_detailorder.php";
    } elseif ($_GET['modul'] == 'hapus_detailorder') {
        include "modul/mod_detailorder/hapus_detailorder.php";
    }

    //MODUL PASSWORD
    elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL UBAH FOTO
    elseif ($_GET['modul'] == 'foto') {
        include "modul/mod_profil/foto_admin.php";
    }
}
?>
