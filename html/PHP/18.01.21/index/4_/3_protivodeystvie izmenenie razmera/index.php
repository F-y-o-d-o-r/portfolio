<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Меню php</title>
  <style>
    .men {
      display: table;
      display: table-cell;
      text-align: center;
      vertical-align: middle;
      width: 100px;
      height: 30px;
      color: slategray;
      background-color: lightgreen;
      font-weight: bold;
      border: 1px solid darkseagreen;
      border-radius: 4px;
      cursor: pointer;
    }

    .men:hover {
      background-color: honeydew;
    }

    #container {
      width: 1024px;
      background-color: whitesmoke;
      margin: 0px auto;
    }
  </style>
</head>
<body>
<div id="container">
  <?php
  include_once('header.php');
  echo '<form method="post" enctype="multipart/form-data" target="ifr" action="upload.php">
   <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
   <input type="file" name="userfile[]" multiple="true">
   <input type="submit" value="Записать" name="submit">
   </form>
<iframe name="ifr" style="display:none;"></iframe>';
  include_once('load.php');
  //include_once('hp_php0.jpg');
  include_once('footer.php');
  ?>
</div>
</body>
</html>