<?php

// Test for valid csrf
if ($_POST['csrf_code'] === $_SESSION['csrf_code']) {
    $string = $_POST['csrf_code'];
    $key  = substr(openssl_digest('hello little world', 'sha256'), 0, 32);
    $iv   = substr($string, -16, 16);
    $data = substr($string, 0, -16);
    $code = openssl_decrypt($data, 'aes-256-ctr', $key, 0, $iv);
    $ex = explode('|', $code);
    if ((time() - $ex[0]) <= 300)
        if ($_SERVER['REMOTE_ADDR'] === $ex[1])
            return;
}
exit('Invalid CSRF code');
