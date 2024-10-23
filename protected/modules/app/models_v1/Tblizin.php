<?php

/**
 * This is the model class for table "tblizin".
 *
 * The followings are the available columns in table 'tblizin':
 * @property integer $tblizin_id
 * @property string $tblizin_nama
 * @property integer $tblizin_lama
 * @property string $tblizin_icon
 * @property string $tblizin_adaretribusi
 * @property string $tblizin_terstruktur
 * @property string $tblizin_isaktif
 */
class Tblizin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblizin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblizin_nama', 'required'),
			array('tblizin_lama', 'numerical', 'integerOnly'=>true),
			array('tblizin_nama, tblizin_icon', 'length', 'max'=>255),
			array('tblizin_adaretribusi, tblizin_terstruktur, tblizin_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblizin_id, tblizin_nama, tblizin_lama, tblizin_icon, tblizin_adaretribusi, tblizin_terstruktur, tblizin_isaktif', 'safe', 'on'=>'search'),
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
			'tblizin_id' => 'Tblizin',
			'tblizin_nama' => 'Tblizin Nama',
			'tblizin_lama' => 'Tblizin Lama',
			'tblizin_icon' => 'Tblizin Icon',
			'tblizin_adaretribusi' => 'Tblizin Adaretribusi',
			'tblizin_terstruktur' => 'Tblizin Terstruktur',
			'tblizin_isaktif' => 'Tblizin Isaktif',
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

		$criteria->compare('tblizin_id',$this->tblizin_id);
		$criteria->compare('tblizin_nama',$this->tblizin_nama,true);
		$criteria->compare('tblizin_lama',$this->tblizin_lama);
		$criteria->compare('tblizin_icon',$this->tblizin_icon,true);
		$criteria->compare('tblizin_adaretribusi',$this->tblizin_adaretribusi,true);
		$criteria->compare('tblizin_terstruktur',$this->tblizin_terstruktur,true);
		$criteria->compare('tblizin_isaktif',$this->tblizin_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblizin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
