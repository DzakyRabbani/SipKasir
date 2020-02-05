    <ul class="nav nav-tabs nav-stacked main-menu">
    <?php if ($_SESSION['id_level'] == 1 ) { ?>
         <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Data Master</li>
       
        <li><a class="ajax-link" href="index.php?modul=masakan"><i class="icon-tag"></i><span class="hidden-tablet"> Data Masakan</span></a></li>
        <li><a class="ajax-link" href="index.php?modul=user"><i class="icon-tag"></i><span class="hidden-tablet"> Data User</span></a></li>
        <li><a class="ajax-link" href="index.php?modul=level"><i class="icon-tag"></i><span class="hidden-tablet"> Data Level</span></a></li>

        <li class="nav-header hidden-tablet">Transaksi</li>

          <li><a class="ajax-link" href="index.php?modul=order"><i class="icon-list"></i><span class="hidden-tablet"> Data Order</span></a></li>
          <li><a class="ajax-link" href="index.php?modul=transaksi"><i class="icon-list"></i><span class="hidden-tablet"> Data Transaksi</span></a></li>
          <li><a class="ajax-link" href="index.php?modul=detailorder"><i class="icon-list"></i><span class="hidden-tablet"> Detail Order</span></a></li>

    <?php }



      elseif ($_SESSION['id_level'] == 2) { ?>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Data Master</li>
       
        <li><a class="ajax-link" href="index.php?modul=user"><i class="icon-tag"></i><span class="hidden-tablet"> Data User</span></a></li>
        <li class="nav-header hidden-tablet">Transaksi</li>

          <li><a class="ajax-link" href="index.php?modul=order"><i class="icon-list"></i><span class="hidden-tablet"> Data Order</span></a></li>
          <li><a class="ajax-link" href="index.php?modul=detailorder"><i class="icon-list"></i><span class="hidden-tablet"> Detail Order</span></a></li>
    <?php } 

    elseif ($_SESSION['id_level'] == 3) { ?>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Data Master</li>
       
        <li><a class="ajax-link" href="index.php?modul=user"><i class="icon-tag"></i><span class="hidden-tablet"> Data User</span></a></li>
        <li class="nav-header hidden-tablet">Transaksi</li>

           <li><a class="ajax-link" href="index.php?modul=transaksi"><i class="icon-list"></i><span class="hidden-tablet"> Data Transaksi</span></a></li>
          <li><a class="ajax-link" href="index.php?modul=detailorder"><i class="icon-list"></i><span class="hidden-tablet"> Detail Order</span></a></li>
    <?php } 

    elseif ($_SESSION['id_level'] == 4) { ?>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Transaksi</li>

          <li><a class="ajax-link" href="index.php?modul=detailorder"><i class="icon-list"></i><span class="hidden-tablet"> Detail Order</span></a></li>
    <?php } 

    elseif ($_SESSION['id_level'] == 5) { ?>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Transaksi</li>
         <li><a class="ajax-link" href="index.php?modul=order"><i class="icon-list"></i><span class="hidden-tablet"> Data Order</span></a></li>
         
    <?php }     

    ?>




</ul>