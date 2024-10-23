<?php

/**
 * This is the model class for table "tblpertanyaan".
 *
 * The followings are the available columns in table 'tblpertanyaan':
 * @property integer $tblpertanyaan_id
 * @property integer $tblpertanyaan_urut
 * @property string $tblpertanyaan_uraian
 * @property string $tblpertanyaan_ketjawabanA
 * @property string $tblpertanyaan_ketjawabanB
 * @property string $tblpertanyaan_ketjawabanC
 * @property string $tblpertanyaan_ketjawabanD
 * @property string $tblpertanyaan_isaktif
 */
class Tblpertanyaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblpertanyaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblpertanyaan_urut', 'numerical', 'integerOnly'=>true),
			array('tblpertanyaan_uraian, tblpertanyaan_ketjawabanA, tblpertanyaan_ketjawabanB, tblpertanyaan_ketjawabanC, tblpertanyaan_ketjawabanD', 'length', 'max'=>255),
			array('tblpertanyaan_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblpertanyaan_id, tblpertanyaan_urut, tblpertanyaan_uraian, tblpertanyaan_ketjawabanA, tblpertanyaan_ketjawabanB, tblpertanyaan_ketjawabanC, tblpertanyaan_ketjawabanD, tblpertanyaan_isaktif', 'safe', 'on'=>'search'),
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
			'tblpertanyaan_id' => 'Tblpertanyaan',
			'tblpertanyaan_urut' => 'Tblpertanyaan Urut',
			'tblpertanyaan_uraian' => 'Tblpertanyaan Uraian',
			'tblpertanyaan_ketjawabanA' => 'Tblpertanyaan Ketjawaban A',
			'tblpertanyaan_ketjawabanB' => 'Tblpertanyaan Ketjawaban B',
			'tblpertanyaan_ketjawabanC' => 'Tblpertanyaan Ketjawaban C',
			'tblpertanyaan_ketjawabanD' => 'Tblpertanyaan Ketjawaban D',
			'tblpertanyaan_isaktif' => 'Tblpertanyaan Isaktif',
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

		$criteria->compare('tblpertanyaan_id',$this->tblpertanyaan_id);
		$criteria->compare('tblpertanyaan_urut',$this->tblpertanyaan_urut);
		$criteria->compare('tblpertanyaan_uraian',$this->tblpertanyaan_uraian,true);
		$criteria->compare('tblpertanyaan_ketjawabanA',$this->tblpertanyaan_ketjawabanA,true);
		$criteria->compare('tblpertanyaan_ketjawabanB',$this->tblpertanyaan_ketjawabanB,true);
		$criteria->compare('tblpertanyaan_ketjawabanC',$this->tblpertanyaan_ketjawabanC,true);
		$criteria->compare('tblpertanyaan_ketjawabanD',$this->tblpertanyaan_ketjawabanD,true);
		$criteria->compare('tblpertanyaan_isaktif',$this->tblpertanyaan_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblpertanyaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getjawaban($id)
	{
		$data = Tblpertanyaan::model()->findByPk($id);
		return $data;
	}
}
