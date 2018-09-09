<?php
if(isset($_POST['search_what'])) { //ПОИСК
   $domcolor->bgColorOne($LCl->massData, 'lightblue');
}
else if(isset($_FILES['file'])) { //ЗАГРУЗКА img
   $domcolor->bgColorOne($LCl->massData, 'lightgreen');
}
else {   //НАЧАЛЬНАЯ ЗАГРУЗКА
   $domcolor->bgColorOne($LCl->massData, 'khaki');
}
?>