<?php
// 30 günlük süresi var ve '/' erişilebilir olduğu dizin
$thema = 'dark';
setcookie('preferred_theme', $thema, time() + (86400 *30), '/')

?>
