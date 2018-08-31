<form method="post" enctype="multipart/form-data">   <!--!!!БЕЗ target="ifr" БЕЗ action="index0.php"(И ДАЖЕ БЕЗ action="index.php")!!!-->
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="userfile[]" multiple="true">
<input type="submit" value="Записать" name="submit">
</form>
<form method="post">
<input type="text" name="param" size="30">
<input type="submit" value="Найти марку">
</form>

