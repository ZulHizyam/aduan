<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <center><h3>Senarai Kerosakan</h3></center>
            </div>
            <div class="row">
                <p>
                <a href="borangaduan.php" class="btn btn-success">Buat Aduan</a></p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nama Pelapor</th>
                      <th>No.Tel Pelapor</th>
                      <th>Jenis Kerosakan</th>
                        <th>Kerosakan Yang Dihadapi</th>
                        <th>Lokasi</th>
                        <th>Catatan</th>
                        <th>Jawatan</th>
                        <th>Tindakan</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'connection.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM item ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['nama'] . '</td>';
                            echo '<td>'. $row['no'] . '</td>';
                            echo '<td>'. $row['jenis_kerosakan'] . '</td>';
                       echo '<td>'. $row['kerosakan'] . '</td>';
                       echo '<td>'. $row['lokasi'] . '</td>';
                       echo '<td>'. $row['catatan'] . '</td>';
                       echo '<td>'. $row['jawatan'] . '</td>';
                       echo '<td><a class="btn btn-primary" href="update.php?id='.$row['id'].'">EDIT</a></td>';
                       
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>


            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>