<?php
$aksi = "modul/mod_user/aksi_user.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=masakan">User</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah User</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=user&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" class="form-field">
                            <span></span>
                        </div>
                    </div>
                   
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="text" name="password" class="form-field">
                            <span></span>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label">Nama User</label>
                        <div class="controls">
                            <input type="text" name="nama_user" class="form-field">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Id Level</label>
                        <div class="controls">
                            <select name="id_level" onchange='changeValueNama(this.value)' class="form-field">
                                <option value="">-- Pilih Id Level --</option>
                                <?php
                                $con = mysqli_connect("localhost", "root","", "db_kasir");
                                $query=mysqli_query($con, "select * from d_level order by nama_level asc");
                                $result = mysqli_query($con, "select * from d_level");
                                $jsArrayNama = "var idTipe = new Array();\n";
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="id_level"  value="' . $row['id_level'] . '">' . $row['id_level'] . '</option>';
                                $jsArrayNama .= "idTipe['" . $row['id_level'] . "'] = 
                                {
                                harga:'".addslashes($row['harga'])."'};\n";
                                }
                            ?>
                            </select>
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