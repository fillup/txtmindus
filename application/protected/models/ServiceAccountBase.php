<?php

/**
 * This is the model class for table "service_account".
 *
 * The followings are the available columns in table 'service_account':
 * @property string $id
 * @property string $user_id
 * @property string $provider
 * @property string $key
 * @property string $secret
 * @property string $extra
 *
 * The followings are the available model relations:
 * @property Message[] $messages
 * @property User $user
 */
class ServiceAccountBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'service_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, provider', 'required'),
			array('id, user_id', 'length', 'max'=>32),
			array('provider', 'length', 'max'=>16),
			array('key, secret', 'length', 'max'=>128),
			array('extra', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, provider, key, secret, extra', 'safe', 'on'=>'search'),
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
			'messages' => array(self::HAS_MANY, 'Message', 'service_account_id'),
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
			'provider' => 'Provider',
			'key' => 'Key',
			'secret' => 'Secret',
			'extra' => 'Extra',
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
		$criteria->compare('provider',$this->provider,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('secret',$this->secret,true);
		$criteria->compare('extra',$this->extra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServiceAccountBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
