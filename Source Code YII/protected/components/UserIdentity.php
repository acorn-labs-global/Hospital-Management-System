<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 * 
 * 
 * 
 */
class UserIdentity extends CUserIdentity
{
	private $_id,
                $_type;
        public  $user_type; // user type 0- 1 admin , 2 staff , 3 -patient , 4- doctor

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
                if($this->user_type==1 || $this->user_type==2) {
                    $criteria=new CDbCriteria();
                    $criteria->condition='LOWER(mid)='.strtolower($this->username).' AND management_user_level_id='.$this->user_type;
                    $user=  Management::model()->find($criteria/*'LOWER(mid)=?',array(strtolower($this->username))*/);
                }
                else if ($this->user_type==4)
                    $user=  Doctor::model()->find('LOWER(did)=?',array(strtolower($this->username)));
                else if($this->user_type==3)
                    $user=  Patient::model()->find('LOWER(pid)=?',array(strtolower($this->username)));
                else
                    $user= Nurses::model()->find('LOWER(nid)=?',array(strtolower($this->username)));
                                
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		//else if(!$user->validatePassword($this->password))
                else if (!($user->pass==$this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
                        if($this->user_type==1 || $this->user_type==2) {
                            $this->_id=$user->mid;
                            $this->username=$user->mid;
                        }
                        else if ($this->user_type==4) {
                            $this->_id=$user->did;
                            $this->username=$user->did;
                        }
                        else if ($this->user_type==3){
                            $this->_id=$user->pid;
                            $this->username=$user->pid;
                        }
                        else
                        {
                            $this->_id=$user->nid;
                            $this->username=$user->nid;
                        }
                        
			$this->_type=  $this->user_type;
			$this->errorCode=self::ERROR_NONE;
                        
                        $this->setState("type", $this->_type);
		}
		return $this->errorCode==self::ERROR_NONE;
	}


	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
                //$obj;
                //$obj->id=$this->_id;
                //$obj->type=$this->_type;
		return $this->_id;
	}
        
}