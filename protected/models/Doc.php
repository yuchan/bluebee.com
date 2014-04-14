<?php

/**
 * This is the model class for table "tbl_doc".
 *
 * The followings are the available columns in table 'tbl_doc':
 * @property integer $doc_id
 * @property string $doc_url
 * @property string $doc_name
 * @property integer $doc_status
 * @property integer $doc_user_id
 * @property string $doc_scribd_id
 * @property integer $doc_subject_id
 * @property integer $doc_faculty_id
 * @property string $doc_description
 */
class Doc extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_doc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doc_status, doc_user_id, doc_subject_id, doc_faculty_id', 'numerical', 'integerOnly'=>true),
			array('doc_url, doc_name, doc_scribd_id, doc_description', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('doc_id, doc_url, doc_name, doc_status, doc_user_id, doc_scribd_id, doc_subject_id, doc_faculty_id, doc_description', 'safe', 'on'=>'search'),
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
			'doc_id' => 'Doc',
			'doc_url' => 'Doc Url',
			'doc_name' => 'Doc Name',
			'doc_status' => 'Doc Status',
			'doc_user_id' => 'Doc User',
			'doc_scribd_id' => 'Doc Scribd',
			'doc_subject_id' => 'Doc Subject',
			'doc_faculty_id' => 'Doc Faculty',
			'doc_description' => 'Doc Description',
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

		$criteria->compare('doc_id',$this->doc_id);
		$criteria->compare('doc_url',$this->doc_url,true);
		$criteria->compare('doc_name',$this->doc_name,true);
		$criteria->compare('doc_status',$this->doc_status);
		$criteria->compare('doc_user_id',$this->doc_user_id);
		$criteria->compare('doc_scribd_id',$this->doc_scribd_id,true);
		$criteria->compare('doc_subject_id',$this->doc_subject_id);
		$criteria->compare('doc_faculty_id',$this->doc_faculty_id);
		$criteria->compare('doc_description',$this->doc_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Doc the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
