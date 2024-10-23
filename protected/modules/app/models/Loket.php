<?php

/**
 * This is the model class for table "refloket".
 *
 * The followings are the available columns in table 'refloket':
 * @property integer $refloket_id
 * @property string $refloket_nama
 * @property string $refloket_petugas
 * @property string $refloket_isaktif
 */
class Loket extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refloket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refloket_nama, refloket_petugas', 'required'),
			array('refloket_nama, refloket_petugas', 'length', 'max'=>255),
			array('refloket_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refloket_id, refloket_nama, refloket_petugas, refloket_isaktif', 'safe', 'on'=>'search'),
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
			'refloket_id' => 'Refloket',
			'refloket_nama' => 'Refloket Nama',
			'refloket_petugas' => 'Refloket Petugas',
			'refloket_isaktif' => 'Refloket Isaktif',
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

		$criteria->compare('refloket_id',$this->refloket_id);
		$criteria->compare('refloket_nama',$this->refloket_nama,true);
		$criteria->compare('refloket_petugas',$this->refloket_petugas,true);
		$criteria->compare('refloket_isaktif',$this->refloket_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loket the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
