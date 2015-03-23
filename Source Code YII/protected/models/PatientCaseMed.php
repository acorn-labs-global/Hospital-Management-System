<?php

/**
 * This is the model class for table "hms_patient_case_med".
 *
 * The followings are the available columns in table 'hms_patient_case_med':
 * @property integer $id
 * @property integer $patient_case_cid
 * @property string $med_name
 * @property integer $frequency
 * @property integer $dose
 * @property integer $status
 * @property string $rec_date
 *
 * The followings are the available model relations:
 * @property PatientCase $patientCaseC
 */
class PatientCaseMed extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PatientCaseMed the static model class
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
		return 'hms_patient_case_med';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_case_cid, med_name, status, rec_date', 'required'),
			array('patient_case_cid, frequency, dose, status', 'numerical', 'integerOnly'=>true),
			array('med_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, patient_case_cid, med_name, frequency, dose, status, rec_date', 'safe', 'on'=>'search'),
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
			'patientCaseC' => array(self::BELONGS_TO, 'PatientCase', 'patient_case_cid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'patient_case_cid' => 'Patient Case Cid',
			'med_name' => 'Med Name',
			'frequency' => 'Frequency',
			'dose' => 'Dose',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('patient_case_cid',$this->patient_case_cid);
		$criteria->compare('med_name',$this->med_name,true);
		$criteria->compare('frequency',$this->frequency);
		$criteria->compare('dose',$this->dose);
		$criteria->compare('status',$this->status);
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