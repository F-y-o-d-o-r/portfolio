<form method="post" enctype="multipart/form-data" target="ifr" action="function.php">  <!-- %%% target="ifr" action="function.php" -->
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="userfile[]" multiple="true">
<input type="submit" value="Записать" name="submit">
</form>

<script>
<?php if(isset($_GET['menu'])) { ?>
$(".men").css("background-color", "powderblue").css("color", "slategray");
$("[name="+'<?php echo $_GET['menu']; ?>'+"]").css("background-color", "silver").css("color", "white");
<?php } ?>
</script>

<iframe name="ifr" style="display:none;"></iframe> <!-- %%% iframe style="display:none;" -->
