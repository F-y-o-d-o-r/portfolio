<div style="width:1000px; height:75px; background-color:#E8FFC3; float:left; padding-top: 15px; box-sizing: border-box; border-bottom: 2px solid #3279B6;">
  <div class="border-wrapper" style="width: 320px; margin: 0 auto;">
    <!--
    <button class="button" onclick="post_send('download-search', 'function.php', ['show'], ['download']);">Загрузка изображений</button>
    <button class="button" onclick="post_send('download-search', 'function.php', ['show'], ['search']);">Поиск товара</button>
    -->
    <button class="button" name="button_dowload" onclick="jquery_send('#download-search', 'post', 'form-dowload.php', ['button', 'color'], ['button_dowload', 'lightblue']);">Загрузка изображений</button>
    <button class="button" name="button_search" onclick="jquery_send('#download-search', 'post', 'form-search.php', ['button', 'color'], ['button_search', 'lightgreen']);">Поиск товара</button>
  </div>
</div>