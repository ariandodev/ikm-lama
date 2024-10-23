<?php

/**
 * This is the model class for table "refstatustindaklanjut".
 *
 * The followings are the available columns in table 'refstatustindaklanjut':
 * @property integer $refstatustindaklanjut_id
 * @property integer $refstatustindaklanjut_jenis
 * @property string $refstatustindaklanjut_jenisuraian
 * @property string $refstatustindaklanjut_keterangan
 */
class Refstatustindaklanjut extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refstatustindaklanjut';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refstatustindaklanjut_jenis', 'numerical', 'integerOnly'=>true),
			array('refstatustindaklanjut_jenisuraian', 'length', 'max'=>255),
			array('refstatustindaklanjut_keterangan', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refstatustindaklanjut_id, refstatustindaklanjut_jenis, refstatustindaklanjut_jenisuraian, refstatustindaklanjut_keterangan', 'safe', 'on'=>'search'),
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
			'refstatustindaklanjut_id' => 'Refstatustindaklanjut',
			'refstatustindaklanjut_jenis' => 'Refstatustindaklanjut Jenis',
			'refstatustindaklanjut_jenisuraian' => 'Refstatustindaklanjut Jenisuraian',
			'refstatustindaklanjut_keterangan' => 'Refstatustindaklanjut Keterangan',
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

		$criteria->compare('refstatustindaklanjut_id',$this->refstatustindaklanjut_id);
		$criteria->compare('refstatustindaklanjut_jenis',$this->refstatustindaklanjut_jenis);
		$criteria->compare('refstatustindaklanjut_jenisuraian',$this->refstatustindaklanjut_jenisuraian,true);
		$criteria->compare('refstatustindaklanjut_keterangan',$this->refstatustindaklanjut_keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Refstatustindaklanjut the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
