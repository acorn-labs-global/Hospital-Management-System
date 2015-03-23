<?php

class formAllocDoctorCase extends CFormModel
{
    public $doctors,
            $appointment_date
            ;
    
    public function rules()
    {
        return array(
            array('doctors,status,appointment_date','required')
        );
    }
}


?>