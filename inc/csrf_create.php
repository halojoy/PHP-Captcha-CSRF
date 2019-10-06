<?php

// Echoes the HTML input field with the token
$code = substr(sha1(random_bytes(20)), 0, 20);
$string = implode('|', [time(), $_SERVER['REMOTE_ADDR'], $code]);
$token = openssl_encrypt($string,
                    'aes-256-ctr', '5ad6f607', 0, '77040bc1028f702b');
$_SESSION['csrf_code'] = $token;
echo '<input type="hidden" name="csrf_code" value="'.$token.'">';
