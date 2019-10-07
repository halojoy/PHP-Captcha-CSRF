<?php

// Echoes the HTML input field with the token
$salt = substr(sha1(random_bytes(20)), 0, 20);
$string = implode('|', [time(), $_SERVER['REMOTE_ADDR'], $salt]);
$key  = substr(openssl_digest('hello little world', 'sha256'), 0, 32);
$iv   = bin2hex(openssl_random_pseudo_bytes(8));
$code = openssl_encrypt($string, 'aes-256-ctr', $key, 0, $iv).$iv;
$token = base64_encode($code);
$_SESSION['csrf_code'] = $token;
echo '<input type="hidden" name="csrf_code" value="'.$token.'">';
