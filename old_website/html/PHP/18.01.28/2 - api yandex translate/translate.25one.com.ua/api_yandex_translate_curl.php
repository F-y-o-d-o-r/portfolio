<?php

if(isset($_GET['russian_sentence'])) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json; charset=utf-8'));
curl_setopt($ch, CURLOPT_URL, 'https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20151121T123602Z.c647c65268af9cdb.8923072f049a821f33b0ff4fa11ef99285963325&text='.urlencode($_GET['russian_sentence']).'&lang=ru-'.$_GET['type_translate']);
$result = curl_exec($ch);
$yandex = json_decode($result);
//return $yandex->text[0];
print_r($yandex->text[0]);

}

?>