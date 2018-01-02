<form>  <!-- %%% вообще - просто опять надо -->
  <input type="text" name="param" size="30"
         onkeypress="if(event.which==13) {post_send('tbody', 'function.php', ['param'], [param.value]); slider.innerHTML=''; clearInterval(int); return false;}">
  <input type="button" value="Найти марку"
         onclick="post_send('tbody', 'function.php', ['param'], [param.value]); slider.innerHTML=''; clearInterval(int);">
</form>

<script>
  <?php if(isset($_GET['menu'])) { ?>
  $(".men").css("background-color", "powderblue").css("color", "slategray");
  $("[name=" + '<?php echo $_GET['menu']; ?>' + "]").css("background-color", "silver").css("color", "white");
  <?php } ?>
</script>
