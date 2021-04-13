<?php
namespace Abstractapi\PhoneValidation; 

use Abstractapi\PhoneValidation\Common\AbstractEndpointBase;
use Abstractapi\PhoneValidation\DomainObject\PhoneValidationData;
use Abstractapi\PhoneValidation\Common\Extension\StringExtension; 
use Abstractapi\PhoneValidation\Common\DomainObject\HttpErrorDetail;
use Abstractapi\PhoneValidation\Common\Exception\InvalidArgumentException;
use Abstractapi\PhoneValidation\Common\Exception\AbstractHttpErrorException;

/** 
 * Abstract's Phone Number Validation and Verification API client.
 */
class AbstractPhoneValidation extends AbstractEndpointBase
{
    /** 
     * @var string api_endpoint  Abstract's Phone Number Validation and Verification API.
     */
    private const API_ENDPOINT = "https://phonevalidation.abstractapi.com/v1";

    /**
     * Configure Phone Number Validation and Verification API.
     * 
     * @param string $api_key This is your private API key, specific to the Phone Number Validation and Verification API.
     */
    public static function configure($api_key)
    {
        parent::configureEndpoint(self::API_ENDPOINT, $api_key); 
    }

    /**
     * Make an HTTP GET request to Abstract's Phone Number Validation and Verification API,
     * for retrieving all available details about requested phone number.
     * 
     * @param   string  $phone          The phone number to validate and verify.
     * @return  AbstractPhoneValidation 
     * 
     * @throws  InvalidArgumentException
     * @throws  AbstractHttpErrorException
     */
    public static function verify($phone)
    {
        // Ensures that the phone parameter is not empty.
        if (StringExtension::isNullOrEmpty($phone)) {
            throw new InvalidArgumentException("Phone Number is a required argument.");
        }

        // Will make a GET request for phone verification.
        $result = parent::client()->get(
            '',
            [
                'phone' => $phone
            ]
        );

        // Will check the status of the request response, 
        // if successful returns a filled .
        if (parent::client()->success()) {
            return new PhoneValidationData($result);
        }

        // Get the status code of the last request.
        $http_status_code = self::client()->getLastResponse()['headers']['http_code'];

        // When there is no network or the wrong endpoint address is set.
        if ($http_status_code === 0) {
            throw new \Exception("Check network connection.");
        }

        throw new AbstractHttpErrorException(
            $result['error']['message'],
            $result['error']['code'],
            $http_status_code,
            $result['error']['details']
        );
    }
}

