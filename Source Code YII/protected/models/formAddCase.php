<?php

class formAddCase extends CFormModel
{
    public $case_details,
            $case_status;
    
    public function rules()
    {
        return array(
            array('case_details ,case_status','required'),
            array('case_status','numerical')
        );
    }
}


?>
