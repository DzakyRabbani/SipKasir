<?php
$aksi = "modul/mod_level/aksi_level.php";
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
            <h2><i class="icon-edit"></i> Tambah Level</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=level&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Nama Level</label>
                        <div class="controls">
                            <input type="text" name="nama_level" class="form-field">
                            <span></span>
                        </div>
                    </div>
                   
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button id="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->