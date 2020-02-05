<?php
$aksi = "modul/mod_user/aksi_user.php";

$id_user = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM d_user
                               WHERE id_user = $id_user")or die(mysqli_error());
$hasil = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=user">User</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Ubah User</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal"   method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=user&act=ubah">
                <input type="hidden" value="<?php echo $data['id_user']; ?>" name="id_user" id="id"/>
                <fieldset>

                     <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" value="<?php echo $data['username'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="text" name="password" value="<?php echo $data['password'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama User</label>
                        <div class="controls">
                            <input type="text" name="nama_user" value="<?php echo $data['nama_user'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>

                      <div class="control-group">
                        <label class="control-label">Id Level</label>
                        <div class="controls">
                            <select name="id_level" onchange='changeValueNama(this.value)' class="form-field">
                                <option value="<?php echo $data['id_level'];?>">
                                    <?php echo $data['id_level'];?>
                                    </option>
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
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->