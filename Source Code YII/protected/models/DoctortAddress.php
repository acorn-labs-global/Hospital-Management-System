<?php

/**
 * This is the model class for table "hms_doctort_address".
 *
 * The followings are the available columns in table 'hms_doctort_address':
 * @property integer $doctor_did
 * @property string $address
 * @property integer $system_city_id
 */
class DoctortAddress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DoctortAddress the static model class
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
		return 'hms_doctort_address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor_did, system_city_id', 'required'),
			array('doctor_did, system_city_id', 'numerical', 'integerOnly'=>true),
			array('address', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('doctor_did, address, system_city_id', 'safe', 'on'=>'search'),
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
			'address' => 'Address',
			'system_city_id' => 'System City',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('system_city_id',$this->system_city_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}