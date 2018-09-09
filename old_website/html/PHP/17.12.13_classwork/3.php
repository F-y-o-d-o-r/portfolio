<?php
//vverhu
setcookie('test', 'php', time() + 3600);//mktime(0,0,0,1,1,2018) - do kogda - del - time in minus
//setcookie('test', $_COOKIE["test"].'php', time() + 3600);//mktime(0,0,0,1,1,2018) - do kogda - del - time in minus
//echo $_COOKIE["test"];//read

///////////super global arrays
///$_... _post, _get, _session, _server_name, _remote_addr, _cookie[''], _request[''](get+post+cookie), globals[''], _files
echo '<br>';

//error_reporten(E_ERROR); - не покажет ошибки на странице - перед выкладыванием на продакшен чтобы не падали ошибки не критические
?>

<html lang="en">
<head></head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="userfile[]" multiple = "true";>
  <input type="submit" value="to send file">
</form>
</body>
</html>

