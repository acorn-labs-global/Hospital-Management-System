<?php

class formAddCountry extends CFormModel
{
    public $name;
    
    public function rules()
    {
        return array(
            array('name','required')
        );
    }
}


?>
