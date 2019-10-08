<?php

// Test for valid csrf
require_once('inc/config.php');
if ($_POST['csrf_code'] === $_SESSION['csrf_code']) {
    $string = $_POST['csrf_code'];
    $key = openssl_digest($secret_key, 'sha256', true);
    $iv   = substr($string, 0, 16);
    $code = substr($string, 16);
    $data = openssl_decrypt($code, 'aes-256-ctr', $key, 0, $iv);
    $ex = explode('|', $data);
    if ((time() - $ex[0]) <= 300)
        if ($_SERVER['REMOTE_ADDR'] === $ex[1])
            return;
}
exit('Invalid CSRF code');
