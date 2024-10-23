<?php

/**
 * This is the model class for table "tblhasilsurvei".
 *
 * The followings are the available columns in table 'tblhasilsurvei':
 * @property integer $tblhasilsurvei_id
 * @property integer $refjenisizinikm_id
 * @property string $refjenisizinikm_nama
 * @property string $tblhasilsurvei_nama
 * @property integer $tblhasilsurvei_pertanyaan1
 * @property integer $tblhasilsurvei_pertanyaan2
 * @property integer $tblhasilsurvei_pertanyaan3
 * @property integer $tblhasilsurvei_pertanyaan4
 * @property integer $tblhasilsurvei_pertanyaan5
 * @property integer $tblhasilsurvei_pertanyaan6
 * @property integer $tblhasilsurvei_pertanyaan7
 * @property integer $tblhasilsurvei_pertanyaan8
 * @property integer $tblhasilsurvei_pertanyaan9
 * @property integer $tblhasilsurvei_pertanyaan10
 * @property integer $tblhasilsurvei_pertanyaan11
 * @property integer $tblhasilsurvei_pertanyaan12
 * @property integer $tblhasilsurvei_pertanyaan13
 * @property integer $tblhasilsurvei_pertanyaan14
 * @property string $tblhasilsurvei_saran
 * @property string $tblhasilsurvei_total
 * @property string $tblhasilsurvei_syscreate
 */
