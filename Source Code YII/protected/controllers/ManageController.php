<?php

class ManageController extends Controller
{
    
    private $userId;
    private $userType;
    
	public function actionIndex()
	{
            
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("
            SELECT count(doctor_did) AS docs,hms_patient_case_cid AS cid FROM hms_doctor_has_hms_patient GROUP BY hms_patient_case_cid
            ");
            $data=$command->queryAll();
            $cases;
            $doctors;
            $i=0;
            foreach($data as $d)
            {
                $cases[$i]=$d['cid'];
                $doctors[$i]=$d['docs'];
                $i++;
            }
            //print_r($cases);
                //print_r($doctors);
            
		$this->render('index',array('cases'=>$cases,
                    'doctors'=>$doctors
                    ));
	}
        
        
        public function actionAddPatient()
        {
            $this->authenUser();
            
            $formAddPatient=new formAddPatient();
            $addPatient=new Patient();
            
            $systemCities= SystemCity::model()->findAll();
            
            $systemCitiesData=$this->generateSystemCities($systemCities);
            
            if(isset($_POST['formAddPatient']))
            {
                $addPatient->attributes=$_POST['formAddPatient'];
                $addPatient->profile_creator=  $this->userId;
                $addPatient->regDate();
                $addPatient->save();
                
                if($addPatient->pid!=NULL)
                {
                    $patientAddress=$_POST['formAddPatient']['address'];
                    $patientCity=$_POST['formAddPatient']['city'];
                    if($patientAddress!='' || $patientCity!='')
                    {
                        
                        $addPatientAddress=new PatientAddress();
                        $addPatientAddress->patient_pid=$addPatient->pid;
                        
                        if($patientAddress!='')
                            $addPatientAddress->address=$patientAddress;
                        if($patientCity!='')
                            $addPatientAddress->city_id=$patientCity;
                        
                        
                        $addPatientAddress->save();
                        $this->redirect(array('manage/selectPatient'));
                    }
                }
                
                Yii::app()->end();
            }
            
            $formAddPatient->generatePassword();
            $this->render('addPatient',array('formAddPatient'=>$formAddPatient,
                'systemCitiesData'=>$systemCitiesData
                    ));
        }
        public function actionSelectPatient()
        {
            $this->authenUser();
            //$this->authenManagement();
            if(isset($_POST['formSelect']))
            {
                $this->redirect(array('viewPatient','patientId'=>$_POST['formSelect']['select']));
            }
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("SELECT pid,concat(pid,' ',name) AS list FROM hms_patient");
            $data=$command->queryAll();
            $patientList;
            foreach($data as $dt)
            {
                $patientList[$dt['pid']]=$dt['list'];
            }
            $formSelect=new formSelect();
            $this->render('selectPatient',array('formSelect'=>$formSelect,
                'list'=>$patientList));
        }
        public function actionViewPatient()
        {
            $this->authenUser();
            $patientId;
            $patientData;
            if(isset($_REQUEST['patientId']))
            {
                $patientId=$_REQUEST['patientId'];
                if(!is_numeric($patientId))
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else
                {
                    
                    $patientData =  Patient::model()->find('pid=?',array($patientId));
                    if($patientData==null)
                        $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                    
                }
            }
            $this->render('ViewPatient',array('patientData'=>$patientData));
        }
        
        
        public function actionAddDoctor()
        {
            $this->authenUser();
            $this->authenManagement();
            $formAddDoctor=new formAddDoctor();
            $addDoctor=new Doctor();
            $systemCities= SystemCity::model()->findAll();
            
            $systemCitiesData=$this->generateSystemCities($systemCities);
            
            if(isset($_POST['formAddDoctor']))
            {
                $addDoctor->attributes=$_POST['formAddDoctor'];
                $addDoctor->regDate();
                print_r($_POST['formAddDoctor']);
                $addDoctor->save();
                if($addDoctor->did!=NULL)
                {
                    $doctorAddress=$_POST['formAddDoctor']['address'];
                    $doctorCity=$_POST['formAddDoctor']['city'];
                    if($doctorAddress!='' || $doctorCity!='')
                    {
                        
                        $addDoctorAddress=new DoctortAddress();
                        $addDoctorAddress->doctor_did=$addDoctor->did;
                        
                        if($doctorAddress!='')
                            $addDoctorAddress->address=$doctorAddress;
                        if($doctorCity!='')
                            $addDoctorAddress->system_city_id=$doctorCity;
                        
                        
                        $addDoctorAddress->save();
                    }
                }
                Yii::app()->end();
            }
            
            $formAddDoctor->generatePassword();
            $this->render('addDoctor',array('formAddDoctor'=>$formAddDoctor,
                'systemCitiesData'=>$systemCitiesData
                    ));
        }
        public function actionSelectDoctor()
        {
            $this->authenUser();
            $this->authenManagement();
            if(isset($_POST['formSelect']))
            {
                $this->redirect(array('viewDoctor','doctorId'=>$_POST['formSelect']['select']));
            }
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("SELECT did,concat(did,' ',name) AS list FROM hms_doctor");
            $data=$command->queryAll();
            $doctorList;
            foreach($data as $dt)
            {
                $doctorList[$dt['did']]=$dt['list'];
            }
            $formSelect=new formSelect();
            $this->render('selectDoctor',array('formSelect'=>$formSelect,
                'list'=>$doctorList));
        }
        public function actionViewDoctor()
        {
            $this->authenUser();
            $doctorId;
            $doctorData;
            if(isset($_REQUEST['doctorId']))
            {
                $doctorId=$_REQUEST['doctorId'];
                if(!is_numeric($doctorId))
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else
                {
                    $doctorData = Doctor::model()->find('did=?',array($doctorId));
                    if($doctorData==null)
                        $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                    
                }
            }
            $this->render('viewDoctor',array('doctorProfile'=>$doctorData));
        }
        
        public function actionAddNurse()
        {
            $this->authenUser();
            
            $formAddNurse=new formAddNurses();
            $addNurse=new Nurses;
            $systemCities= SystemCity::model()->findAll();
            $systemCitiesData=$this->generateSystemCities($systemCities);
            
            if(isset($_POST['formAddNurses']))
            {
                $addNurse->attributes=$_POST['formAddNurses'];
                $addNurse->regDate();
                print_r($_POST['formAddNurses']);
                $addNurse->save();
                
                if($addNurse->nid!=NULL)
                {
                    $nurseAddress=$_POST['formAddNurses']['address'];
                    $nurseCity=$_POST['formAddNurses']['city'];
                    if($nurseAddress!='' || $nurseCity!='')
                    {
                        
                        $addNurseAddress=new NursesAddress();
                        $addNurseAddress->nurses_nid=$addNurse->nid;
                        
                        if($nurseAddress!='')
                            $addNurseAddress->address=$nurseAddress;
                        if($nurseCity!='')
                            $addNurseAddress->system_city_id=$nurseCity;
                        
                        
                        $addNurseAddress->save();
                    }
                }
                Yii::app()->end();
            }
            
            $formAddNurse->generatePassword();
            $this->render('addNurse',array('formAddNurse'=>$formAddNurse,
                'systemCitiesData'=>$systemCitiesData
                    ));
        }
        public function actionSelectNurse()
        {
            $this->authenUser();
            $this->authenManagement();
            if(isset($_POST['formSelect']))
            {
                $this->redirect(array('viewNurse','nurseId'=>$_POST['formSelect']['select']));
            }
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("SELECT nid,concat(nid,' ',name) AS list FROM hms_nurses");
            $data=$command->queryAll();
            $NurseList;
            foreach($data as $dt)
            {
                $NurseList[$dt['nid']]=$dt['list'];
            }
            $formSelect=new formSelect();
            $this->render('selectNurse',array('formSelect'=>$formSelect,
                'list'=>$NurseList));
        }
        public function actionViewNurse()
        {
            $this->authenUser();
            $nurseId;
            $nurseData;
            if(isset($_REQUEST['nurseId']))
            {
                $nurseId=$_REQUEST['nurseId'];
                if(!is_numeric($nurseId))
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else
                {
                    $nurseData = Nurses::model()->find('nid=?',array($nurseId));
                    if($nurseData==null)
                        $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                    
                }
            }
            $this->render('viewNurse',array('nurseProfile'=>$nurseData));
        }
        
        
        public function actionAddManagement()
        {
            $this->authenUser();
            $this->authenManagement();
            
            $formAddManagement=new formAddManagement();
            $addManagement=new Management;
            $systemCities= SystemCity::model()->findAll();
            $systemCitiesData=$this->generateSystemCities($systemCities);
            $managementUserLevels=  ManagementUserLevel::model()->findAll();
            
            if(isset($_POST['formAddManagement']))
            {
                $addManagement->attributes=$_POST['formAddManagement'];
                $addManagement->regDate();
                $userLevel=$_POST['formAddManagement']['level'];
                $addManagement->management_user_level_id=$userLevel;
                //print_r($_POST['formAddManagement']);
                $addManagement->save(); //store the record for management user
                
                if($addManagement->mid!=NULL)
                {
                    $managementAddress=$_POST['formAddManagement']['address'];
                    $managementCity=$_POST['formAddManagement']['city'];
                    if($managementAddress!='' || $managementCity!='')
                    {
                        
                        $addManagementAddress=new ManagementAddress();
                        $addManagementAddress->management_mid=$addManagement->mid;
                        
                        if($managementAddress!='')
                            $addManagementAddress->address=$managementAddress;
                        if($managementCity!='')
                            $addManagementAddress->system_city_id=$managementCity;
                        
                        
                        $addManagementAddress->save();// store the record for specific mangement address
                        
                        $this->redirect(array('manage/viewManagement','managementId'=>$addManagement->mid));
                    }
                }
                Yii::app()->end();
            }
            
            $formAddManagement->generatePassword();
            $this->render('addManagement',array('formAddManagement'=>$formAddManagement,
                'systemCitiesData'=>$systemCitiesData,
                'managementUserLevels'=>$this->generateSystemCities($managementUserLevels)
                    ));
        }
        
        public function actionSelectManagement()
        {
            $this->authenUser();
            $this->authenManagement();
            if(isset($_POST['formSelect']))
            {
                $this->redirect(array('viewManagement','managementId'=>$_POST['formSelect']['select']));
            }
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("SELECT mid,concat(mid,' ',name) AS list FROM hms_management");
            $data=$command->queryAll();
            $managementList;
            foreach($data as $dt)
            {
                $managementList[$dt['mid']]=$dt['list'];
            }
            $formSelect=new formSelect();
            $this->render('selectManagement',array('formSelect'=>$formSelect,
                'list'=>$managementList));
        }
        public function actionViewManagement()
        {
            $this->authenUser();
            $this->authenManagement();
            
            $managementId;
            $managementData;
            if(isset($_REQUEST['managementId']))
            {
                $managementId=$_REQUEST['managementId'];
                if(!is_numeric($managementId))
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else
                {
                    $managementData = Management::model()->find('mid=?',array($managementId));
                    if($managementData==null)
                        $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                    
                }
            }
            $this->render('viewManagement',array('managementProfile'=>$managementData));
        }
        
        public function actionAddCase()
        {
            $this->authenUser();
            $patientId;
            $formAddCase=new formAddCase();
            $patientData;
            
            
            if(isset($_REQUEST['patientId']))
            {
                $patientId=$_REQUEST['patientId'];
                if(!is_numeric($patientId)) 
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else {
                    $test;
                    $patientData=Patient::model()->find('pid=?',array($patientId));
                    if( $patientData == null)
                            $this->redirect($statusCode=404); // invalid request redirected to 404 not found page
                    $caseData=  PatientCase::model()->find('hms_patient_pid=?',array($patientId));
                    if(isset($_POST['formAddCase']))
                    {
                        $addPatientCase=new PatientCase();
                        $addPatientCase->attributes=$_POST['formAddCase'];
                        $addPatientCase->hms_patient_pid=$patientId;
                        $addPatientCase->recDate();
                        $addPatientCase->save();
                        //Yii::app()->end();
                    }
                }
                    
            }
            else
                $this->redirect($statusCode=404); // invalid request redirected to 404 not found page
            
            
            
            $this->render('addCase',array('formAddCase'=>$formAddCase,
                'patientData'=>$patientData
                    ));
        }
        
        
        public function actionAllocDoctorCase()
        {
            $this->authenUser();
            $formAllocDoctorCase=new formAllocDoctorCase();
            
            if(isset($_REQUEST['caseId']))
            {
                $caseId=$_REQUEST['caseId'];
                if(!is_numeric($caseId))
                    $this->redirect($statusCode=404); // invalid request redirected to 404 not found page 
                else
                {
                    if(isset($_POST['formAllocDoctorCase']))
                    {
                        $doctorId=$_POST['formAllocDoctorCase']['doctors'];
                        echo $doctorId;
                       // Yii::app ()->end();
                        $criteria=new CDbCriteria();
                        $criteria->condition="doctor_did=".$doctorId." AND hms_patient_case_cid=".$caseId;
                        if(DoctorHasHmsPatient::model()->find($criteria)==null)
                        {
                            $addDoctAllocPat=new DoctorHasHmsPatient();
                            $addDoctAllocPat->doctor_did=$doctorId;
                            $addDoctAllocPat->appointment_date=$_POST['formAllocDoctorCase']['appointment_date'];
                            $addDoctAllocPat->hms_patient_case_cid=$caseId;
                            $addDoctAllocPat->save();
                            $this->redirect(array('manage/selectPatient'));
                        }
                        else
                            Yii::app ()->end();
                    }
                }
            }
            
            $getDoctorsAndSpeciality=  $this->getDoctorAndSpeciality();
            $this->render('allocDoctorCase',array('formAllocDoctorCase'=>$formAllocDoctorCase,
                'doctorAndSpeciality'=>$getDoctorsAndSpeciality
                    ));
        }
        
       
        
        public function actionAddCountry()
        {
            $this->authenUser();
            $this->authenManagement();
            
            $formAddCountry=new formAddCountry();
            if(isset($_POST['formAddCountry']))
            {
                $addCountry=new SystemCountry();
                $addCountry->attributes=$_POST['formAddCountry'];
                $addCountry->save();
                $this->redirect(array('manage/viewCountries'));
            }
            
            $this->render('addCountry',array('formAddCountry'=>$formAddCountry));
        }
        public function actionAddCity()
        {
            $this->authenUser();
            $this->authenManagement();
            
            $formAddCity=new formAddCity();
            if(isset($_POST['formAddCity']))
            {
                $addCity=  new SystemCity();
                $addCity->attributes=$_POST['formAddCity'];
                $addCity->system_country_id=$_POST['formAddCity']['country_id'];
                $addCity->save();
                $this->redirect(array('manage/viewCities'));
            }
            
            
            $countries=$this->generateSystemCountries(SystemCountry::model()->findAll());
            
            $this->render('addCity',array('formAddCity'=>$formAddCity,
                'countries'=>$countries
                ));
        }
        
        
        
        public function actionViewCountries()
        {
            $this->authenUser();
            $this->authenManagement();
            
            $countries=  SystemCountry::model()->findAll();
           // print_r($countries);
            $this->render('viewCountries',array('countries'=>$countries));
        }
        public function actionViewCities()
        {
            $this->authenUser();
            $this->authenManagement();
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("
                SELECT city.name AS city_name, country.name AS country_name, city.id AS city_id, country.id AS country_id
                FROM hms_system_city AS city, hms_system_country AS country
                WHERE city.system_country_id = country.id
                ORDER BY country.id ASC ");
            $cities=$command->queryAll();
            
            $this->render('viewCities',array('cities'=>$cities));
        }
        /*
         * 
         * private method for internal data processing and user and etc validation 
         */
        private function authenUser()
        {
            $userType= Yii::app()->user->getState('type');
            if(!($userType==1 || $userType==2))
            {
                
                $this->redirect(array('home/index'));
            }
            $this->userId=  Yii::app()->user->getId();
            $this->userType= Yii::app()->user->getState('type');
        }
        private function authenManagement()
        {
            if($this->userType!=1)
            {
                $this->redirect(array('home/index'));
            }
        }
        
        private function generateSystemCities($data)
        {
            $cities;
            foreach($data as $city)
            {
                $cities[$city->id]=$city->name;
            }
            return $cities;
        }
        private function generateSystemCountries($data)
        {
            $countries;
            foreach($data as $country)
            {
                $countries[$country->id]=$country->name;
            }
            return $countries;
        }
        private function getDoctorAndSpeciality()
        {
            $dbConnection=Yii::app()->db;
            $command=$dbConnection->createCommand("SELECT hms_doctor.did, concat( hms_doctor.name, ' | ', group_concat( hms_doctor_speciality.speciality separator ' , ') )
            AS docspec FROM hms_doctor, hms_doctor_speciality
            WHERE hms_doctor.did = hms_doctor_speciality.doctor_did
            GROUP BY hms_doctor_speciality.doctor_did
            ");
            
            
            $data=$command->queryAll();
            if($data==null) {
                echo 'No Speciality Found, Report To System Administrator';
                Yii::app()->end();
            }
            $response;
            //print_r($data);
            foreach($data as $dt)
            {
                $response[$dt['did']]=$dt['docspec'];
            }
            return $response;
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