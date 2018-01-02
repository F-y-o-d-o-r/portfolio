<div id="img">
  <form method="post" enctype="multipart/form-data" action="algoritm.php" target="ifr">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="userfile[]" multiple="true">
    <input type="submit" value="Записать" name="submit">
  </form>
  <iframe name="ifr" style="display: none;">

  </iframe>
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