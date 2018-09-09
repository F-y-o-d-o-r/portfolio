<form method="post" enctype="multipart/form-data">   <!-- //### action='index.php' -->
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
  <input type="file" name="userfile[]" multiple="true">
  <input type="submit" value="Записать" name="submit">
</form>

<script>
  <?php if(isset($_GET['menu'])) { ?>
  $(".men").css("background-color", "powderblue").css("color", "slategray");
  $("[name=" + '<?php echo $_GET['menu']; ?>' + "]").css("background-color", "silver").css("color", "white");
  <?php } ?>
</script>