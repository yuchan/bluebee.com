<?php

/**
 * This is the model class for table "tbl_teacher".
 *
 * The followings are the available columns in table 'tbl_teacher':
 * @property integer $teacher_id
 * @property string $teacher_name
 * @property string $teacher_personal_page
 * @property string $teacher_avatar
 * @property string $teacher_description
 * @property integer $teacher_faculty
 * @property integer $teacher_active
 * @property integer $teacher_status
 * @property integer $teacher_university
 */
class Teacher extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teacher_faculty, teacher_active, teacher_status, teacher_university', 'numerical', 'integerOnly'=>true),
			array('teacher_name, teacher_personal_page, teacher_avatar, teacher_description', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('teacher_id, teacher_name, teacher_personal_page, teacher_avatar, teacher_description, teacher_faculty, teacher_active, teacher_status, teacher_university', 'safe', 'on'=>'search'),
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
			'teacher_id' => 'Teacher',
			'teacher_name' => 'Teacher Name',
			'teacher_personal_page' => 'Teacher Personal Page',
			'teacher_avatar' => 'Teacher Avatar',
			'teacher_description' => 'Teacher Description',
			'teacher_faculty' => 'Teacher Faculty',
			'teacher_active' => 'Teacher Active',
			'teacher_status' => 'Teacher Status',
			'teacher_university' => 'Teacher University',
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

		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('teacher_name',$this->teacher_name,true);
		$criteria->compare('teacher_personal_page',$this->teacher_personal_page,true);
		$criteria->compare('teacher_avatar',$this->teacher_avatar,true);
		$criteria->compare('teacher_description',$this->teacher_description,true);
		$criteria->compare('teacher_faculty',$this->teacher_faculty);
		$criteria->compare('teacher_active',$this->teacher_active);
		$criteria->compare('teacher_status',$this->teacher_status);
		$criteria->compare('teacher_university',$this->teacher_university);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teacher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
