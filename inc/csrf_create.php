<?php

// Echoes the HTML input field with the token
$token = sha1($_SERVER['REMOTE_ADDR'].random_bytes(16));
$_SESSION['csrf_code'] = $token;
echo '<input type="hidden" name="csrf_code" value="'.$token.'">';
