<!--<div id="forma">
  <form method="post">
    <input type="button" value="Автомобили" name="auto" onclick="post_send(this.name);func_color();">
    <input type="button" value="Запчасти" name="zapcasti" onclick="post_send(this.name);">
  </form>
</div>
<script>-->
  /*var req;
  function post_send(name) {
    req = new XMLHttpRequest();//ajax js
    req.open('POST', 'algoritm.php', true);//connect to server - true == async - rabotaet tolko ukazanniy file
    req.onreadystatechange = func_response;//ф-ция возврата - колбек
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//заголовок
    var str = name + "=";//param = value - homework kak v proshlom
    req.send(str);//отсылка на сервер
  }
  function func_response() {
    if (req.readyState == 4 && req.status == 200) {//усли сервер готов получить, если получил
      //alert(req.responseText); //-to check
      tbod.innerHTML = req.responseText;//эхо == респонс текст - или принт р подойдет
      func_color();
    }
  }
  function func_color() {
    var elem_td = document.body.getElementsByTagName('td');
    for (var i = 0; i < elem_td.length; i++) {
      elem_td[i].setAttribute('style', 'background-color:lavender');
    }
  }*/
</script>