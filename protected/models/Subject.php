<?php

/**
 * This is the model class for table "tbl_subject".
 *
 * The followings are the available columns in table 'tbl_subject':
 * @property integer $subject_id
 * @property string $subject_name
 * @property integer $faculty_id
 * @property string $subject_id_university
 * @property integer $teacher_id
 */
class Subject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('faculty_id, teacher_id', 'numerical', 'integerOnly'=>true),
			array('subject_name, subject_id_university', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('subject_id, subject_name, faculty_id, subject_id_university, teacher_id', 'safe', 'on'=>'search'),
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
			'subject_id' => 'Subject',
			'subject_name' => 'Subject Name',
			'faculty_id' => 'Faculty',
			'subject_id_university' => 'Subject Id University',
			'teacher_id' => 'Teacher',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('subject_name',$this->subject_name,true);
		$criteria->compare('faculty_id',$this->faculty_id);
		$criteria->compare('subject_id_university',$this->subject_id_university,true);
		$criteria->compare('teacher_id',$this->teacher_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
