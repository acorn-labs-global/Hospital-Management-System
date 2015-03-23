<?php

class formLogin extends CFormModel
{
    public $userid,
            $password,
            $rememberMe=false,
            $user_type;
    private $_identity;
    
    
    public function rules() {
        
        return array (
            array('userid , password','required'),
            array('userid','numerical'),
            array('password','authenticate')
            
        );
    }
    public function authenticate($attribute,$params)
    {
        $this->_identity=new UserIdentity($this->userid,$this->password);
        $this->_identity->user_type=$this->user_type;
        if(!$this->_identity->authenticate())
            $this->addError('password','Incorrect username or password.');
    }
    public function login()
    {
	if($this->_identity===null)
	{
		$this->_identity=new UserIdentity($this->userid,$this->password);
		$this->_identity->authenticate();
	}
	if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
	{
		$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
		Yii::app()->user->login($this->_identity,$duration);
		return true;
	}
	else
		return false;
   }    
}


?>
