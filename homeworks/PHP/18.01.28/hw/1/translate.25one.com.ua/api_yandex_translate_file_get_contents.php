<?php

if(isset($_GET['russian_sentence'])) {
$yandex = json_decode(
				file_get_contents(
	'https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20151121T123602Z.c647c65268af9cdb.8923072f049a821f33b0ff4fa11ef99285963325&text='.urlencode($_GET['russian_sentence']).'&lang=ru-'.$_GET['type_translate']
				)
			);
            //return $yandex; echo '<br>'; //stdClass Object ( [code] => 200 [lang] => ru-uk [text] => Array ( [0] => Миколаїв ) )
			//return $yandex->text[0];
            print_r($yandex->text[0]);

}

?>