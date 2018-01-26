<form>  <!-- %%% вообще - просто опять надо -->
<input type="text" name="param" size="30" onkeypress="if(event.which==13) {post_send('tbody', 'function.php', ['param'], [param.value]); return false;}">
<input type="button" name="marka" value="Найти марку" onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">   <!-- +++++ name="marka", ['param', this.name] -->
<input type="button" name="model" value="Найти модель" onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">  <!-- +++++ name="model", ['param', this.name] -->
</form>

<script>
<?php if(isset($_GET['menu'])) { ?>
$(".men").css("background-color", "powderblue").css("color", "slategray");
$("[name="+'<?php echo $_GET['menu']; ?>'+"]").css("background-color", "silver").css("color", "white");
<?php } ?>
</script>



