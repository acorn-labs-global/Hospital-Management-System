<?php

/**
 * This is the model class for table "hms_nurses".
 *
 * The followings are the available columns in table 'hms_nurses':
 * @property integer $nid
 * @property string $name
 * @property string $cnic
 * @property string $dob
 * @property integer $phno
 * @property string $sex
 * @property string $marital
 * @property string $pass
 * @property string $reg_date
 *
 * The followings are the available model relations:
 * @property SystemCity[] $hmsSystemCities
 */
class Nurses extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nurses the static model class
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
		return 'hms_nurses';
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
			array('nid, name, cnic, dob, phno, sex, marital, pass, reg_date', 'safe', 'on'=>'search'),
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
			'hmsSystemCities' => array(self::MANY_MANY, 'SystemCity', 'hms_nurses_address(nurses_nid, system_city_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nid' => 'Nid',
			'name' => 'Name',
			'cnic' => 'Cnic',
			'dob' => 'Dob',
			'phno' => 'Phno',
			'sex' => 'Sex',
			'marital' => 'Marital',
			'pass' => 'Pass',
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

		$criteria->compare('nid',$this->nid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cnic',$this->cnic,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('phno',$this->phno);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('marital',$this->marital,true);
		$criteria->compare('pass',$this->pass,true);
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