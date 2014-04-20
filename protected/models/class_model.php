<?php

/**
 * This is the model class for table "tbl_class".
 *
 * The followings are the available columns in table 'tbl_class':
 * @property integer $class_id
 * @property string $class_code
 * @property string $class_avatar
 * @property string $class_cover
 * @property string $class_description
 * @property string $class_name
 * @property string $class_active
 * @property string $class_token
 * @property integer $class_credit_number
 * @property string $class_website
 */
class class_model extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_credit_number', 'numerical', 'integerOnly'=>true),
			array('class_code, class_avatar, class_cover, class_description, class_name, class_active, class_token', 'length', 'max'=>45),
			array('class_website', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('class_id, class_code, class_avatar, class_cover, class_description, class_name, class_active, class_token, class_credit_number, class_website', 'safe', 'on'=>'search'),
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
			'class_id' => 'Class',
			'class_code' => 'Class Code',
			'class_avatar' => 'Class Avatar',
			'class_cover' => 'Class Cover',
			'class_description' => 'Class Description',
			'class_name' => 'Class Name',
			'class_active' => 'Class Active',
			'class_token' => 'Class Token',
			'class_credit_number' => 'Class Credit Number',
			'class_website' => 'Class Website',
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

		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('class_code',$this->class_code,true);
		$criteria->compare('class_avatar',$this->class_avatar,true);
		$criteria->compare('class_cover',$this->class_cover,true);
		$criteria->compare('class_description',$this->class_description,true);
		$criteria->compare('class_name',$this->class_name,true);
		$criteria->compare('class_active',$this->class_active,true);
		$criteria->compare('class_token',$this->class_token,true);
		$criteria->compare('class_credit_number',$this->class_credit_number);
		$criteria->compare('class_website',$this->class_website,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return class_model the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
