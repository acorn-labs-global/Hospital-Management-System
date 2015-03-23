<?php

class PatientController extends Controller
{
    private $userId;
    private $userType;
    
	public function actionIndex()
	{
                $this->authenUser();
                
                
                $dbConnection=Yii::app()->db;
                $command=$dbConnection->createCommand("
                SELECT hms_patient_pid AS pid,rec_date,cid, case_status, SUBSTRING( `case_details` , 1, 100 ) AS case_details, group_concat( name ) AS
                names FROM hms_patient_case, hms_doctor_has_hms_patient, hms_doctor
                WHERE hms_patient_pid =1
                AND cid = hms_patient_case_cid
                AND did = doctor_did
                GROUP BY cid");
                $patientCases=$command->queryAll();
		$this->render('index',array('patientCases'=>$patientCases));
	}
        
        public function actionView()
        {
            $this->authenUser();
            
            $caseId=null;
            
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
            if($caseId!=Null)
            {
                $caseData=  PatientCase::model()->find('cid=?',array($caseId));
                if($caseData->hms_patient_pid!=$this->userId)
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                $dbConnection=Yii::app()->db;
                $command=$dbConnection->createCommand("SELECT id,response,name,rec_date  FROM hms_patient_case_doc_responses , hms_doctor WHERE 
                    hms_patient_case_cid=".$caseId." 
                    AND hms_doctor_did=did ORDER BY rec_date DESC ");
                $caseResponses=$command->queryAll();
                $caseMedData=  PatientCaseMed::model()->findAll('patient_case_cid=?',array($caseId));
                
                
            }
                    
                
            $this->render('view',array('patientData'=>$patientData,
                'caseData'=>$caseData,
                'caseResponses'=>$caseResponses,
                'caseMedData'=>$caseMedData
                ));
            
        }
        
        public function actionViewProfile()
        {
            $this->authenUser();
            $patientData=  Patient::model()->find('pid=?',array($this->userId));
            $this->render('viewProfile',array('patientData'=>$patientData));
        }
        
        
        
        
        private function authenUser()
        {
            $userType= Yii::app()->user->getState('type');
            if(!($userType==3))
            {
                $this->redirect(array('home/login','userType'=>'3'));
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