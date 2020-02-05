<?php
$aksi = "modul/mod_detailorder/aksi_detailorder.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=detailorder">Detail Order</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Detail Order</h2>
        </div>

        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=detailorder&act=tambah" method="post">
                <fieldset>

                     <div class="control-group">
                        <label class="control-label">Id Order</label>
                        <div class="controls">
                           <select name="id_order" class="form-control" class="form-control form-control-md" id="" onchange='changeValueOrder(this.value)' required="required">
                            <option value="" disabled="disabled" selected="selected"> Id Order</option>
                            <?php
                                $con = mysqli_connect("localhost", "root","", "db_kasir");
                                $query=mysqli_query($con, "select * from d_order order by id_order asc");
                                $result = mysqli_query($con, "select * from d_order");
                                $jsArrayOrder = "var idOrder = new Array();\n";
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="id_order"  value="' . $row['id_order'] . '">' . $row['id_order'] . '</option>';
                                $jsArrayOrder .= "idOrder['" . $row['id_order'] . "'] = 
                                {
                                 keterangan:'" . addslashes($row['keterangan']) .
                                    "',    
                                status_detail_order :'".addslashes($row['status_order'])."'};\n";
                                }
                            ?>
                </select>
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Id Masakan</label>
                        <div class="controls">
                           <select name="id_masakan" class="form-control" class="form-control form-control-md" id="" onchange='changeValueMasakan(this.value)' required="required">
                            <option value="" disabled="disabled" selected="selected"> Id Masakan</option>
                            <?php
                                $con = mysqli_connect("localhost", "root","", "db_kasir");
                                $query=mysqli_query($con, "select * from d_masakan order by id_masakan asc");
                                $result = mysqli_query($con, "select * from d_masakan");
                                $jsArrayMasakan = "var idMasakan = new Array();\n";
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="id_masakan"  value="' . $row['id_masakan'] . '">' . $row['id_masakan'] . '</option>';
                                $jsArrayMasakan .= "idMasakan['" . $row['id_masakan'] . "'] = 
                                {
                                stat:'".addslashes($row['stat'])."'};\n";
                                }
                            ?>
                </select>
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
                        <label class="control-label">Status Detail</label>
                        <div class="controls">
                            <input type="text" id="status_detail_order" name="status_detail_order" class="form-field">
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
        <?php echo $jsArrayOrder; ?>
        function changeValueOrder(id_order){
            console.log(id_order);
            console.log(idOrder);
            document.getElementById('keterangan').value = idOrder[id_order].keterangan;
            document.getElementById('status_detail_order').value = idOrder[id_order].status_detail_order;    
        }
        </script>
        </div>
    </div><!--/span-->
</div><!--/row-->