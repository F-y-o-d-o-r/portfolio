<div id="forma">
  <form method="post">
    <input type="button" style="color:<?PHP echo $_POST['color'];?>;" value="Автомобили" name="auto" onclick="post_send('tbod', 'algoritm.php', [this.name], []);"><!--можем переопределить  [ this name] пост, но поменять при этом в алгоритме-->
    <input type="button" style="color:<?PHP echo $_POST['color'];?>;" value="Запчасти" name="zapcasti" onclick="post_send('tbod', 'algoritm.php', [this.name], []);">
  </form>
</div>
<script>
  var mass_img = new Array('lenovo.jpg', 'acer.jpg', 'hp.jpg');
  var i = 0;
  setInterval('func_img()', 1500);
  function func_img() {
    i++;
    if (i == mass_img.length) {
      i = 0;
    }
    var sl = document.getElementById('slider');
    sl.innerHTML = '<img src=' + mass_img[i] + '>';
  }
</script>