<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_password
 * @property integer $user_status
 * @property string $user_email
 * @property string $user_class
 * @property integer $user_faculty
 * @property string $user_about
 * @property integer $user_type
 * @property string $user_avatar
 * @property integer $user_favourite_doc_id
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_status, user_faculty, user_type, user_favourite_doc_id', 'numerical', 'integerOnly'=>true),
			array('user_name, user_password, user_email, user_class, user_avatar', 'length', 'max'=>100),
			array('user_about', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_name, user_password, user_status, user_email, user_class, user_faculty, user_about, user_type, user_avatar, user_favourite_doc_id', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'user_name' => 'User Name',
			'user_password' => 'User Password',
			'user_status' => 'User Status',
			'user_email' => 'User Email',
			'user_class' => 'User Class',
			'user_faculty' => 'User Faculty',
			'user_about' => 'User About',
			'user_type' => 'User Type',
			'user_avatar' => 'User Avatar',
			'user_favourite_doc_id' => 'User Favourite Doc',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_status',$this->user_status);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_class',$this->user_class,true);
		$criteria->compare('user_faculty',$this->user_faculty);
		$criteria->compare('user_about',$this->user_about,true);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('user_avatar',$this->user_avatar,true);
		$criteria->compare('user_favourite_doc_id',$this->user_favourite_doc_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
