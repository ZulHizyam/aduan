<!DOCTYPE html>
<html>
<div class="b">
<h1>Borang Aduan Kerosakan Peralatan Komputer</h1>
<body>
<h4>Sila Isi Pernyataan Dibawah.</h4>
 <div>

<form action="/action_page.php">
  Nama:<br>
  <input type="text" id="nma" name="nama" value="">
  <br>
  No.Kad Pengenalan:<br>
  <input type="text" id="nkadpengenalan" name="nokadpengenalan" value="">
  <br>
  Tarikh Kerosakan:<br>
  <input type="text" id="tkerosakan" name="tarikhkerosakan" value="">
  <br>
  No.Siri:<br>
  <input type="text" id="nsiri" name="nosiri" value="">
  <br>
  Jenis Peralatan Yang Rosak Rosak:<br>
  <input type="text" name="jenisperalatanyangrosak" value="">
  <select id="jperalatanyangrosak" name="jenisperalatanyangrosak">
        
      <option value="sila pilih">** SILA PLIH **</option>
      <option value="motherboard">Motherboard</option>
      <option value="cpu">CPU</option>
      <option value="cpufan">CPU Fan</option>
      <option value="ram">RAM</option>
      <option value="harddisk">Hard Disk</option>
      <option value="heatsink">Heat Sink</option>
      <option value="monitor">Monitor</option>
      <option value="powersupply">Power Supply</option>
      <option value="cddvdrom">CD/DVD ROM</option>
      <option value="vgacable">VGA Cable</option>
      <option value="graphicscard">Graphics Card</option>
      <option value="audioacard">Audio Card</option>
      <option value="projector">Projector</option>
      
    </select>

  <br>
  Kerosakan Yang Dihadapi:<br>
  <input type="text" id="kyangdihadapi" name="jeniskerosakanyangdihadapi" value="">
  <br>
  
  Lokasi:<br>
  <input type="text" name="lokasi" value="">
   <select type="text" id="lkasi" name="lokasi">
      
      <option value="lab1">**SILA PILIH**</option>
      <option value="lab1">Lab 1</option>
      <option value="lab2">Lab 2</option>
      <option value="lab3">Lab 3</option>
      <option value="lab4">Lab 4</option>
      <option value="lab5">Lab 5</option>
      <option value="lab6">Lab 6</option>
      <option value="lab7">Lab 7</option>
    
    </select>
  <br>
  <br><br>
  <input type="submit" value="Submit">
</form> 
</div>
</body>
    </div>
</html>
