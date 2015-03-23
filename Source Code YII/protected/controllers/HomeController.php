<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
                $this->checkLoggedIn();
		$this->render('index');
	}
        
        
        public function actionLogin()
        {
            $this->checkLoggedIn();
            
            $formLogin=new formLogin();
            $userType=$_REQUEST['userType'];    // user type depend on 1-admin , 2 -staff , 3- patient , 4-doctor
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
	    {
		echo CActiveForm::validate($formLogin);
		Yii::app()->end();
	    }
            if(isset($_POST['formLogin']))
	    {             
		$formLogin->attributes=$_POST['formLogin'];
                $formLogin->user_type=$userType;
		// validate user input and redirect to the previous page if valid
		if($formLogin->validate() && $formLogin->login())
                {
                    $this->redirect(array('home/index'));
                }
		
                 
                
	    }
            echo Yii::app()->user->getState("type");
            $this->render('login',array('formLogin'=>$formLogin,'userType'=>$userType));
        }
        public function actionLogOut()
        {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
        }
        
        
        private function checkLoggedIn()
        {
            /*
             * Check the user logged in and redirect according to its type 
             */
                $userId=Yii::app()->user->getId(); // getting user id from php session
                if($userId!=null)
                {
                    $userType=  Yii::app()->user->getState('type');
                    if($userType==1 || $userType==2)
                        $this->redirect (array('manage/index'));  // redirect to manager and administrator
                    else if($userType==3)
                       $this->redirect (array('patient/index')); //redirect to patient
                    else if($userType==4)
                      $this->redirect (array('doctor/index'));   //redirect doctor
                    else
                     $this->redirect (array('nurse/index'));   //redirect nurse
                }
        }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}