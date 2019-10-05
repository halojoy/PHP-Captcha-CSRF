<?php

// Test for valid csrf
if ($_POST['csrf_code'] !== $_SESSION['csrf_code'])
    exit('Invalid CSRF Code');
$ex = explode('|', $_POST['csrf_code']);
if ((time() - $ex[0]) > 300)
    exit('Invalid CSRF Code');
if ($_SERVER['REMOTE_ADDR'] !== $ex[1])
    exit('Invalid CSRF Code');
