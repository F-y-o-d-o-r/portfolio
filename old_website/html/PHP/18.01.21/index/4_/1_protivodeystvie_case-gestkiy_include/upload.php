<?php
if (isset($_FILES['userfile'])) {
  $dir = '/domains/classworks/2018.01.28/index/4_/1_protivodeystvie_case-gestkiy_include/';
  for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
    $img = getimagesize($_FILES['userfile']['tmp_name'][$i]);
    if ($img['mime'] == 'image/jpeg') {
      if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {
        echo $_FILES['userfile']['name'][$i] . '<br>';
      } else {
        echo 'Файл(ы) ' . $_FILES['userfile']['name'][$i] . ' загрузить не удалось!<br>';
      }
    } else {
      echo 'bad format';
    }
  }
}
?>