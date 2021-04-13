<?php

namespace Abstractapi\PhoneValidation\DomainObject;

class FormatData
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
     * The local or national format of the submitted phone number. 
     * For example, it removes any international formatting, such 
     * as "+1" in the case of the US.
     * 
     * @var string
     */
    public $local;

    /**
     * The international format of the submitted phone number. 
     * This means appending the phone number's country code and a 
     * "+" at the beginning.
     *
     * @var string
     */
    public $international; 
}