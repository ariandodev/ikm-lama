<?php

/**
 * This is the model class for table "refukuranfile".
 *
 * The followings are the available columns in table 'refukuranfile':
 * @property integer $refukuranfile_id
 * @property string $refukuranfile_width
 * @property string $refukuranfile_height
 */
class Refukuranfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refukuranfile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refukuranfile_id', 'required'),
			array('refukuranfile_id', 'numerical', 'integerOnly'=>true),
			array('refukuranfile_width, refukuranfile_height', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refukuranfile_id, refukuranfile_width, refukuranfile_height', 'safe', 'on'=>'search'),
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
			'refukuranfile_id' => 'Refukuranfile',
			'refukuranfile_width' => 'Refukuranfile Width',
			'refukuranfile_height' => 'Refukuranfile Height',
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

		$criteria->compare('refukuranfile_id',$this->refukuranfile_id);
		$criteria->compare('refukuranfile_width',$this->refukuranfile_width,true);
		$criteria->compare('refukuranfile_height',$this->refukuranfile_height,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Refukuranfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
