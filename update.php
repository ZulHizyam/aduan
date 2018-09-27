<?php
    require 'connection.php';
    require 'Data.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: notification.php");
    }
     
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
        if (empty($nama)) {
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
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE item  set no = ?, nama = ?, jenis_kerosakan =?, kerosakan =?, lokasi =?, catatan =? jawatan =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($no,$nama,$jkerosakan,$kerosakan,$lokasi,$catatan,$jawatan));
            Database::disconnect();
            header("Location: notification.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM item where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $no = $data['no'];
        $nama = $data['nama'];
        $jkerosakan = $data['jenis_kerosakan'];
        $kerosakan = $data['kerosakan'];
        $lokasi = $data['lokasi'];
        $catatan = $data['catatan'];
        $jawatan = $data['jawatan'];
        
        Database::disconnect();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($namaError)?'error':'';?>">
                        <label class="control-label">Nama Penuh</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="" value="<?php echo !empty($nama)?$nama:'';?>">
                            <?php if (!empty($namaError)): ?>
                                <span class="help-inline"><?php echo $namaError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($noError)?'error':'';?>">
                        <label class="control-label">No Tel</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="" value="<?php echo !empty($no)?$no:'';?>">
                            <?php if (!empty($noError)): ?>
                                <span class="help-inline"><?php echo $noError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($jkerosakanError)?'error':'';?>">
                        <label class="control-label">Jenis kerosakan</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="" value="<?php echo !empty($jkerosakan)?$jkerosakan:'';?>">
                            <?php if (!empty($jkerosakanError)): ?>
                                <span class="help-inline"><?php echo $jkerosakanError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        <div class="control-group <?php echo !empty($kerosakanError)?'error':'';?>">
                        <label class="control-label">Kerosakan Dihadapi</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="" value="<?php echo !empty($kerosakan)?$kerosakan:'';?>">
                            <?php if (!empty($kerosakanError)): ?>
                                <span class="help-inline"><?php echo $kerosakanError;?></span>
                            <?php endif; ?>
                        </div>
                      </div><div class="control-group <?php echo !empty($lokasiError)?'error':'';?>">
                        <label class="control-label">Lokasi</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="" value="<?php echo !empty($lokasi)?$lokasi:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $lokasiError;?></span>
                            <?php endif; ?>
                        </div>
                      </div><div class="control-group <?php echo !empty($catatanError)?'error':'';?>">
                        <label class="control-label">Catatan</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="" value="<?php echo !empty($catatan)?$catatan:'';?>">
                            <?php if (!empty($catatanError)): ?>
                                <span class="help-inline"><?php echo $catatanError;?></span>
                            <?php endif; ?>
                        </div>
                      </div><div class="control-group <?php echo !empty($jawatanError)?'error':'';?>">
                        <label class="control-label">Jawatan</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="" value="<?php echo !empty($jawatan)?$jawatan:'';?>">
                            <?php if (!empty($jawatanError)): ?>
                                <span class="help-inline"><?php echo $jawatanError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="notification.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>