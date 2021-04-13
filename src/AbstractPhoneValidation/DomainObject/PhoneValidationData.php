<?php

namespace Abstractapi\PhoneValidation\DomainObject;

use Abstractapi\PhoneValidation\DomainObject\FormatData;
use Abstractapi\PhoneValidation\DomainObject\CountryData;

class PhoneValidationData
{

    /**
     * Will map succes request result to PhoneValidationData
     * 
     * @param array $succesResult 
     */
    public function __construct(array $succesResult = [])
    { 

        foreach($succesResult as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                if(!is_array($val))
                {
                    $this->$key = $val;    
                } 
                else{
                    $class =__NAMESPACE__."\\".ucfirst($key)."Data";  
                    $this->$key = new $class($val);
                }
            }
        }
    } 

    /**
     * The phone number submitted for validation and verification.
     * 
     * @var string
     */
    public $phone;

    /**
     * Is true if the phone number submitted is valid.
     *
     * @var boolean
     */
    public $valid;

    /**
     * 
     * @var FormatData
     */
    public $format; 

    /**
     *  
     *
     * @var CountryData
     */
    public $country; 

    /**
     * As much location details as are available from our data.
     * This can include the region, state / province, and in some 
     * cases down to the city.
     * 
     * @var string
     */
    public $location;

    /**
     * The carrier that the number is registered with.
     * 
     * @var string
     */
    public $carrier;

    /**
     * The type of phone number. The possible values are: Landline,
     * Mobile, Satellite, Premium, Paging, Special, Toll_Free, and 
     * Unknown.
     * 
     * @var string
     */
    public $type;
}