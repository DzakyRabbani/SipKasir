<?php
$aksi = "modul/mod_order/aksi_order.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=order">Data Order</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Order</h2>
        </div>

         



        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=order&act=tambah" method="post">
                <fieldset>

                   

                    <div class="control-group">
                        <label class="control-label">No Meja</label>
                        <div class="controls">
                            <input type="text" id="no_meja" name="no_meja" class="form-field">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tanggal</label>
                        <div class="controls">
                            <input type="text" name="tanggal" value="<?php echo date("d/m/Y");?>"  class="form-field datepicker"">
                            <span></span>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label">Id User</label>
                        <div class="controls">
                           <select name="id_user" class="form-control" class="form-control form-control-md" id="" onchange='changeValueNama(this.value)' required="required">
                            <option value="" disabled="disabled" selected="selected"> Id User</option>
                            <?php
                                $con = mysqli_connect("localhost", "root","", "db_kasir");
                                $query=mysqli_query($con, "select * from d_user order by id_user asc");
                                $result = mysqli_query($con, "select * from d_user");
                                $jsArrayNama = "var idTipe = new Array();\n";
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="id_user"  value="' . $row['id_user'] . '">' . $row['id_user'] . '</option>';
                                $jsArrayNama .= "idTipe['" . $row['id_user'] . "'] = 
                                {
                                nama_user :'".addslashes($row['nama_user'])."'};\n";
                                }
                            ?>
                </select>
                            <span></span>
                        </div>
                    </div>                   

                    <div class="control-group">
                        <label class="control-label">Nama User</label>
                        <div class="controls">
                            <input type="text" id="nama_user" name="nama_user" class="form-field" readonly="readonly">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <input type="text" id="keterangan" name="keterangan" class="form-field">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Status Order</label>
                        <div class="controls">
                            <input type="text" id="status_order" name="status_order" class="form-field">
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
             <script type="text/javascript">
        <?php echo $jsArrayNama; ?>
        function changeValueNama(id_user){
            console.log(id_user);
            console.log(idTipe);
            document.getElementById('nama_user').value = idTipe[id_user].nama_user;    
        }
        </script>
        </div>
    </div><!--/span-->
</div><!--/row-->