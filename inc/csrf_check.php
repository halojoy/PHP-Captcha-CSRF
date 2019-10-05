<?php

// Test for valid csrf
if ($_POST['csrf_code'] === $_SESSION['csrf_code']) {
    $ex = explode('|', $_POST['csrf_code']);
    if ((time() - $ex[0]) <= 300)
        if ($_SERVER['REMOTE_ADDR'] === $ex[1])
            return;
}
exit('Invalid CSRF code');
