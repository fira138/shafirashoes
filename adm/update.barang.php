<?php
    include "../config/config.php";
    require_once '../adm/data.php';

    $tampil = tampilSatuBarang($koneksi, $_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form-group">
    <br>
    <form action="" method=post >
  <label for="usr">Nama:</label>
  <br>
  <input type="text" class="form-control" name="Nama" value="<?= $tampil['nama'] ?>">
</div>
    
   
<!-- <label class="checkbox-inline"><input name="size[]" type="checkbox" value="7.5"> 7.5 </label>  
<label class="checkbox-inline"><input name="size[]" type="checkbox" value="8"> 8 </label>
<label class="checkbox-inline"><input name="size[]" type="checkbox" value="8.5"> 8.5 </label>

<label class="checkbox-inline"><input name="size[]" type="checkbox" value="9"> 9 </label>
<label class="checkbox-inline"><input name="size[]" type="checkbox" value="9.5"> 9.5 </label>
<label class="checkbox-inline"><input name="size[]" type="checkbox" value="10"> 10 </label>

<label class="checkbox-inline"><input name="size[]" type="checkbox" value="10.5"> 10.5</label>
<label class="checkbox-inline"><input name="size[]" type="checkbox" value="11"> 11 </label>
<label class="checkbox-inline"><input name="size[]" type="checkbox" value="11.5"> 11.5 </label>

<label class="checkbox-inline"><input name="size[]" type="checkbox" value="12"> 12 </label>
<label class="checkbox-inline"><input name="size[]" type="checkbox" value="12.5"> 12.5 </label> -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Size</label>
                    </div>
                    <?php 
                    $ukuran = explode(',', $tampil['size']);

                    $row = 1; 
                        for($i = 30; $i <= 42; $i++) {
                    ?>

                    <div class="form-check form-check-inline">                                  
                        <input <?php if(in_array($i, $ukuran)) { echo 'checked'; } ?> class="form-check-input" type="checkbox" id="inlineCheckbox1" name="size[]" value="<?= $i ?>">
                        <label class="form-check-label" for="inlineCheckbox1"><?= $i ?></label>
                    </div>

                    <?php 
                    if ($row % 5  == 0) echo "<br/>";

                    $row++; } ?>

<div class="form-group">
  <label for="exampleFormControlInput1">Harga</label>
  <input type="number" class="form-control" id="" placeholder="Rp. 0.0" name="harga" value="<?= $tampil['harga'] ?>">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Diskripsi</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="diskripsi"><?= $tampil['diskripsi'] ?></textarea>
    </div>

<br>
 <input type="hidden" name="id" value="<?= $tampil['id'] ?>">
<button type="submit" class="btn btn-primary" name="updatesepatu">updetdata</button>
</form>

</body>
</html>