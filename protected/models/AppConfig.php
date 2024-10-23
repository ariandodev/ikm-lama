<?php

/**
 * This is the model class for table "tblappconfig".
 *
 * The followings are the available columns in table 'tblappconfig':
 * @property integer $tblappconfig_id
 * @property string $tblappconfig_key
 * @property string $tblappconfig_value
 * @property string $tblappconfig_type
 */
class AppConfig extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblappconfig';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblappconfig_key', 'required'),
			array('tblappconfig_key', 'length', 'max'=>255),
			array('tblappconfig_value', 'length', 'max'=>400),
			array('tblappconfig_type', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblappconfig_id, tblappconfig_key, tblappconfig_value, tblappconfig_type', 'safe', 'on'=>'search'),
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
			'tblappconfig_id' => 'Tblappconfig',
			'tblappconfig_key' => 'Tblappconfig Key',
			'tblappconfig_value' => 'Tblappconfig Value',
			'tblappconfig_type' => 'Tblappconfig Type',
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

		$criteria->compare('tblappconfig_id',$this->tblappconfig_id);
		$criteria->compare('tblappconfig_key',$this->tblappconfig_key,true);
		$criteria->compare('tblappconfig_value',$this->tblappconfig_value,true);
		$criteria->compare('tblappconfig_type',$this->tblappconfig_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AppConfig the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getValue($key)
	{
		$get_conf = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>$key));
		if($get_conf) {
			return $get_conf->tblappconfig_value;
		} else {
			return "AppConfig[".$key."]=notfound";
		}
	}

	public static function getOptions($key)
	{
		$get_conf = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>$key));
		if($get_conf) {
			$arrayOpt = ($get_conf->tblappconfig_options!=null && $get_conf->tblappconfig_options!='') ? json_decode($get_conf->tblappconfig_options) : array();
			return (array) $arrayOpt;
		} else {
			return array("AppConfig[".$key."]=notfound");
		}
	}
}
