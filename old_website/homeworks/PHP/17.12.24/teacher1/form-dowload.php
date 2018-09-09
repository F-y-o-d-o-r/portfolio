<form method="post" enctype="multipart/form-data"  class="form">
  <input type="file" name="file[]" multiple="true" onchange="change()">
  <input type="submit" value="Загрузить картинки" class="submit" name="submit">
</form>

<script>
<?php if(isset($_POST['button'])) { ?>
$(".button").css("background-color", '#3279B6');
$("[name="+'<?php echo $_POST['button']; ?>'+"]").css("background-color", '<?php echo $_POST['color']; ?>');
<?php } ?>
</script>
