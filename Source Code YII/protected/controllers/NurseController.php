<?php

class NurseController extends Controller
{
    
    private $userId;
    private $userType;
	public function actionIndex()
	{
                $this->authenUser();
                $cases=  PatientCase::model()->findAll();
		$this->render('index',array('cases'=>$cases));
	}
        
        
        public function actionViewProfile()
        {
            $this->authenUser();
            
            $nurseProfile=  Nurses::model()->find('nid=?',array($this->userId));
            $this->render('viewProfile',array('nurseProfile'=>$nurseProfile));
        }
        public function actionView()
        {
            $this->authenUser();
            
            $caseId=null;
            $patientId=null;
            
            $caseData=null;
            $patientData=null;
            $caseResponses=null;
            $caseMedData=NULL;
            if(isset($_REQUEST['caseId']))
            {
                $caseId=$_REQUEST['caseId'];
                if(!is_numeric($caseId))
                        $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
            }  
            
            if(isset($_REQUEST['patientId']))
            {
                $patientId=$_REQUEST['patientId'];
                if(!is_numeric($patientId))
                        $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
            }
            
            if($patientId!=NULL)
            {
                $patientData=  Patient::model()->find('pid=?',array($patientId));
            }
            if($caseId!=Null)
            {
                $caseData=  PatientCase::model()->find('cid=?',array($caseId));
                $dbConnection=Yii::app()->db;
                $command=$dbConnection->createCommand("SELECT id,response,name,rec_date  FROM hms_patient_case_doc_responses , hms_doctor WHERE 
                    hms_patient_case_cid=".$caseId." 
                    AND hms_doctor_did=did ORDER BY rec_date DESC ");
                $caseResponses=$command->queryAll();
                $caseMedData=  PatientCaseMed::model()->findAll('patient_case_cid=?',array($caseId));
                
                
            }
            $formAddCaseResponse=new formAddCaseResponse();
                    
                
            $this->render('view',array('patientData'=>$patientData,
                'caseData'=>$caseData,
                'caseResponses'=>$caseResponses,
                'caseMedData'=>$caseMedData,
                'formAddCaseResponse'=>$formAddCaseResponse
                ));
            
        }
        
        
        
        
        private function authenUser()
        {
            $userType= Yii::app()->user->getState('type');
            if(!($userType==5))
            {
                $this->redirect(array('home/login','userType'=>'5'));
            }
            $this->userId=  Yii::app()->user->getId();
            $this->userType= Yii::app()->user->getState('type');
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