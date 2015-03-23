<?php

class formAddDoctor extends CFormModel
{
    
    public $name,
            $dob,
            $cnic,
            $phno,
            $sex,
            $marital,
            $pass,
            $address,
            $city
            
            ;
    
    public function rules ()
    {
        return array(
            array('name ,sex ,pass','required'),
            array('dob','date','format'=>'yyyy-mm-dd'),
            array('phno','numerical'),
            array('address','length','max'=>200)
        );
    }
    public function generatePassword()
    {
            $merged=array_merge (range('A','Z'),range(0,9),range('a','z'));
            shuffle ($merged);
            $password = implode(array_slice($merged, 0, 7));
            $this->pass = $password;
    }
    /*
    public function checkUserSex($attribute,$params)
    {
        if(!($this->attribute=='m' || $this->attribute=='f'))
             $this->addError($attribute,'Sex Field Only Required m or f');
    }*/
            
}
?>
