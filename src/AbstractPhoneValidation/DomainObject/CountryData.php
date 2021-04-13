<?php

namespace Abstractapi\PhoneValidation\DomainObject;

class CountryData
{

    /**
     *   
     * @param array $input 
     */
    public function __construct(array $input = [])
    {
        foreach($input as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;       
            }
        }
    } 
 
    /**
     * The name of the country in which the phone number is registered.
     *
     * @var string
     */
    public $name;

    /**
     * The country's two letter ISO 3166-1 alpha-2 code.
     * 
     * @var string
     */
    public $code;

    /**
     * The country's calling code prefix.
     * 
     * @var string
     */
    public $prefix;
}