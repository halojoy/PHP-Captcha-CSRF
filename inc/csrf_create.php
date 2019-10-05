<?php

// Echoes the HTML input field with the token
$code = sha1(random_bytes(40));
$token = implode('|', [time(), $_SERVER['REMOTE_ADDR'], $code]);
$_SESSION['csrf_code'] = $token;
echo '<input type="hidden" name="csrf_code" value="'.$token.'">';
