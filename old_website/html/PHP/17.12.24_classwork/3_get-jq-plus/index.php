<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<form name="form1">
  <input type="text" name="param1" value="5"><br>
  <input type="text" name="param2" value="3"><br>
  <input type="button" value="Сложить" onclick="post_send('summa', 'sum_post.php', ['param1','param2'], [param1.value, param2.value])">
  <input type="button" value="Сложить jq" onclick="jq_send(param1.value, param2.value)">
</form>
<b><span id="summa"></span></b>
<script>
  /*var req;
  function post_send(value1, value2) {
    req = new XMLHttpRequest();
    req.open('POST', 'sum_post.php', true);
    req.onreadystatechange = func_response;
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var str = 'param1=' + value1 + '&param2=' + value2;
    req.send(str);
  }
  function get_send(value1, value2) {
    req = new XMLHttpRequest();
    req.open('GET', 'sum_get.php?param1=' + value1 + '&param2=' + value2, true);//diff in get
    req.onreadystatechange = func_response;*/
// ЧЕТВЕРТЫЙ ЭТАП – ОТСУТСТВУЕТ
//req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
// ПЯТЫЙ ЭТАП – ОТСУТСТВУЕТ
//var str='param1='+value1+'&param2='+value2;
// ШЕСТОЙ(ЧЕТВЕРТЫЙ ЗДЕСЬ) ЭТАП
    /*req.send();
  }
  function func_response() {
    if (req.readyState == 4) {
      if (req.status == 200) {
        summa.innerHTML = req.responseText;
      }
    }
  }
  function jq_send(value1, value2) {
    $.ajax({//$.get $.post
      type: 'POST',
      url: 'sum_post.php',
      data: 'param1=' + value1 + '&param2=' + value2,
      success: function (data) {
        $("#summa").html(data);
        //alert(data);
      }
    });
  }*/
</script>
<script src="ajax_post_get_jq.js"></script>
</body>
</html>
