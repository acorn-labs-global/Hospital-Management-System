<?php

/**
 * This is the model class for table "hms_patient_case".
 *
 * The followings are the available columns in table 'hms_patient_case':
 * @property integer $cid
 * @property integer $hms_patient_pid
 * @property string $case_details
 * @property integer $case_status
 * @property string $rec_date
 *
 * The followings are the available model relations:
 * @property Doctor[] $hmsDoctors
 * @property Patient $hmsPatientP
 * @property PatientCaseDocResponses[] $patientCaseDocResponses
 * @property PatientCaseDocResponses[] $patientCaseDocResponses1
 * @property PatientCaseMed[] $patientCaseMeds
 */
class PatientCase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PatientCase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hms_patient_case';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hms_patient_pid, case_details, case_status, rec_date', 'required'),
			array('hms_patient_pid, case_status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, hms_patient_pid, case_details, case_status, rec_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'hmsDoctors' => array(self::MANY_MANY, 'Doctor', 'hms_doctor_has_hms_patient(hms_patient_case_cid, doctor_did)'),
			'hmsPatientP' => array(self::BELONGS_TO, 'Patient', 'hms_patient_pid'),
			'patientCaseDocResponses' => array(self::HAS_MANY, 'PatientCaseDocResponses', 'hms_patient_case_cid'),
			'patientCaseDocResponses1' => array(self::HAS_MANY, 'PatientCaseDocResponses', 'hms_patient_case_hms_patient_pid'),
			'patientCaseMeds' => array(self::HAS_MANY, 'PatientCaseMed', 'patient_case_cid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'Cid',
			'hms_patient_pid' => 'Hms Patient Pid',
			'case_details' => 'Case Details',
			'case_status' => 'Case Status',
			'rec_date' => 'Rec Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cid',$this->cid);
		$criteria->compare('hms_patient_pid',$this->hms_patient_pid);
		$criteria->compare('case_details',$this->case_details,true);
		$criteria->compare('case_status',$this->case_status);
		$criteria->compare('rec_date',$this->rec_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function recDate()
        {
            $sqldate = date('Y-m-d H:i:s');
            $this->rec_date=$sqldate;
        }
}