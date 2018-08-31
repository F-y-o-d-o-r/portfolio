<?php

function yandex_translate_file_get_contents($mas2)
{
  $yandex = json_decode(
    file_get_contents(
      'https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20151121T123602Z.c647c65268af9cdb.8923072f049a821f33b0ff4fa11ef99285963325&text=' . $mas2 . '&lang=ru-en'
    )
  );
  //return $yandex; echo '<br>'; //stdClass Object ( [code] => 200 [lang] => ru-uk [text] => Array ( [0] => ������� ) )
  return $yandex->text[0];
  //print_r($yandex->text[0]);
}

if (isset($_POST['language'])) {
  switch ($_POST['language']) {
    case en:
      //$tran = file_get_contents('http://translate.25one.com.ua/api_yandex_translate_file_get_contents.php?type_translate=en&russian_sentence=' . urlencode($_POST['value']));
      $tran = yandex_translate_file_get_contents($_POST['value']);//не работает на денвере, но так правильно из интернета
      echo $tran;
      break;
    case de:
      $tran = file_get_contents('http://translate.25one.com.ua/api_yandex_translate_file_get_contents.php?type_translate=de&russian_sentence=' . urlencode($_POST['value']));
      echo $tran;
      break;
    case fr:
      $tran = file_get_contents('http://translate.25one.com.ua/api_yandex_translate_file_get_contents.php?type_translate=fr&russian_sentence=' . urlencode($_POST['value']));
      echo $tran;
      break;
    case it:
      $tran = file_get_contents('http://translate.25one.com.ua/api_yandex_translate_file_get_contents.php?type_translate=it&russian_sentence=' . urlencode($_POST['value']));
      echo $tran;
      break;
    case es:
      $tran = file_get_contents('http://translate.25one.com.ua/api_yandex_translate_file_get_contents.php?type_translate=es&russian_sentence=' . urlencode($_POST['value']));
      echo $tran;
      break;
  }
}


?>