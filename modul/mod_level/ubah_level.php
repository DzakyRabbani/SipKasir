<?php
$aksi = "modul/mod_level/aksi_level.php";

$id_level = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM d_level
                               WHERE id_level = $id_level")or die(mysqli_error());
$hasil = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=level">Level</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Ubah Level</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal"   method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=level&act=ubah">
                <input type="hidden" value="<?php echo $data['id_level']; ?>" name="id_level" id="id"/>
                <fieldset>

                     <div class="control-group">
                        <label class="control-label">Nama Level</label>
                        <div class="controls">
                            <input type="text" name="nama_level" value="<?php echo $data['nama_level'];?>" class="form-field">
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