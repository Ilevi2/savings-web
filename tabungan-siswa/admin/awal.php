<?php 
require 'fungsi/fungsi.php';
if (!isset($_SESSION["idtabsis"])) {
  header("Location: login.php");
  exit();
}

foreach (summon_admin() as $adm): 


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?= url() ?>vendors/img/icon2.png">
<link rel="stylesheet" href="<?= url() ?>vendors/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= url() ?>vendors/css/bootstrap.min.css">

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    .footer-fixed {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="<?= url() ?>vendors/img/icon2big.png">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?m=awal">Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal">Siswa</a></li>
        <li><a href="index.php?m=kelas&s=awal">Kelas</a></li>
        <li><a href="index.php?m=tabungan&s=awal">Tabungan</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">

        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <img src="img/admin/<?= $adm['foto'];?>" height="50"> </i> <?php echo $adm['nama']; ?>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                 <a href="index.php?m=admin&s=profil"><i class="fa fa-user"></i> Profil</a>
                    
                
                </li><br>
                <li>
                  <a href="logout.php" onclick="return confirm('yakin ingin logout?');"> <i class="fa fa-sign-out"></i> Logout</a>
                 
                  
                </li>
              </ul>
            </li>
          </ul>
      </nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php?m=awal"><i class="fa fa-diamond" aria-hidden="true"></i>
Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal"><i class="fa fa-users" aria-hidden="true"></i>
Siswa</a></li>
        <li><a href="index.php?m=kelas&s=awal"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
Kelas</a></li>
        <li><a href="index.php?m=tabungan&s=awal"><i class="fa fa-book" aria-hidden="true"></i>

Tabungan</a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
      </ul><br>
    </div>
    <br>
   
      
   
    <div class="col-sm-9">
      <div class="well">
        <h4>Selamat Datang, <?= $adm['nama']; ?></h4>
       
      </div>
<!--       <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Jumlah Siswa</h4>
            <p><?php jumlah_siswa();  ?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Jumlah Tabungan</h4>
            <p><?php jumlah_tabungan();  ?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Jumlah Setoran</h4>
            <p><?= "Rp.".$uang['jsetoran'];?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Jumlah Penarikan</h4>
            <p><?= "Rp.".$uang['jpenarikan'];?></p> 
          </div>
        </div>
        <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Jumlah Saldo</h4>
            <p><?= "Rp.".$uang['jsaldo'];?></p> 
          </div>
        </div>  
        </div>
        
         
      </div> -->
      <div id="page-wrapper">
        <?php foreach (jumlah_tabungan() as $uang): ?>
              <div class="row">
                          <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <p><?php echo jumlah_siswa();?></p>
                                    <div>Jumlah Siswa</div>
                                </div>
                            </div>
                        </div>
                        <a href="?m=siswa&s=awal">
                            <div class="panel-footer"><!-- 
                                <span class="pull-left"><a href="?m=siswa&s=awal">Lihat Data</a></span> -->
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <p><?= $uang['jtab'];?></p>
                                <div>Jumlah Tabungan</div>
                                </div>
                            </div>
                        </div>
                        <a href="?m=tabungan&s=awal">
                            <div class="panel-footer">
                                <!-- <span class="pull-left"><a href="?m=tabungan&s=awal">Lihat Data</a></span> -->
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<!--                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cubes fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?= "Rp.".$uang['jsetoran'];?>
                                    <div>Jumlah Setoran</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?= "Rp.".$uang['jpenarikan'];?>
                                    <div>Jumlah Penarikan</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
                                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                 <?= rupiah($uang['jsaldo']);?>
                                    <div>Jumlah Saldo</div>
                                </div>
                            </div>
                        </div>
                        <a href="?m=tabungan&s=awal">
                            <div class="panel-footer">
                             
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              <?php endforeach; ?>
      </div>
        </div>

    </div>
  </div>
</div>
</div>
  <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
  <script src="<?= url() ?>vendors/js/bootstrap.min.js"></script> </body>
</html>
<?php endforeach; ?>
