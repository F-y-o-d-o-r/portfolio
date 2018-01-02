<form class="form">
  <input type="text" placeholder="введите слово или часть слова из столбика МАРКА" name="search_what" onkeypress="if(event.which === 13){jquery_send('#tbody', 'post', 'function.php', ['search_what'], [search_what.value]); return false;}">
  <input type="button" value="Отсортировать" onclick="jquery_send('#tbody', 'post', 'function.php', ['search_what'], [search_what.value]);">
</form>
<script>
  document.getElementsByTagName('button')[0].className = 'button';
  document.getElementsByTagName('button')[1].className = "button2";
  clearInterval(interv);
</script>