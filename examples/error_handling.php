<?php

use Abstractapi\PhoneValidation\AbstractPhoneValidation;
use Abstractapi\PhoneValidation\Common\Exception\AbstractHttpErrorException;

require_once("../src/AbstractPhoneValidation/autoload.php");


AbstractPhoneValidation::configure($api_key = "YOUR_API_KEY");

try
{
    $info = AbstractPhoneValidation::verify('+14152007986');
}
catch (AbstractHttpErrorException $e)
{
    echo "Message:          ". $e->getMessage().     "; <br>";
    echo "Code:             ". $e->code.             "; <br>";
    echo "HttpStatusCode:   ". $e->http_code. "; <br>";
    echo "Details:          ";
    print_r($e->details);

    echo "<pre>";
    print_r(AbstractPhoneValidation::getLastResponse());
    echo "</pre>";
}
catch (InvalidArgumentException $e)
{
    // Handle somehow
}
