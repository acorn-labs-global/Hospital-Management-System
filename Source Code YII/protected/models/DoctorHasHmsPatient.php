<?php

/**
 * This is the model class for table "hms_doctor_has_hms_patient".
 *
 * The followings are the available columns in table 'hms_doctor_has_hms_patient':
 * @property integer $doctor_did
 * @property integer $hms_patient_case_cid
 * @property string $appointment_date
 */
class DoctorHasHmsPatient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DoctorHasHmsPatient the static model class
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
		return 'hms_doctor_has_hms_patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor_did, hms_patient_case_cid, appointment_date', 'required'),
			array('doctor_did, hms_patient_case_cid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('doctor_did, hms_patient_case_cid, appointment_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'doctor_did' => 'Doctor Did',
			'hms_patient_case_cid' => 'Hms Patient Case Cid',
			'appointment_date' => 'Appointment Date',
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

		$criteria->compare('doctor_did',$this->doctor_did);
		$criteria->compare('hms_patient_case_cid',$this->hms_patient_case_cid);
		$criteria->compare('appointment_date',$this->appointment_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}