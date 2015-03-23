<?php

/**
 * This is the model class for table "hms_patient_case_doc_responses".
 *
 * The followings are the available columns in table 'hms_patient_case_doc_responses':
 * @property integer $id
 * @property string $response
 * @property integer $hms_patient_case_cid
 * @property integer $hms_doctor_did
 *
 * The followings are the available model relations:
 * @property PatientCase $hmsPatientCaseC
 * @property Doctor $hmsDoctorD
 */
class PatientCaseDocResponses extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PatientCaseDocResponses the static model class
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
		return 'hms_patient_case_doc_responses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('response, hms_patient_case_cid, hms_doctor_did', 'required'),
			array('hms_patient_case_cid, hms_doctor_did', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, response, hms_patient_case_cid, hms_doctor_did', 'safe', 'on'=>'search'),
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
			'hmsPatientCaseC' => array(self::BELONGS_TO, 'PatientCase', 'hms_patient_case_cid'),
			'hmsDoctorD' => array(self::BELONGS_TO, 'Doctor', 'hms_doctor_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'response' => 'Response',
			'hms_patient_case_cid' => 'Hms Patient Case Cid',
			'hms_doctor_did' => 'Hms Doctor Did',
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
		$criteria->compare('response',$this->response,true);
		$criteria->compare('hms_patient_case_cid',$this->hms_patient_case_cid);
		$criteria->compare('hms_doctor_did',$this->hms_doctor_did);

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