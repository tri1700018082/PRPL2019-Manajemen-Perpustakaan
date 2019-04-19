<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<title>Perpustakaan UAD - Transaksi</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
  <div class="header">
   
    <div id="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li class="selected"><a href="transaksi.php">Transaksi</a></li>
        <li><a href="datapeminjam.php">Data Peminjam</a></li>
         <li><a href="databuku.php">Data Buku</a></li>
         <li><a href="staff.php">Data Pustakawan</a></li>
        
        
      </ul>
    </div>
  </div>
      <div class="center_content">
    <div class="left_content">

       <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Pencarian</div>
       <br><br>
      <li id="cari">

        <form method="post" action="pencarian.php">
         
          <input type="text" name="cari" />
          <input type="submit" name="kirim" value="cari" />
          
        </form>
      </li>
      <br><br>
      <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Data Transaksi</div>
    <table id="table_id" border="5" align="center" width="850px">
        <thead align="center">

      <?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY kodetransaksi DESC");
?>


        
            <tr>
       <th>Kode Transaksi</th><th>ID Peminjam</th><th>Kode Buku</th>  <th>Tanggal Peminjaman</th><th>Tanggal Pengembalian</th><th>Opsi</th>
    </tr>
        </thead>
        <tbody>
        <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        
         echo "<td>".$user_data['kodetransaksi']."</td>";
         echo "<td> <a href ='datapeminjam.php?id=".$user_data['idpeminjam']."'>".$user_data['idpeminjam']."</a></td>";
         echo "<td> <a href ='databuku.php?id=".$user_data['kodebuku']."'>".$user_data['kodebuku']."</a></td>";
          echo "<td>".$user_data['tglpinjam']."</td>"; 
          echo "<td>".$user_data['tglkembali']."</td>"; 
         
        echo "<td><a href='edit.php?kodetransaksi=$user_data[kodetransaksi]'>Edit</a> | <a href='delete.php?kodetransaksi=$user_data[kodetransaksi]'>Delete</a></td></tr>";   

    }
    ?>

    </tbody>
    </table>
   
      <form action="transaksi.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
          <div class="form_subtitle">Membuat Data Transaksi</div>
          <form name="Add" href="">
            <div class="form_row">
              <td><label class="contact"> <strong>Kode Transaksi</strong></label></td>
        <td><input type="int" class="contact_input" name="kodetransaksi"></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>ID Peminjam</strong></label></td>
        <td><input type="int" class="contact_input" name="idpeminjam"></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Kode Buku</strong></label></td>
        <td><input type="int" class="contact_input" name="kodebuku"></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Tanggal Peminjaman</strong></label></td>
        <td><input type="date" class="contact" name="tglpinjam"></td>
      </tr>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Tanggal Pengembalian</strong></label></td>
        <td><input type="date" class="contact" name="tglkembali"></td>
            </div>
           
           <tr> 
            <div class="form_row">
             <center><td><input type="submit" name="Submit" value="Add"></td></center>
            </div>
          </tr>
        </table>
          </form>
          <center>
  <?php
 

  if(isset($_POST['Submit'])) {
    
    $kodetransaksi = $_POST['kodetransaksi'];
   
    $idpeminjam = $_POST['idpeminjam'];
     $kodebuku = $_POST['kodebuku'];
   
   
    $tglpinjam = $_POST['tglpinjam'];
     $tglkembali = $_POST['tglkembali'];
    

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO transaksi(kodetransaksi,idpeminjam,kodebuku,tglpinjam,tglkembali) VALUES('$kodetransaksi','$idpeminjam','$kodebuku','$tglpinjam','$tglkembali')");
    
    echo "User added successfully.<br> 
    <a href='transaksi.php'>View Users</a>";
  }
  ?>
</center>       
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!--end of center content-->
  </div>
</div>
</body>
</html>
