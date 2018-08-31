<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
  <style>
  </style>
</head>
<body>

<form name="form1" method="post"> <!--action-->
  <input type="text" name="param1" value="5"><br>
  <input type="text" name="param2" value="3"><br>
  <input type="button" value="submit" onclick="post_send(param1.value, param2.value)">
</form>
<span id="summa"></span>
<script>
  var req;
  function post_send(value1, value2) {
    req = new XMLHttpRequest();//ajax js
    req.open('POST', 'sum_post.php', true);//connect to server - true == async
    req.onreadystatechange = func_response;//ф-ция возврата - колбек
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//заголовок
    var str = 'param1=' + value1 + '&param2=' + value2;
    req.send(str);//отсылка на сервер
  }
  function func_response() {
    if (req.readyState == 4 && req.status == 200) {//усли сервер готов получить, если получил
      summa.innerHTML = req.responseText;//эхо == респонс текст - или принт р подойдет
    }
  }
</script>
<?php
//if(isset($_POST['param1']) or isset($_POST['param2'])) {
//    $x = $_POST['param1'];
//    $y = $_POST['param2'];
//    $z = $x + $y;
//    echo "<script>summa.innerHTML = $z</script>";
//}
?>
</body>
</html>
