<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
  <style>
    .fil {
      position: absolute;
      z-index: 2;
      height: 20px;
      width: 110px;
      display: block;
      opacity: 0;
    }

    .sub {
      position: absolute;
      z-index: 1;
      height: 20px;
      width: 110px;
      display: block;
      opacity: 0;
    }

    .sub_sel {
      position: absolute;
      width: 130px;
      height: 18px;
      left: 5px;
      top: 5px;
      border: 1px solid gray;
      border-radius: 2px;
      z-index: 0;
      text-align: center;
      background-color: lavender;
      color: indigo;
      font-size: 9pt;
      font-weight: normal;
      font-family: arial;
    }
  </style>
</head>
<body>

<div style="position:relative; width:110px; height:20px;">
  <div class="sub_sel">
    <span>Выбрать</span>
  </div>
  <form name="forup_name" method="post" enctype="multipart/form-data" target="ifr" action="upload.php">
    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
    <input type="file" name="userfile[]" class="fil" multiple="true" onchange="forup();">
    <input type="submit" value="Записать" class="sub">
  </form>
</div>

<script>
  function forup() {
    forup_name.submit();
  }
</script>

<br>
<iframe name="ifr" style="width:300px; height:100px;"></iframe>

</body>
</html>
