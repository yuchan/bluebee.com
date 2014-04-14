<?php

/**
 * This is the model class for table "tbl_post".
 *
 * The followings are the available columns in table 'tbl_post':
 * @property integer $post_id
 * @property integer $post_author
 * @property string $post_date
 * @property string $post_content
 * @property integer $post_status
 * @property string $post_title
 * @property string $post_modified_date
 * @property integer $comment_count
 * @property integer $post_rate
 * @property integer $post_comment_open
 * @property string $post_type
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_author, post_status, comment_count, post_rate, post_comment_open', 'numerical', 'integerOnly'=>true),
			array('post_type', 'length', 'max'=>100),
			array('post_date, post_content, post_title, post_modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('post_id, post_author, post_date, post_content, post_status, post_title, post_modified_date, comment_count, post_rate, post_comment_open, post_type', 'safe', 'on'=>'search'),
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
			'post_id' => 'Post',
			'post_author' => 'Post Author',
			'post_date' => 'Post Date',
			'post_content' => 'Post Content',
			'post_status' => 'Post Status',
			'post_title' => 'Post Title',
			'post_modified_date' => 'Post Modified Date',
			'comment_count' => 'Comment Count',
			'post_rate' => 'Post Rate',
			'post_comment_open' => 'Post Comment Open',
			'post_type' => 'Post Type',
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

		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('post_author',$this->post_author);
		$criteria->compare('post_date',$this->post_date,true);
		$criteria->compare('post_content',$this->post_content,true);
		$criteria->compare('post_status',$this->post_status);
		$criteria->compare('post_title',$this->post_title,true);
		$criteria->compare('post_modified_date',$this->post_modified_date,true);
		$criteria->compare('comment_count',$this->comment_count);
		$criteria->compare('post_rate',$this->post_rate);
		$criteria->compare('post_comment_open',$this->post_comment_open);
		$criteria->compare('post_type',$this->post_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
