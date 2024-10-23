<?php

/**
 * This is the model class for table "reftingkatpendidikan".
 *
 * The followings are the available columns in table 'reftingkatpendidikan':
 * @property string $reftingkatpendidikan_id
 * @property integer $refgolru_id
 * @property integer $reftingkatpendidikan_urut
 * @property string $reftingkatpendidikan_kode
 * @property string $reftingkatpendidikan_nama
 * @property string $haryo
 */
class Pendidikan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reftingkatpendidikan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refgolru_id, reftingkatpendidikan_kode', 'required'),
			array('refgolru_id, reftingkatpendidikan_urut', 'numerical', 'integerOnly'=>true),
			array('reftingkatpendidikan_kode', 'length', 'max'=>20),
			array('reftingkatpendidikan_nama', 'length', 'max'=>150),
			array('haryo', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reftingkatpendidikan_id, refgolru_id, reftingkatpendidikan_urut, reftingkatpendidikan_kode, reftingkatpendidikan_nama, haryo', 'safe', 'on'=>'search'),
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
			'reftingkatpendidikan_id' => 'Reftingkatpendidikan',
			'refgolru_id' => 'Refgolru',
			'reftingkatpendidikan_urut' => 'Reftingkatpendidikan Urut',
			'reftingkatpendidikan_kode' => 'Reftingkatpendidikan Kode',
			'reftingkatpendidikan_nama' => 'Reftingkatpendidikan Nama',
			'haryo' => 'Haryo',
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

		$criteria->compare('reftingkatpendidikan_id',$this->reftingkatpendidikan_id,true);
		$criteria->compare('refgolru_id',$this->refgolru_id);
		$criteria->compare('reftingkatpendidikan_urut',$this->reftingkatpendidikan_urut);
		$criteria->compare('reftingkatpendidikan_kode',$this->reftingkatpendidikan_kode,true);
		$criteria->compare('reftingkatpendidikan_nama',$this->reftingkatpendidikan_nama,true);
		$criteria->compare('haryo',$this->haryo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pendidikan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
