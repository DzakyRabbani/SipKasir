<?php
$aksi = "modul/mod_order/aksi_order.php";

$query = mysqli_query($koneksi, "select * from d_order");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=order">Data Order</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Data Order</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_order"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 7%; text-align: center;">
                            No.
                        </th>
                          <th style="width: 8%; text-align: center;">
                            No Meja
                        </th>
                         <th style="width: 15%; text-align: center;">
                            Tanggal
                        </th>
                        <th style="width: 15%; text-align: center;">
                            Id User
                        </th>
                        <th style="width: 15%; text-align: center;">
                            Nama User
                        </th>
                        <th style="width: 18%; text-align: center;">
                            Ket.
                        </th>
                        <th style="width: 15%; text-align: center;">
                            Status Order
                        </th>
                        <th style="width: 10%; text-align: center;">
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
                            <td style="text-align: center;"><?php echo $i++; ?></td>
                            <td style="text-align: center;"><?php echo $data['no_meja']; ?></td>
                            <td style="text-align: center;"><?php echo format_date($data['tanggal']); ?>
                            <td style="text-align: center;"><?php echo $data['id_order']; ?></td>
                            <td style="text-align: center;"><?php echo $data['nama_pembeli']; ?></td>
                            <td style="text-align: center;"><?php echo $data['keterangan']; ?></td>
                            <td style="text-align: center;"><?php echo $data['status_order']; ?></td>    
                            </td>
                            <td>
                                <a href="<?php echo $aksi . '?modul=order&&act=hapus&&id=' . $data['id_order']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


