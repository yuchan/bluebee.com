<?php

/**
 * This is the model class for table "tbl_dept".
 *
 * The followings are the available columns in table 'tbl_dept':
 * @property integer $dept_id
 * @property string $dept_name
 * @property integer $dept_active
 * @property integer $dept_faculty
 */
class Dept extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_dept';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dept_id', 'required'),
			array('dept_id, dept_active, dept_faculty', 'numerical', 'integerOnly'=>true),
			array('dept_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dept_id, dept_name, dept_active, dept_faculty', 'safe', 'on'=>'search'),
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
			'dept_id' => 'Dept',
			'dept_name' => 'Dept Name',
			'dept_active' => 'Dept Active',
			'dept_faculty' => 'Dept Faculty',
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

		$criteria->compare('dept_id',$this->dept_id);
		$criteria->compare('dept_name',$this->dept_name,true);
		$criteria->compare('dept_active',$this->dept_active);
		$criteria->compare('dept_faculty',$this->dept_faculty);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dept the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
