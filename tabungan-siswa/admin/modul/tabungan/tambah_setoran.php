<?php 
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm): 

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("Y-m-d");

  if (isset($_POST['simpan'])) {
    tambah_setoran();
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Setoran</title>
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
        <li><a href="index.php?m=awal">Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal">Siswa</a></li>
        <li><a href="index.php?m=kelas&s=awal">Kelas</a></li>
        <li class="active"><a href="index.php?m=tabungan&s=awal">Tabungan</a></li>
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
      <img src="<?= url() ?>vendors/img/icon2big.png">
             <ul class="nav nav-pills nav-stacked">
        <li><a href="index.php?m=awal"><i class="fa fa-diamond" aria-hidden="true"></i>
Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal"><i class="fa fa-users" aria-hidden="true"></i>
Siswa</a></li>
        <li><a href="index.php?m=kelas&s=awal"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
Kelas</a></li>
        <li class="active"><a href="index.php?m=tabungan&s=awal"><i class="fa fa-book" aria-hidden="true"></i>

Tabungan</a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <!-- Button trigger modal -->
 


       <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <form action="" method="POST">
               <div class="form-group">
              
              <input type="hidden" name="id_tabungan">
            </div>
              <div class="form-group">
              <label>Id Tabungan</label>
              <input type="text" id="id_tabungan" class="form-control" name="id_tabungan" readonly><span class="input-group-btn">
        <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal">Cari ID Tabungan</button>
        </span>
            </div>
            <div class="form-group">
              <label>Id Siswa</label>
              <input type="text" class="form-control" id="id_siswa" name="id_siswa" readonly>

            </div>
              <div class="form-group">
              <label>Nama Siswa</label>
              <input type="text" class="form-control" id="nama" name="nama" readonly>
            </div>
             <div class="form-group">
              <label>Kelas</label>
              <input type="text" class="form-control" id="kelas" name="kelas" readonly>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="text" name="tanggal" value="<?= $tanggalSekarang;?>" id="tanggal" readonly class="form-control">
            </div>

            <div class="form-group">
              <label>Jumlah setoran</label>
              <input type="number" name="setoran" id="setoran"  class="form-control">
            </div>



            <div class="form-group">
              <label>Saldo Anda</label>
              <input type="text" class="form-control" id="saldo" readonly name="saldo">
            </div>
             <i><b><span id="message2" style="color: red;"></span></b></i>
            <div class="form-group">
              <button class="btn btn-success" id="endButton" name="simpan">Simpan</button>
              <button class="btn btn-danger">Batal</button>
            </div>
            <script type="text/javascript">
                
                    var saldo = document.getElementById('saldo')
                    var setoran = document.getElementById('setoran')


                    setoran.addEventListener('keyup', function(){
                      if(setoran.value == ""){
                        message2.textContent = 'Kolom tidak boleh kosong!'
                        document.getElementById('endButton').disabled = true;
                      }else if (setoran.value) {
                        message2.textContent = ''
                        document.getElementById('endButton').disabled = false;
                      }
                    })


                  </script>
                          </form>           
                        </div>
                       

          </div>
           
        </div>

      </div> 


    </div>
  </div>
</div>

<!-- modal -->
  <div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form role="form" id="form-tambah" method="post" action="input.php">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Siswa</h3>
          </center>
        </div>
          <div class="modal-body">
            
            
            
            
              <table width="100%" class="table table-hover"  id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Tabungan</th>
                                        <th>Id Siswa</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>tanggal</th>
                                        <th>saldo</th>
                                        <!--<th>Jenis Kelamin</th>
                                        <th>Tempat</th>
                                        <th>Alamat</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                      $no = 1;
                      $data = mysqli_query ($koneksi, " SELECT  *
                                            from 
                                            tb_tabungan
                                            order by id_tabungan ASC");
                      foreach ($data as $sa):
                        
                      
                    ?>
                  <tr id="tb_tabungan" data-id_tabungan="<?= $sa['id_tabungan'];?>" data-id_siswa="<?= $sa['id_siswa'];?>" data-nama="<?= $sa['nama'];?>" data-kelas="<?= $sa['kelas'];?>" data-tanggal="<?= $sa['tanggal'];?>" data-saldo="<?= $sa['saldo'];?>">
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $sa['id_tabungan']; ?>
                    </td>
                    <td>
                      <?php echo $sa['id_siswa']; ?>
                    </td>
                    <td>
                      <?php echo $sa['nama']; ?>
                    </td>
                    <td>
                      <?php echo $sa['kelas']; ?>
                    </td>
                    <td>
                      <?php echo $sa['tanggal']; ?>
                    </td>
                    <td>
                      <?php echo $sa['saldo']; ?>
                    </td>
                    
                  </tr>
                  <?php
                    endforeach;
                  ?>
                            </table>
            
            
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
      </div>
    </div>
  </div>
</div>
  <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
  <script src="<?= url() ?>vendors/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      
      $(document).on('click', '#tb_tabungan', function (e) {
        document.getElementById("id_tabungan").value = $(this).attr('data-id_tabungan');
        document.getElementById("id_siswa").value = $(this).attr('data-id_siswa');
        document.getElementById("nama").value = $(this).attr('data-nama');
        document.getElementById("kelas").value = $(this).attr('data-kelas');
        document.getElementById("tanggal").value = $(this).attr('data-tanggal');
        document.getElementById("saldo").value = $(this).attr('data-saldo');
        $('#modal').modal('hide');
      }); 
      
    });
    </script>
   </body>
</html>
<?php endforeach; ?>
