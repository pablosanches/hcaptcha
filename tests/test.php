<?php
    require('../vendor/autoload.php');
    use PabloSanches\hCaptcha;

    $hCaptcha = new hCaptcha('your-secret-key');
    if (!empty($_POST['test-me'])) {
        echo "hCaptcha response: {$_POST['h-captcha-response']} <br /><hr />";
        $hCaptchaResult = $hCaptcha->challenge($_POST['h-captcha-response']);
        $isHuman = $hCaptchaResult->isHuman() ? 'Yes' : 'No';
        echo "isHuman: {$isHuman} <br /><hr />";

        if (!$hCaptchaResult->isHuman()) {
            echo "Errors: " . implode(',', $hCaptchaResult->getErrors()) . "<br />";
        }
    }