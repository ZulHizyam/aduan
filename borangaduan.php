<?php
     
    require 'connection.php';
    require 'Data.php';
    if ( !empty($_POST)) {
        // keep track validation errors
        $namaError = null;
        $noError = null;
        $jkerosakanError = null;
        $kerosakanError = null;
        $lokasiError = null;
        $catatanError = null;
        $jawatanError = null;
         
        // keep track post values
                $nama                   = ($_POST['nama']);
                $no                     = ($_POST['no']);
                $jkerosakan             = ($_POST['jenis_kerosakan']);
                $kerosakan              = ($_POST['kerosakan']);
                $lokasi                 = ($_POST['lokasi']);
                $catatan                = ($_POST['catatan']);
                $jawatan                = ($_POST['jawatan']);
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $namaError = 'Masukkan Nama';
            $valid = false;
        }
         
        if (empty($no)) {
            $noError = 'Masukkan No.Kad Pengenalan';
            $valid = false;
        }
         
        if (empty($jkerosakan)) {
            $jkerosakanError = 'Masukkan Barang Yang Telah Rosak';
            $valid = false;
        }
        if (empty($kerosakan)) {
            $kerosakanError = 'Masukkan Peralatan';
            $valid = false;
        }
        if (empty($lokasi)) {
            $lokasiError = 'Berikan Lokasi Barang Tersebut';
            $valid = false;
        }
        if (empty($catatan)) {
            $catatanError = 'Masukkan Tarikh';
            $valid = false;
        }
        if (empty($jawatan)) {
            $jawatanError = 'Berikan Status Barang Tersebut';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO item (nama, no, jkerosakan, kerosakan, lokasi, catatan, jawatan) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nama, $no, $jkerosakan, $kerosakan, $lokasi, $catatan, $jawatan));
            Database::disconnect();
            header("Location: index.html");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Borang Aduan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/agency.css">
  <link rel="stylesheet" href="./css/agency.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
input[type=text], select {
    width: 70%;
    padding: 12px 10px;
    margin: 50px 150;
    display:block;
    border: 5px solid #ccc;
    border-radius:0px;
    box-sizing: block;
}

input[type=submit] {
    width: 10%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 15px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #f50000;
}

div {
    background-color: #f2f2f2;
    padding: 5px;
}
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
    .main{
        
    }
    
    input[type=kotak] {
    width: 60%;
    color: white;
    padding: 80px 20px;
    margin: 150px 0px;
    border: none;
     border: 5px solid #ccc;
    cursor: pointer;
}
    
</style>
</head>
<body>

<img src="./img/download.png" class="img-circle" style="width:25%;" alt="images">
<style>
div.a {
    text-align: center;
} 
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-20 col-md-offset-0">
            <?php
            if(isset($_POST['submit'])) {
                $nama                   = trim($_POST['nama']);
                $no                     = trim($_POST['no']);
                $jkerosakan             = trim($_POST['jenis_kerosakan']);
                $kerosakan              = trim($_POST['kerosakan']);
                $lokasi                 = trim($_POST['lokasi']);
                $catatan                = trim($_POST['catatan']);
                $jawatan                = trim($_POST['jawatan']);
                

                $insertItem = new Item();
                $rtnInsertItem = $insertItem->INSERT_ITEM($nama, $no, $jkerosakan, $kerosakan, $lokasi, $catatan, $jawatan);
            }
            ?>
<h1>Borang Aduan Kerosakan Peralatan Komputer</h1>
<body>
    
<h4>Sila Isi Pernyataan Dibawah.</h4>
 <div>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form"> 
      <div class="col-lg-9"> 
      <label for="text">NAMA PELAPOR :</label>
    <input type="text" id="nama" name="nama">
      </div>
      <div class="col-lg-9">
    <label for="">NO TELEFON PELAPOR :</label>
    <input type="text" id="no" name="no">
      </div>
        <div class="col-lg-9">
    <label for="">JENIS KEROSAKAN :</label>
    <select id="jenis_kerosakan" name="jenis_kerosakan">
      <option value="sila pilih">**SILA PILIH JIKA BERKENAAN**</option>
      <option value="motherboard">MOTHERBOARD</option>
      <option value="cpu">CPU</option>
      <option value="cpufan">CPU FAN</option>
      <option value="ram">RAM</option>
      <option value="harddisk">HARD DISK</option>
      <option value="heatsink">HEAT SINK</option>
      <option value="monitor">MONITOR</option>
      <option value="powersupply">POWER SUPPLY</option>
      <option value="cddvdrom">CD/DVD ROM</option>
      <option value="vgacable">VGA CABLE</option>
      <option value="graphicscard">GRAPHICS CARD</option>
      <option value="audioacard">AUDIO CARD</option>
      <option value="projector">PROJECTOR</option>
      <option value="virus">VIRUS</option>
      
    </select>
      </div>
      <br>
      <div class="col-lg-9">
<input type="text"id="jenis_kerosakan" name="jenis_kerosakan">
    <br>
    <label for="">KEROSAKAN YANG DIHADAPI :</label>
    <input type="text" id="kerosakan" name="kerosakan">
      </div>
      <div class="col-lg-9">
    <label for="">LOKASI:</label>
    <input type="text" id="lokasi" name="lokasi">
      <br>  
      </div>
      <div class="col-lg-7">
    <label for="catatan">CATATAN KEROSAKAN:</label><br>
    <textarea id="catatan" class="form-control"></textarea>
     <br>
      </div>
      <div class="col-lg-9">
      <label for="">JAWATAN</label>
     <select type="text" id="jawatan" name="jawatan">
      <option value="jawatan">**SILA PILIH**</option>
         <option value="pengajar">PENGAJAR</option>
      <option value="pelajar">PELAJAR</option>
      <option value="kakitangan">KAKITANGAN</option>
      </select>
      </div>
      <br>
      <div class="col-lg-9">
    <div class="form-group-sm">
    <input type="submit" name="submit" value="Submit" class="btn btn-info">
    </div>
      </div>
      
  </form>
</div>
</body>
</div>
</div>
            
    </div>
</body>
</html>