<?php

class DoctorController extends Controller
{
    
    private $userId;
    private $userType;
    
	public function actionIndex()
	{
                $this->authenUser();
                
                $doctorAppointments=$this->getDoctorAppointments();
                //print_r($doctorAppointments);
		$this->render('index',array('doctorAppointments'=>$doctorAppointments
                        
                        ));
	}
        public function actionAddCaseResponse()
        {
            $this->authenUser();
            $formAddCaseResponse=new formAddCaseResponse();
            $caseId;
            $caseData;
            
            if(isset($_REQUEST['caseId']))
            {
                $caseId=$_REQUEST['caseId'];
                if(!is_numeric($caseId))
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else
                {
                    $queryCriteria=new CDbCriteria();
                    $queryCriteria->condition="hms_patient_case_cid=".$caseId." AND doctor_did=".$this->userId;
                    $caseData=  DoctorHasHmsPatient::model()->find($queryCriteria);
                    if($caseData==null)
                        Yii::app()->end(); //doctor doesnt have this case alloted
                    else
                    {
                        // create and inser thte form data
                        if(isset($_REQUEST['formAddCaseResponse']))
                        {
                            $addCaseResponse=new PatientCaseDocResponses();
                            $addCaseResponse->attributes=$_REQUEST['formAddCaseResponse'];
                            $addCaseResponse->hms_patient_case_cid=$caseId;
                            $addCaseResponse->hms_doctor_did=$this->userId;
                            $addCaseResponse->recDate();
                            $addCaseResponse->save();
                            
                            $patientAndCaseIds=  PatientCase::model()->find('cid=?',array($caseId));
                            $this->redirect(array('doctor/view','caseId'=>$patientAndCaseIds->cid,'patientId'=>$patientAndCaseIds->hms_patient_pid));
                            
                            
                        }
                    }
                        
                    
                }
            }
            else
                $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
            
            $this->render('addCaseResponse',array('formAddCaseResponse'=>$formAddCaseResponse
                    ));
        }
        public function actionPrescribeCaseMedicine()
        {
            $this->authenUser();
            $formPrescribeCaseMedicine=new formPrescribeCaseMedicine();
            if(isset($_REQUEST['caseId']))
            {
                $caseId=$_REQUEST['caseId'];
                if(!is_numeric($caseId))
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else
                {
                    $queryCriteria=new CDbCriteria();
                    $queryCriteria->condition="hms_patient_case_cid=".$caseId." AND doctor_did=".$this->userId;
                    $caseData=  DoctorHasHmsPatient::model()->find($queryCriteria);
                    if($caseData==null)
                        Yii::app()->end(); //doctor doesnt have this case alloted
                    else
                    {
                        if(isset($_REQUEST['formPrescribeCaseMedicine']))
                        {
                            $addPrescribeCaseMedicine=new PatientCaseMed();
                            $addPrescribeCaseMedicine->attributes=$_REQUEST['formPrescribeCaseMedicine'];
                            $addPrescribeCaseMedicine->recDate();
                            $addPrescribeCaseMedicine->patient_case_cid=$caseId;
                            $addPrescribeCaseMedicine->save();
                            $patientAndCaseIds=  PatientCase::model()->find('cid=?',array($caseId));
                            $this->redirect(array('doctor/view','caseId'=>$patientAndCaseIds->cid,'patientId'=>$patientAndCaseIds->hms_patient_pid));
                        }
                    }
                }
            }
            else
                $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
            
            
            $this->render('prescribeCaseMedicine',array('formPrescribeCaseMedicine'=>$formPrescribeCaseMedicine
                    ));
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
                $criteria=new CDbCriteria();
                $criteria->condition="doctor_did=".$this->userId." AND hms_patient_case_cid=".$caseId;
                if(DoctorHasHmsPatient::model()->find($criteria)==null)
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
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
        public function actionStatisticsAppointment()
        {
            $this->authenUser();
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("
                SELECT date(appointment_date) AS date, count( hms_patient_case_cid ) AS cases
                FROM hms_doctor_has_hms_patient
                WHERE doctor_did =".$this->userId."
                GROUP BY date( appointment_date ) 
                ");
            $data=$command->queryAll();
            $days;
            $noCases;
            $i=0;
            foreach($data as $d)
            {
                $days[$i]=$d['date'];
                $noCases[$i]=$d['cases'];
                $i++;
            }
            
            $this->render('statisticsAppointment',array('days'=>$days,
                'noCases'=>$noCases
                ));
        }
        public function actionStatisticsPatient()
        {
            $this->authenUser();
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("
                SELECT count(cid) AS cases,hms_patient_pid AS pid FROM hms_doctor_has_hms_patient,hms_patient_case WHERE 
                doctor_did=".$this->userId."
                AND cid=hms_patient_case_cid GROUP BY hms_patient_pid
                ");
            $data=$command->queryAll();
            $patient;
            $noCases;
            $i=0;
            foreach($data as $d)
            {
                $patient[$i]=$d['pid'];
                $noCases[$i]=$d['cases'];
                $i++;
            }
            $this->render('statisticsPatient',array('patient'=>$patient,
                'noCases'=>$noCases
                ));
        }
        public function actionViewProfile()
        {
            $this->authenUser();
            
            $doctorProfile=  Doctor::model()->find('did=?',array($this->userId));
            
            $this->render('viewProfile',array('doctorProfile'=>$doctorProfile));
        }
        
        private function authenUser()
        {
            $userType= Yii::app()->user->getState('type');
            if(!($userType==4))
            {
                $this->redirect(array('home/login','userType'=>'4'));
            }
            $this->userId=  Yii::app()->user->getId();
            $this->userType= Yii::app()->user->getState('type');
        }
        private function getDoctorAppointments()
        {
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("SELECT pid, name, cid, date( appointment_date ) AS appointment_date, SUBSTRING( `case_details` , 1, 100 ) AS case_details, case_status
            FROM hms_doctor_has_hms_patient, hms_patient_case, hms_patient
            WHERE doctor_did =".$this->userId."
            AND hms_patient_pid = pid
            AND hms_patient_case.cid = hms_doctor_has_hms_patient.hms_patient_case_cid
            ORDER BY appointment_date DESC
            LIMIT 0 , 30
                ");
            return $command->queryAll();
        }
        private function getPatIfFromCaseId($caseId)
        {
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand('SELECT  hms_patient_pid AS pid,cid FROM hms_patient_case, hms_patient_case_med WHERE
                cid='.$caseId.'
                AND  cid=patient_case_cid LIMIT 1');
            return $command->query();
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