<?php
//error_reporting(E_ERROR);
$robots_place = 'No';
$robots_host = 'No';
$robots_sitemap = 'No';

////////////////////////////////////////////////////////////////////////////site
if (isset($_POST['site'])) {
  $r = '/^\w+(\.\w+)+$/iu';
  if (preg_match($r, $_POST['site'])) {
    $fl = 'http://' . $_POST['site'] . '/robots.txt';
//$fl = 'http://' . $_POST['site'];
    if (fopen($fl, 'r')) {
      $robots_place = 'Yes';
      $fl_content = htmlspecialchars(file_get_contents($fl));
      if (strpos($fl_content, 'Host')) {
        $robots_host = 'Yes';
      }
      if (strpos($fl_content, 'Sitemap')) {
        $robots_sitemap = 'Yes';
      }
    }
//print_r($fl_content);
    echo "<script>
tbod.innerHTML='<tr><td>$robots_place</td><td>$robots_host</td><td>$robots_sitemap</td></tr>';
var div_email=document.getElementById('forma_email');
div_email.style.display='block';
</script>";
  }
}
////////////////////////////////////////////////////////////////////////////site
//www.unisender.com
//www.mailgun.com
////////////////////////////////////////////////////////////////////////////email
if (isset($_POST['email'])) {
  $from_email = "noreply@25one.com.ua";  //!!! $from_email - отправитель - РЕАЛЬНЫЙ...
  $title_str = "Letter for you of " . date('d-m-Y H:i:s');
  $headers = "Content-type: text/html; charset=utf-8 \r\n";
  $headers .= "From: " . $title_str . " от site.25one.com.ua<" . $from_email . ">\r\n"; //!!! $from - отправитель - РЕАЛЬНЫЙ...
  $message = '<b>' . $_POST['site_email'] . '</b><br>';
  $message .= '<a href="http://ukr.net"><img src="http://25one.com.ua/logo.jpg" alt="logo"/></a>';
  $message .= '<table>
<tbody>
<tr>
<td style="background-color:silver; font-weight:bold; text-align:center; width:150px;">Наличие файла robots.txt</td>
<td style="background-color:silver; font-weight:bold; text-align:center; width:150px;">Наличие директивы Host</td>
<td style="background-color:silver; font-weight:bold; text-align:center; width:150px;">Наличие директивы Sitemap</td>
</tr>
</tbody>
<tbody id="tbody">
</tbody>' . $_POST['tb'] . '
</table>';
//$result=mail($_POST['email'], "Message from site.25one.com.ua of ".date('d-m-Y H:i:s'), $message, $headers);//no denwer. answer true/false
  $result = file_get_contents('http://mailer.25one.com.ua/api_mail_file_get_contents.php?mail=' . urlencode($_POST['email']) . '&title=' . urlencode("Message from site.25one.com.ua of " . date('d-m-Y H:i:s')) . '&message=' . urlencode($message) . '&headers=' . urlencode($headers));
  if ($result) {
    echo '<script>';
    echo 'err_email.innerHTML="Ваше письмо отправлено!!!";;';
    echo '</script>';
  }
}
////////////////////////////////////////////////////////////////////////////email

?>