class HasilSurvey extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblhasilsurvei';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refjenisizinikm_id, tblhasilsurvei_syscreate', 'required'),
			array('refjenisizinikm_id, tblhasilsurvei_pertanyaan1, tblhasilsurvei_pertanyaan2, tblhasilsurvei_pertanyaan3, tblhasilsurvei_pertanyaan4, tblhasilsurvei_pertanyaan5, tblhasilsurvei_pertanyaan6, tblhasilsurvei_pertanyaan7, tblhasilsurvei_pertanyaan8, tblhasilsurvei_pertanyaan9, tblhasilsurvei_pertanyaan10, tblhasilsurvei_pertanyaan11, tblhasilsurvei_pertanyaan12, tblhasilsurvei_pertanyaan13, tblhasilsurvei_pertanyaan14', 'numerical', 'integerOnly'=>true),
			array('refjenisizinikm_nama', 'length', 'max'=>200),
			array('tblhasilsurvei_nama, tblhasilsurvei_total', 'length', 'max'=>255),
			array('tblhasilsurvei_saran', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblhasilsurvei_id, refjenisizinikm_id, refjenisizinikm_nama, tblhasilsurvei_nama, tblhasilsurvei_pertanyaan1, tblhasilsurvei_pertanyaan2, tblhasilsurvei_pertanyaan3, tblhasilsurvei_pertanyaan4, tblhasilsurvei_pertanyaan5, tblhasilsurvei_pertanyaan6, tblhasilsurvei_pertanyaan7, tblhasilsurvei_pertanyaan8, tblhasilsurvei_pertanyaan9, tblhasilsurvei_pertanyaan10, tblhasilsurvei_pertanyaan11, tblhasilsurvei_pertanyaan12, tblhasilsurvei_pertanyaan13, tblhasilsurvei_pertanyaan14, tblhasilsurvei_saran, tblhasilsurvei_total, tblhasilsurvei_syscreate', 'safe', 'on'=>'search'),
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
			'tblhasilsurvei_id' => 'Tblhasilsurvei',
			'refjenisizinikm_id' => 'Refjenisizinikm',
			'refjenisizinikm_nama' => 'Refjenisizinikm Nama',
			'tblhasilsurvei_nama' => 'Tblhasilsurvei Nama',
			'tblhasilsurvei_pertanyaan1' => 'Tblhasilsurvei Pertanyaan1',
			'tblhasilsurvei_pertanyaan2' => 'Tblhasilsurvei Pertanyaan2',
			'tblhasilsurvei_pertanyaan3' => 'Tblhasilsurvei Pertanyaan3',
			'tblhasilsurvei_pertanyaan4' => 'Tblhasilsurvei Pertanyaan4',
			'tblhasilsurvei_pertanyaan5' => 'Tblhasilsurvei Pertanyaan5',
			'tblhasilsurvei_pertanyaan6' => 'Tblhasilsurvei Pertanyaan6',
			'tblhasilsurvei_pertanyaan7' => 'Tblhasilsurvei Pertanyaan7',
			'tblhasilsurvei_pertanyaan8' => 'Tblhasilsurvei Pertanyaan8',
			'tblhasilsurvei_pertanyaan9' => 'Tblhasilsurvei Pertanyaan9',
			'tblhasilsurvei_pertanyaan10' => 'Tblhasilsurvei Pertanyaan10',
			'tblhasilsurvei_pertanyaan11' => 'Tblhasilsurvei Pertanyaan11',
			'tblhasilsurvei_pertanyaan12' => 'Tblhasilsurvei Pertanyaan12',
			'tblhasilsurvei_pertanyaan13' => 'Tblhasilsurvei Pertanyaan13',
			'tblhasilsurvei_pertanyaan14' => 'Tblhasilsurvei Pertanyaan14',
			'tblhasilsurvei_saran' => 'Tblhasilsurvei Saran',
			'tblhasilsurvei_total' => 'Tblhasilsurvei Total',
			'tblhasilsurvei_syscreate' => 'Tblhasilsurvei Syscreate',
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

		$criteria->compare('tblhasilsurvei_id',$this->tblhasilsurvei_id);
		$criteria->compare('refjenisizinikm_id',$this->refjenisizinikm_id);
		$criteria->compare('refjenisizinikm_nama',$this->refjenisizinikm_nama,true);
		$criteria->compare('tblhasilsurvei_nama',$this->tblhasilsurvei_nama,true);
		$criteria->compare('tblhasilsurvei_pertanyaan1',$this->tblhasilsurvei_pertanyaan1);
		$criteria->compare('tblhasilsurvei_pertanyaan2',$this->tblhasilsurvei_pertanyaan2);
		$criteria->compare('tblhasilsurvei_pertanyaan3',$this->tblhasilsurvei_pertanyaan3);
		$criteria->compare('tblhasilsurvei_pertanyaan4',$this->tblhasilsurvei_pertanyaan4);
		$criteria->compare('tblhasilsurvei_pertanyaan5',$this->tblhasilsurvei_pertanyaan5);
		$criteria->compare('tblhasilsurvei_pertanyaan6',$this->tblhasilsurvei_pertanyaan6);
		$criteria->compare('tblhasilsurvei_pertanyaan7',$this->tblhasilsurvei_pertanyaan7);
		$criteria->compare('tblhasilsurvei_pertanyaan8',$this->tblhasilsurvei_pertanyaan8);
		$criteria->compare('tblhasilsurvei_pertanyaan9',$this->tblhasilsurvei_pertanyaan9);
		$criteria->compare('tblhasilsurvei_pertanyaan10',$this->tblhasilsurvei_pertanyaan10);
		$criteria->compare('tblhasilsurvei_pertanyaan11',$this->tblhasilsurvei_pertanyaan11);
		$criteria->compare('tblhasilsurvei_pertanyaan12',$this->tblhasilsurvei_pertanyaan12);
		$criteria->compare('tblhasilsurvei_pertanyaan13',$this->tblhasilsurvei_pertanyaan13);
		$criteria->compare('tblhasilsurvei_pertanyaan14',$this->tblhasilsurvei_pertanyaan14);
		$criteria->compare('tblhasilsurvei_saran',$this->tblhasilsurvei_saran,true);
		$criteria->compare('tblhasilsurvei_total',$this->tblhasilsurvei_total,true);
		$criteria->compare('tblhasilsurvei_syscreate',$this->tblhasilsurvei_syscreate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HasilSurvey the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
