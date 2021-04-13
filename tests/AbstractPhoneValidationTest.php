<?php

namespace Abstractapi\PhoneValidation\Tests;

use PHPUnit\Framework\TestCase;
use Abstractapi\PhoneValidation\AbstractPhoneValidation;
use Abstractapi\PhoneValidation\Common\Exception\InvalidArgumentException;

class AbstractPhoneValidationTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testInvalidAPIKey()
    {
        $this->expectException('\Exception');
        AbstractPhoneValidation::configure('');
    }

      /**
     * @throws \Exception
     */
    public function testInstantiation()
    {
        $API_KEY = getenv('PHONE_VALIDATION_API_KEY');

        AbstractPhoneValidation::configure($API_KEY);     

        $this->assertSame('https://phonevalidation.abstractapi.com/v1', AbstractPhoneValidation::getApiEndpoint());

        $this->assertFalse(AbstractPhoneValidation::success());

        $this->assertFalse(AbstractPhoneValidation::getLastError());

        $this->assertSame(array('headers' => null, 'body' => null), AbstractPhoneValidation::getLastResponse());

        $this->assertSame(array(), AbstractPhoneValidation::getLastRequest());
    }

    public function testResponseState()
    {
        $API_KEY = getenv('PHONE_VALIDATION_API_KEY');

        AbstractPhoneValidation::configure($API_KEY);  
        
        $phone = '14152007986';

        $info = AbstractPhoneValidation::verify($phone);
  
        $this->assertTrue(AbstractPhoneValidation::success());  

        $this->assertEquals($phone, $info->phone);  
    }

    public function testArgValidation()
    { 
        $this->expectException('Abstractapi\PhoneValidation\Common\Exception\InvalidArgumentException'); 
        AbstractPhoneValidation::verify('');  
    }
}