<?php
if(isset($_GET['fcm_lang'])){
$lang = $_GET['fcm_lang'];
$expire = time()+2592000;
setcookie('s_lang', $lang, $expire, '/');
}
?>
