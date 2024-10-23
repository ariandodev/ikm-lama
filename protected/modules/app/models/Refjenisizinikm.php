<?php

/**
 * This is the model class for table "refjenisizinikm".
 *
 * The followings are the available columns in table 'refjenisizinikm':
 * @property integer $refjenisizinikm_id
 * @property integer $refloket_id
 * @property string $refjenisizinikm_nama
 * @property string $refjenisizinikm_isaktif
 */
class Refjenisizinikm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refjenisizinikm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refjenisizinikm_nama', 'required'),
			array('refloket_id', 'numerical', 'integerOnly'=>true),
			array('refjenisizinikm_nama', 'length', 'max'=>255),
			array('refjenisizinikm_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refjenisizinikm_id, refloket_id, refjenisizinikm_nama, refjenisizinikm_isaktif', 'safe', 'on'=>'search'),
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
			'refjenisizinikm_id' => 'Refjenisizinikm',
			'refloket_id' => 'Refloket',
			'refjenisizinikm_nama' => 'Refjenisizinikm Nama',
			'refjenisizinikm_isaktif' => 'Refjenisizinikm Isaktif',
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

		$criteria->compare('refjenisizinikm_id',$this->refjenisizinikm_id);
		$criteria->compare('refloket_id',$this->refloket_id);
		$criteria->compare('refjenisizinikm_nama',$this->refjenisizinikm_nama,true);
		$criteria->compare('refjenisizinikm_isaktif',$this->refjenisizinikm_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Refjenisizinikm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
