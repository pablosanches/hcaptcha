# hCaptcha Wrapper 

![hcaptcha header](https://assets-global.website-files.com/5c73e7ea3f8bb2a85d2781db/5c76851156b74e53ab8b2a27_hcaptha-logo-white.svg)

## Quick start

1. Sign up at [hCaptcha](https://hCaptcha.com/?r=20737c4f354f).
2. Fetch your public key and site key from the [settings](https://dashboard.hcaptcha.com/settings) tab.
3. Get this package `composer require pablosanches/hcaptcha`
4. Set up your **front end** as:

```html
    <head>
        <script src="https://hcaptcha.com/1/api.js" async defer></script>
        ...
    </head>
    <body>
    
    <form action="endpoint.php" method="post">
        ...
        <div class="h-captcha" data-sitekey="your-sitekey"></div>
        <input type="submit" value="send">
    </form>
    
    </body>
```

5. Now in your PHP **back end**:

```php
   require('../vendor/autoload.php');
    use PabloSanches\hCaptcha;

    $hCaptcha = new hCaptcha('your-secret-key');
    $hCaptchaResult = $hCaptcha->challenge($_POST['h-captcha-response']);
    $isHuman = $hCaptchaResult->isHuman(); // True or False
    
    if (!$isHuman) {
        $errors = $hCaptchaResult->getErrors(); // An array with all errors
    }
```

Enjoy it ;)