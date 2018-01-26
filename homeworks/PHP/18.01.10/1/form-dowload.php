<?PHP
session_start();
?>
<form method="post" target="img-transit" action="function.php" enctype="multipart/form-data" class="form">
  <input type="file" name="file[]" multiple="true" onchange="change();">
  <input type="submit" value="Загрузить картинки" class="submit" name="submit">
</form><br>
<iframe name="img-transit" style="display: none; height: 0;"></iframe>
<script>
  document.getElementsByTagName('button')[0].className = "button2";
  document.getElementsByTagName('button')[1].className = "button";
  clearInterval(interv);
  var interv = setInterval('func_img()', 2000);
</script>