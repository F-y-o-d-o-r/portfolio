<form method="post" enctype="multipart/form-data">
  <input type="file" name="file[]" multiple="true" onchange="change()">
  <input type="submit" value="Загрузить картинки" class="submit" name="submit">
</form>
<form method="post">
  <input type="text" placeholder="введите слово или 1ю часть слова из столбика МАРКА" name="search_what">
  <input type="submit" value="Отсортировать">
</form>