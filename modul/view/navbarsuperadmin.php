<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            </button>
          <a class="navbar-brand" >Data Sekolah</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav \">
            <li><a href="default.php?uri=modul/view/navbardepan" target="blank">HOME</a></li>
             <li><a href="default.php?uri=admin/siswa/lihat">Siswa</a></li>
             <li><a href="default.php?uri=admin/sekolah/lihat">Sekolah</a></li>
             <li><a href="default.php?uri=admin/akreditasi/lihat">Akreditasi</a></li>
             <li><a href="default.php?uri=admin/jurusan/lihat">Jurusan</a></li>
             <li><a href="default.php?uri=admin/waktu/lihat">Waktu</a></li>
             <li><a href="default.php?uri=admin/wilayah/lihat">Wilayah</a></li>
             <li><a href="default.php?uri=admin/fakta/lihat">Fakta</a></li>
             <li><a href="default.php?uri=admin/manajemen_user/menejemenuser">Menejemen User</a></li>
                     <!-- <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Beranda</a></li>
                  <li><a href="#">Info sekolah</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>-->
                </ul>
              </li>
              
          </ul>
          <ul class="nav navbar-nav navbar-right">
             <?php
              session_start();
              if(isset($_SESSION['namasekolah'])){
              ?>
              <li class="active"> <a><i class="glyphicon glyphicon"></i> <?php echo $_SESSION['namasekolah'];?> </a></li>
                   <li> <a href="default.php?uri=modul/login/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                   
              <?php

              }
              else{
              session_destroy();?>
              <li><a href="default.php?uri=modul/login/logindaftar"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
                <?php
                }
              ?>
          </ul>
             <!-- <li class="active">
             <a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li class="active"><a href="masuk.php">LOG IN</a></li>
            
        </div><!--/.nav-collapse -->
      </div>
    </nav>      