<?php

/**
 * This is the model class for table "hms_doctor".
 *
 * The followings are the available columns in table 'hms_doctor':
 * @property integer $did
 * @property string $name
 * @property string $dob
 * @property string $cnic
 * @property string $sex
 * @property string $marital
 * @property string $pass
 * @property string $reg_date
 * @property integer $phno
 *
 * The followings are the available model relations:
 * @property Patient[] $hmsPatients
 * @property DoctorSpeciality[] $doctorSpecialities
 * @property SystemCity[] $hmsSystemCities
 * @property PatientCase[] $patientCases
 */
class Doctor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Doctor the static model class
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
		return 'hms_doctor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, pass, reg_date', 'required'),
			array('phno', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('cnic', 'length', 'max'=>20),
			array('sex, marital', 'length', 'max'=>1),
			array('pass', 'length', 'max'=>100),
			array('dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('did, name, dob, cnic, sex, marital, pass, reg_date, phno', 'safe', 'on'=>'search'),
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
			'hmsPatients' => array(self::MANY_MANY, 'Patient', 'hms_doctor_has_hms_patient(doctor_did, patient_pid)'),
			'doctorSpecialities' => array(self::HAS_MANY, 'DoctorSpeciality', 'doctor_did'),
			'hmsSystemCities' => array(self::MANY_MANY, 'SystemCity', 'hms_doctort_address(doctor_did, system_city_id)'),
			'patientCases' => array(self::HAS_MANY, 'PatientCase', 'doctor_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'did' => 'Did',
			'name' => 'Name',
			'dob' => 'Dob',
			'cnic' => 'Cnic',
			'sex' => 'Sex',
			'marital' => 'Marital',
			'pass' => 'Pass',
			'reg_date' => 'Reg Date',
			'phno' => 'Phno',
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

		$criteria->compare('did',$this->did);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('cnic',$this->cnic,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('marital',$this->marital,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('reg_date',$this->reg_date,true);
		$criteria->compare('phno',$this->phno);

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