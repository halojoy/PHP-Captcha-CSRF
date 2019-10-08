<?php

// Session start is needed
session_start();

if (isset($_POST['submit'])) {

    // Check for valid CSRF code
    require('inc/csrf_check.php');

    // Check for Captcha string
    if (require('inc/captcha_check.php')) {
        echo 'Everything correct<br>';
        echo '<input type="button" value="Run Again"
            onClick="window.location.href=\'\'">';
        exit();
    }else{
        echo 'Captcha wrong<br>';
    }
}
?>
<form method="post">

<!-- Generate CSRF protection code -->
<?php require('inc/csrf_create.php') ?>

<!-- Generate Captcha image -->
<img src="inc/captcha_img.php" style="border: 1px solid black"><br>

<!-- Input Captcha characters -->
<?php require('inc/captcha_input.php') ?>

<input type="submit" name="submit">

</form>
