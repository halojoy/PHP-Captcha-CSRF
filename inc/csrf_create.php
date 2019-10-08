<?php

// Echoes the HTML input field with the token
require_once('inc/config.php');
$salt = openssl_random_pseudo_bytes(16);
$string = implode('|', [time(), $_SERVER['REMOTE_ADDR'], $salt]);
$key = openssl_digest($secret_key, 'sha256', true);
$iv  = substr(base64_encode(openssl_random_pseudo_bytes(14)), 0, 16);
$token = $iv.openssl_encrypt($string, 'aes-256-ctr', $key, 0, $iv);
$_SESSION['csrf_code'] = $token;
echo '<input type="hidden" name="csrf_code" value="'.$token.'">';
