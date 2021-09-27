<?php
    require('../vendor/autoload.php');

    use PabloSanches\hCaptcha;

    $hCaptcha = new hCaptcha('0x5E148e331a53cF9BDE83FDF33DfE5B60329CC447');
    if (!empty($_POST['test-me'])) {
        echo "hCaptcha response: {$_POST['h-captcha-response']} <br /><hr />";
        $hCaptchaResult = $hCaptcha->challenge($_POST['h-captcha-response']);
        $isHuman = $hCaptchaResult->isHuman() ? 'Yes' : 'No';
        echo "isHuman: {$isHuman} <br /><hr />";

        if (!$hCaptchaResult->isHuman()) {
            echo "Errors: " . implode(',', $hCaptchaResult->getErrors()) . "<br />";
        }
    }