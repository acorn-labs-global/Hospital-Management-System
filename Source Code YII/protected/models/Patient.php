<?php

/**
 * This is the model class for table "hms_patient".
 *
 * The followings are the available columns in table 'hms_patient':
 * @property integer $pid
 * @property string $name
 * @property string $dob
 * @property string $cnic
 * @property integer $phno
 * @property string $sex
 * @property string $marital
 * @property string $pass
 * @property integer $profile_creator
 * @property string $reg_date
 *
 * The followings are the available model relations:
 * @property Doctor[] $hmsDoctors
 * @property Management $profileCreator
 * @property SystemCity[] $hmsSystemCities
 * @property PatientCase[] $patientCases
 * @property PatientCurrMed[] $patientCurrMeds
 * @property RoomBeds[] $hmsRoomBeds
 * @property PatientHistory[] $patientHistories
 */
class Patient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Patient the static model class
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
		return 'hms_patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, pass, profile_creator, reg_date', 'required'),
			array('phno, profile_creator', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('cnic', 'length', 'max'=>20),
			array('sex, marital', 'length', 'max'=>1),
			array('pass', 'length', 'max'=>100),
			array('dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pid, name, dob, cnic, phno, sex, marital, pass, profile_creator, reg_date', 'safe', 'on'=>'search'),
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
			'hmsDoctors' => array(self::MANY_MANY, 'Doctor', 'hms_doctor_has_hms_patient(patient_pid, doctor_did)'),
			'profileCreator' => array(self::BELONGS_TO, 'Management', 'profile_creator'),
			'hmsSystemCities' => array(self::MANY_MANY, 'SystemCity', 'hms_patient_address(patient_pid, city_id)'),
			'patientCases' => array(self::HAS_MANY, 'PatientCase', 'patient_pid'),
			'patientCurrMeds' => array(self::HAS_MANY, 'PatientCurrMed', 'patient_pid'),
			'hmsRoomBeds' => array(self::MANY_MANY, 'RoomBeds', 'hms_patient_has_hms_beds(patient_pid, beds_bid)'),
			'patientHistories' => array(self::HAS_MANY, 'PatientHistory', 'patient_pid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pid' => 'Pid',
			'name' => 'Name',
			'dob' => 'Dob',
			'cnic' => 'Cnic',
			'phno' => 'Phno',
			'sex' => 'Sex',
			'marital' => 'Marital',
			'pass' => 'Pass',
			'profile_creator' => 'Profile Creator',
			'reg_date' => 'Reg Date',
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

		$criteria->compare('pid',$this->pid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('cnic',$this->cnic,true);
		$criteria->compare('phno',$this->phno);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('marital',$this->marital,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('profile_creator',$this->profile_creator);
		$criteria->compare('reg_date',$this->reg_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function regDate()
        {
            $sqldate = date('Y-m-d H:i:s');
            $this->reg_date=$sqldate;
        }
}