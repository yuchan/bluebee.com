<?php

/**
 * This is the model class for table "tbl_comment".
 *
 * The followings are the available columns in table 'tbl_comment':
 * @property integer $comment_id
 * @property integer $comment_post_id
 * @property integer $comment_author
 * @property string $comment_date
 * @property string $comment_content
 * @property integer $user_id
 * @property integer $comment_doc_id
 */
class Comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment_post_id, comment_author, user_id, comment_doc_id', 'numerical', 'integerOnly'=>true),
			array('comment_date, comment_content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('comment_id, comment_post_id, comment_author, comment_date, comment_content, user_id, comment_doc_id', 'safe', 'on'=>'search'),
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
			'comment_id' => 'Comment',
			'comment_post_id' => 'Comment Post',
			'comment_author' => 'Comment Author',
			'comment_date' => 'Comment Date',
			'comment_content' => 'Comment Content',
			'user_id' => 'User',
			'comment_doc_id' => 'Comment Doc',
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

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('comment_post_id',$this->comment_post_id);
		$criteria->compare('comment_author',$this->comment_author);
		$criteria->compare('comment_date',$this->comment_date,true);
		$criteria->compare('comment_content',$this->comment_content,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('comment_doc_id',$this->comment_doc_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
