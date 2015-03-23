<?php

/**
 * This is the model class for table "hms_management".
 *
 * The followings are the available columns in table 'hms_management':
 * @property integer $mid
 * @property string $name
 * @property string $cnic
 * @property string $dob
 * @property integer $phno
 * @property string $sex
 * @property string $marital
 * @property string $pass
 * @property string $reg_date
 * @property integer $management_user_level_id
 *
 * The followings are the available model relations:
 * @property ManagementUserLevel $managementUserLevel
 * @property SystemCity[] $hmsSystemCities
 * @property Patient[] $patients
 */
class Management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Management the static model class
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
		return 'hms_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, pass, reg_date, management_user_level_id', 'required'),
			array('phno, management_user_level_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('cnic', 'length', 'max'=>20),
			array('sex, marital', 'length', 'max'=>1),
			array('pass', 'length', 'max'=>100),
			array('dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mid, name, cnic, dob, phno, sex, marital, pass, reg_date, management_user_level_id', 'safe', 'on'=>'search'),
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
			'managementUserLevel' => array(self::BELONGS_TO, 'ManagementUserLevel', 'management_user_level_id'),
			'hmsSystemCities' => array(self::MANY_MANY, 'SystemCity', 'hms_management_address(management_mid, system_city_id)'),
			'patients' => array(self::HAS_MANY, 'Patient', 'profile_creator'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mid' => 'Mid',
			'name' => 'Name',
			'cnic' => 'Cnic',
			'dob' => 'Dob',
			'phno' => 'Phno',
			'sex' => 'Sex',
			'marital' => 'Marital',
			'pass' => 'Pass',
			'reg_date' => 'Reg Date',
			'management_user_level_id' => 'Management User Level',
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

		$criteria->compare('mid',$this->mid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cnic',$this->cnic,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('phno',$this->phno);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('marital',$this->marital,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('reg_date',$this->reg_date,true);
		$criteria->compare('management_user_level_id',$this->management_user_level_id);

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