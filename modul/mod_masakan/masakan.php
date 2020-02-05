<?php
$aksi = "modul/mod_masakan/aksi_masakan.php";

$query = mysqli_query($koneksi, "select * from d_masakan");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=masakan">Merk</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Masakan</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_masakan"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 10%;">
                            No.
                        </th>
                        <th style="width: 20%;">
                            Nama Masakan
                        </th>
                        <th style="width: 20%;">
                            Harga
                        </th>
                        <th style="width: 20%;">
                            Status
                        </th>
                        <th style="width: 25%;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama_masakan']; ?></td>
                            <td><?php echo format_money($data['harga']); ?></td>
                            <td><?php echo $data['status_masakan']; ?></td>
                            <td>
                                <a href="index.php?modul=ubah_masakan&&id=<?php echo $data['id_masakan']; ?>" class="btn btn-info" ><i class="icon-edit icon-white"></i>Ubah</a>
                                <a href="<?php echo $aksi . '?modul=masakan&&act=hapus&&id=' . $data['id_masakan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


