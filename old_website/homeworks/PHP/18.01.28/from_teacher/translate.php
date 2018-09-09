<?php

if (isset($_POST['russian_sentence'])) {  //!!!�������� �� type=en � urlencode ��� �����(�������) - ?russian_sentence='.urlencode($_POST['russian_sentence']
//$english_sentence=file_get_contents('http://translate.25one.com.ua/yandex_translate_api.php?type_translate=en&russian_sentence='.urlencode($_POST['russian_sentence']));
  $english_sentence = file_get_contents('http://translate.25one.com.ua/api_yandex_translate_file_get_contents.php?type_translate=' . $_GET['type_translate'] . '&russian_sentence=' . urlencode($_POST['russian_sentence']));
  print_r($english_sentence);
}

?>