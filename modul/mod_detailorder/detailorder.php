<?php
$aksi = "modul/mod_detailorder/aksi_detailorder.php";

$query = mysqli_query($koneksi, "select * from detail_order");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=detailorder">Detail Order</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Detail Order</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_detailorder"><i class="icon-plus icon-white"></i> Tambah</a>
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
                            Id Order
                        </th>
                         <th style="width: 15%; text-align: center;">
                            Id Masakan
                        </th>
                        <th style="width: 15%; text-align: center;">
                            Keterangan
                        </th>
                        <th style="width: 15%; text-align: center;">
                            Status Detail
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
                            <td style="text-align: center;"><?php echo $data['id_order']; ?></td>
                             <td style="text-align: center;"><?php echo $data['id_masakan']; ?></td>
                              <td style="text-align: center;"><?php echo $data['keterangan']; ?></td>
                            <td style="text-align: center;"><?php echo $data['status_detail_order']; ?></td>    
                            </td>
                            <td>
                                <a href="modul/mod_detailorder/faktur_detailorder.php<?php echo '?id=' . $data['id_detail_order']; ?>" class="btn btn-info">Cetak Faktur</a>
                                <a href="<?php echo $aksi . '?modul=detailorder&&act=hapus&&id=' . $data['id_detail_order']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


