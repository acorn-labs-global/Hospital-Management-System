<?php

class formAddCity extends CFormModel
{
    public $name,
            $country_id
            ;
    
    public function rules()
    {
        return array(
            array('name,country_id','required'),
            array('country_id','numerical')
        );
    }
}


?>
