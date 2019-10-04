<?php

// Test for valid csrf
if ($_POST['csrf_code'] !== $_SESSION['csrf_code'])
    exit('Invalid CSRF Code');
