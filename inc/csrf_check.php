<?php

// Test for valid csrf
if ($_POST['csrf_code'] === $_SESSION['csrf_code']) {
    $code = openssl_decrypt($_POST['csrf_code'],
                        'aes-256-ctr', '5ad6f607', 0, '77040bc1028f702b');
    $ex = explode('|', $code);
    if ((time() - $ex[0]) <= 300)
        if ($_SERVER['REMOTE_ADDR'] === $ex[1])
            return;
}
exit('Invalid CSRF code');
