<?php

class formPrescribeCaseMedicine extends CFormModel
{
    public $med_name,
            $frequency,
            $dose,
            $status
            ;
    
    public function rules()
    {
        return array(
            array('med_name,status','required'),
            array('dose,frequency','numerical')
        );
    }
}


?>