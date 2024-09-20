<?php 

include "../config/config.php";
// require_once 'data.php';

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
  <input type="text" class="form-control" name="Nama">
</div>
    
<div class="form-group">
  <label for="exampleFormControlInput1">Size</label>
  </div>
  <?php 
 

  $row = 1; 
  for($i = 30; $i <= 42; $i++) {
  ?>
  <div class="form-check form-check-inline">                                  
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="size[]" value="<?= $i ?>">
  <label class="form-check-label" for="inlineCheckbox1"><?= $i ?></label>
  </div>

  <?php 
  if ($row % 5  == 0) echo "<br/>";

  $row++; } ?>



<div class="form-group">
    <br>
  <label for="usr">Harga</label>
  <br>
  <input type="text" class="form-control" name="Harga"> 
</div>

<div class="form-group">
    <br>
  <label for="comment">Deskripsi</label>
  <br>
  <textarea class="form-control" rows="5" id="comment" name="diskripsi"  ></textarea>
</div>

<br>
<input type="submit" name="Submit"> 
</form>

</body>
</html>