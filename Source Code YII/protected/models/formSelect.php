<?php

class formSelect extends CFormModel
{
    public $select;
    
    public function rules()
    {
        return array(
            array('select','required'),
            array('select','numerical')
        );
    }
}


?>