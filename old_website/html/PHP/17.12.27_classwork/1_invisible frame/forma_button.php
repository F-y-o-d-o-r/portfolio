<div id="forma">
  <form>
    <input type="button" value="Автомобили" name="auto" onclick="post_send('tbod', 'algoritm.php', [this.name], []);">
    <input type="button" value="Запчасти" name="zapcasti" onclick="post_send('tbod', 'algoritm.php', [this.name], []);">
  </form>
</div>
<div id="shapka">
  <table>
    <tbody>
    <tr>
      <td style="background-color:silver; font-weight:bold; border:1px solid blue;">МАРКА</td>
      <td style="background-color:silver; font-weight:bold; border:1px solid blue;">МОДЕЛЬ</td>
      <td style="background-color:silver; font-weight:bold; border:1px solid blue;">ЦЕНА</td>
    </tr>
    </tbody>
    <tbody id="tbod">
    </tbody>
  </table>
</div>
<script>
  var mass_img = new Array("lenovo.jpg", "acer.jpg", "hp.jpg");
  var i = 0;
  clearInterval(int);
  var int = setInterval("func_img()", 1500);
  function func_img() {
    if (i == mass_img.length) {
      i = 0;
    }
    var sl = document.getElementById("slider");
    sl.innerHTML = "<img src=" + mass_img[i] + ">";
    i++;
  }
</script>