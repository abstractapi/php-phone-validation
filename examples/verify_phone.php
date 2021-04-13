<?php

use Abstractapi\PhoneValidation\AbstractPhoneValidation;

require_once("../src/AbstractPhoneValidation/autoload.php");


AbstractPhoneValidation::configure($api_key = "YOUR_API_KEY");

$info = AbstractPhoneValidation::verify('+14152007986');

echo AbstractPhoneValidation::getApiEndpoint();

echo "<pre>";
print_r($info);
echo "</pre>";

echo "valid: " ; echo var_export($info->valid);
echo "</br>";
echo "country code: " . $info->country->code;
