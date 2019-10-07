<?php

// Echoes the HTML input field with the token
$salt = bin2hex(openssl_random_pseudo_bytes(8));
$string = implode('|', [time(), $_SERVER['REMOTE_ADDR'], $salt]);
$key  = substr(openssl_digest('hello little world', 'sha256'), 0, 32);
$iv   = bin2hex(openssl_random_pseudo_bytes(8));
$token = openssl_encrypt($string, 'aes-256-ctr', $key, 0, $iv).$iv;
$_SESSION['csrf_code'] = $token;
echo '<input type="hidden" name="csrf_code" value="'.$token.'">';
