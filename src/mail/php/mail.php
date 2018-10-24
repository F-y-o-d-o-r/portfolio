<?php
if (isset($_POST['email']) && isset($_POST['message'])) {

    $from_email = "f.mail.diff@gmail.com"; //!!! $from_email - отправитель - РЕАЛЬНЫЙ...
    $title_str = "From portfolio site" . date('d-m-Y H:i:s');
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: " . $title_str . " от fyodor.pp.ua"; //!!! $from - отправитель - РЕАЛЬНЫЙ...
    $message = "Email: " . $_POST['email'] . "<br>";
    $message .= "Message: " . $_POST['message'];
    $result = mail('fyodor.work@gmail.com', "From portfolio site " . date('d-m-Y H:i:s'), $message, $headers); //no denwer. answer true/false
    //$result = file_get_contents('http://mailer.25one.com.ua/api_mail_file_get_contents.php?mail=' . urlencode($_POST['email']) . '&title=' . urlencode("Message from site.25one.com.ua of " . date('d-m-Y H:i:s')) . '&message=' . urlencode($message) . '&headers=' . urlencode($headers));
    if ($result) {
        echo '<script>';
        echo 'document.body.innerHTML="Ваше письмо отправлено!!!";;';
        echo '</script>';
    }

// Send
    //mail('fyodor.work@gmail.com', 'From portfolio site', $message);
}
