<?php
$aksi = "modul/mod_masakan/aksi_masakan.php";

$id_masakan = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM d_masakan
                               WHERE id_masakan = $id_masakan")or die(mysqli_error());
$hasil = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=masakan">Masakan</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Ubah Masakan</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal"   method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=masakan&act=ubah">
                <input type="hidden" value="<?php echo $data['id_masakan']; ?>" name="id_masakan" id="id"/>
                <fieldset>

                     <div class="control-group">
                        <label class="control-label">Nama Masakan</label>
                        <div class="controls">
                            <input type="text" name="nama_masakan" value="<?php echo $data['nama_masakan'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">Harga</label>
                        <div class="controls">
                            <input type="text" name="harga" value="<?php echo $data['harga'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status Masakan</label>
                        <div class="controls">
                            <input type="text" name="status_masakan" value="<?php echo $data['status_masakan'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->