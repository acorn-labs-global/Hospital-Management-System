<?php

/**
 * This is the model class for table "hms_system_city".
 *
 * The followings are the available columns in table 'hms_system_city':
 * @property integer $id
 * @property string $name
 * @property integer $system_country_id
 *
 * The followings are the available model relations:
 * @property Doctor[] $hmsDoctors
 * @property Management[] $hmsManagements
 * @property Nurses[] $hmsNurses
 * @property Patient[] $hmsPatients
 * @property SystemCountry $systemCountry
 */
class SystemCity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SystemCity the static model class
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
		return 'hms_system_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, system_country_id', 'required'),
			array('system_country_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, system_country_id', 'safe', 'on'=>'search'),
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
			'hmsDoctors' => array(self::MANY_MANY, 'Doctor', 'hms_doctort_address(system_city_id, doctor_did)'),
			'hmsManagements' => array(self::MANY_MANY, 'Management', 'hms_management_address(system_city_id, management_mid)'),
			'hmsNurses' => array(self::MANY_MANY, 'Nurses', 'hms_nurses_address(system_city_id, nurses_nid)'),
			'hmsPatients' => array(self::MANY_MANY, 'Patient', 'hms_patient_address(city_id, patient_pid)'),
			'systemCountry' => array(self::BELONGS_TO, 'SystemCountry', 'system_country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'system_country_id' => 'System Country',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('system_country_id',$this->system_country_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}