<form method="post" target="img-transit" action="function.php" enctype="multipart/form-data" class="form">
  <input type="file" name="file[]" multiple="true" onchange="change();">
  <input type="submit" value="Загрузить картинки" class="submit" name="submit">
</form><br>
<iframe name="img-transit" style="display: none;"></iframe>