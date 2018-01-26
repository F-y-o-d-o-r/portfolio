<form method="post" enctype="multipart/form-data" target="ifr" action="function.php">
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
  <input type="file" name="userfile[]" multiple="true">
  <input type="submit" value="Записать" name="submit">
</form>

<iframe name="ifr" style="display:none;"></iframe>

<form>
  <input type="text" name="param" size="30"
         onkeypress="if(event.which==13) {post_send('tbody', 'function.php', ['param'], [param.value]); return false;}">
  <input type="button" name="marka" value="Найти марку"
         onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">
  <input type="button" name="model" value="Найти модель"
         onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">
</form>

<br>
<hr>

<form>
  Марка <input type="text" name="marka" size="10">
  Модель <input type="text" name="model" size="5">
  Цена <input type="text" name="cena" size="5">
  <input type="button" value="Записать"
         onclick="post_send('tbody', 'function.php', ['param', 'marka', 'model', 'cena'], [param.value, marka.value, model.value, cena.value]); marka.value=''; model.value=''; cena.value='';">
  <br><br>
  <!-- через ajax передаем в function.php введенные значения (+tbody + param, чтобы сразу отображалось в таблице), marka.value, model.value, cena.value - «чистим» поля после передачи -->
  <input type="text" name="param" size="30">
  <input type="button" value="Найти марку" onclick="post_send('tbody', 'function.php', ['param'], [param.value])">
</form>


