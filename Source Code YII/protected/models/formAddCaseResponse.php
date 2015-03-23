<?php

class formAddCaseResponse extends CFormModel
{
    public $response;
    
    public function rules()
    {
        return array(
            array('response','required'),
        );
    }
}


?>