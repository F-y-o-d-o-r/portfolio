<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="mine.js"></script>
  <style>
  </style>
</head>
<body>

<form name="form_translate">
  <input type="text" name="russian_sentence" size="100" placeholder="Введите фразу на русском языке"/>
  <select name="select_translate" onchange="jquery_send('#translate_result', 'post', 'translate.php', ['language', 'value'], [form_translate.select_translate.options[form_translate.select_translate.selectedIndex].text, form_translate.russian_sentence.value]);">
    <option selected>ru</option>
    <option>en</option>
    <option>de</option>
    <option>fr</option>
    <option>it</option>
    <option>es</option>
  </select>
 <!-- <input type="button" value="Перевести" name="button_translate"/>-->
</form>
<span id="translate_result" style="font-weight:bolder;color:red;"></span>

</body>
</html>
