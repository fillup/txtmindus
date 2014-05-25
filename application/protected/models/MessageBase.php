<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property string $id
 * @property string $user_id
 * @property string $service_account_id
 * @property string $phone_from
 * @property string $phone_to
 * @property string $body
 * @property string $time_sent
 * @property string $time_received
 * @property string $status
 * @property integer $retry_count
 * @property string $response_id
 * @property string $response_status
 * @property string $response_error
 *
 * The followings are the available model relations:
 * @property ServiceAccount $serviceAccount
 * @property User $user
 */
class MessageBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, service_account_id, phone_from, phone_to, body', 'required'),
			array('retry_count', 'numerical', 'integerOnly'=>true),
			array('id, user_id, service_account_id, response_status', 'length', 'max'=>32),
			array('phone_from, phone_to', 'length', 'max'=>50),
			array('body, response_error', 'length', 'max'=>1024),
			array('status', 'length', 'max'=>16),
			array('response_id', 'length', 'max'=>64),
			array('time_sent, time_received', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, service_account_id, phone_from, phone_to, body, time_sent, time_received, status, retry_count, response_id, response_status, response_error', 'safe', 'on'=>'search'),
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
			'serviceAccount' => array(self::BELONGS_TO, 'ServiceAccount', 'service_account_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'service_account_id' => 'Service Account',
			'phone_from' => 'Phone From',
			'phone_to' => 'Phone To',
			'body' => 'Body',
			'time_sent' => 'Time Sent',
			'time_received' => 'Time Received',
			'status' => 'Status',
			'retry_count' => 'Retry Count',
			'response_id' => 'Response',
			'response_status' => 'Response Status',
			'response_error' => 'Response Error',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('service_account_id',$this->service_account_id,true);
		$criteria->compare('phone_from',$this->phone_from,true);
		$criteria->compare('phone_to',$this->phone_to,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('time_sent',$this->time_sent,true);
		$criteria->compare('time_received',$this->time_received,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('retry_count',$this->retry_count);
		$criteria->compare('response_id',$this->response_id,true);
		$criteria->compare('response_status',$this->response_status,true);
		$criteria->compare('response_error',$this->response_error,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MessageBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
