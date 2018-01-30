<?php
//echo $_POST['param'].'<br>';
//чтобы не пропустить теги
echo htmlspecialchars($_POST['param'] . '<br>');

?>