<form class="form">
  <input type="text" placeholder="введите слово или часть слова из столбика МАРКА" name="search_what" onkeypress="if(event.which === 13){jquery_send('#tbody', 'post', 'function.php', ['search_what'], [search_what.value]); return false;}">
  <input type="button" value="Отсортировать" onclick="jquery_send('#tbody', 'post', 'function.php', ['search_what'], [search_what.value]);">
</form>
<!--jquery_send('tbody', 'POST', 'function.php', ['sliderz'], ['stop']);-->
<!--post_send('tbody', 'function.php', ['search_what'], [search_what.value]);-->

<script>
<?php if(isset($_POST['button'])) { ?>
$(".button").css("background-color", '#3279B6');
$("[name="+'<?php echo $_POST['button']; ?>'+"]").css("background-color", '<?php echo $_POST['color']; ?>');
<?php } ?>
</script>
