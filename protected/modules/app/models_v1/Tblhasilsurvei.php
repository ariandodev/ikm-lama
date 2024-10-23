<?php

/**
 * This is the model class for table "tblhasilsurvei".
 *
 * The followings are the available columns in table 'tblhasilsurvei':
 * @property integer $tblhasilsurvei_id
 * @property integer $refjenisizinikm_id
 * @property integer $reftingkatpendidikan_id
 * @property integer $refsex_id
 * @property integer $tblhasilsurvei_usia
 * @property string $tblhasilsurvei_caradaftar
 * @property string $tblhasilsurvei_pengurusan
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
 * @property string $tblhasilsurvei_penilaian
 * @property string $tblhasilsurvei_saran
 * @property string $tblhasilsurvei_total
 * @property string $tblhasilsurvei_syscreate
 * @property string $tblhasilsurvei_sysupdate
 */
class Tblhasilsurvei extends CActiveRecord
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
			array('refjenisizinikm_id, reftingkatpendidikan_id, refsex_id, tblhasilsurvei_usia, tblhasilsurvei_syscreate', 'required'),
			array('refjenisizinikm_id, reftingkatpendidikan_id, refsex_id, tblhasilsurvei_usia, tblhasilsurvei_pertanyaan1, tblhasilsurvei_pertanyaan2, tblhasilsurvei_pertanyaan3, tblhasilsurvei_pertanyaan4, tblhasilsurvei_pertanyaan5, tblhasilsurvei_pertanyaan6, tblhasilsurvei_pertanyaan7, tblhasilsurvei_pertanyaan8, tblhasilsurvei_pertanyaan9', 'numerical', 'integerOnly'=>true),
			array('tblhasilsurvei_caradaftar', 'length', 'max'=>6),
			array('tblhasilsurvei_pengurusan', 'length', 'max'=>10),
			array('refjenisizinikm_nama', 'length', 'max'=>200),
			array('tblhasilsurvei_nama, tblhasilsurvei_total', 'length', 'max'=>255),
			array('tblhasilsurvei_penilaian', 'length', 'max'=>7),
			array('tblhasilsurvei_saran, tblhasilsurvei_sysupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblhasilsurvei_id, refjenisizinikm_id, reftingkatpendidikan_id, refsex_id, tblhasilsurvei_usia, tblhasilsurvei_caradaftar, tblhasilsurvei_pengurusan, refjenisizinikm_nama, tblhasilsurvei_nama, tblhasilsurvei_pertanyaan1, tblhasilsurvei_pertanyaan2, tblhasilsurvei_pertanyaan3, tblhasilsurvei_pertanyaan4, tblhasilsurvei_pertanyaan5, tblhasilsurvei_pertanyaan6, tblhasilsurvei_pertanyaan7, tblhasilsurvei_pertanyaan8, tblhasilsurvei_pertanyaan9, tblhasilsurvei_penilaian, tblhasilsurvei_saran, tblhasilsurvei_total, tblhasilsurvei_syscreate, tblhasilsurvei_sysupdate', 'safe', 'on'=>'search'),
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
			'reftingkatpendidikan_id' => 'Reftingkatpendidikan',
			'refsex_id' => 'Refsex',
			'tblhasilsurvei_usia' => 'Tblhasilsurvei Usia',
			'tblhasilsurvei_caradaftar' => 'Tblhasilsurvei Caradaftar',
			'tblhasilsurvei_pengurusan' => 'Tblhasilsurvei Pengurusan',
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
			'tblhasilsurvei_penilaian' => 'Tblhasilsurvei Penilaian',
			'tblhasilsurvei_saran' => 'Tblhasilsurvei Saran',
			'tblhasilsurvei_total' => 'Tblhasilsurvei Total',
			'tblhasilsurvei_syscreate' => 'Tblhasilsurvei Syscreate',
			'tblhasilsurvei_sysupdate' => 'Tblhasilsurvei Sysupdate',
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
		$criteria->compare('reftingkatpendidikan_id',$this->reftingkatpendidikan_id);
		$criteria->compare('refsex_id',$this->refsex_id);
		$criteria->compare('tblhasilsurvei_usia',$this->tblhasilsurvei_usia);
		$criteria->compare('tblhasilsurvei_caradaftar',$this->tblhasilsurvei_caradaftar,true);
		$criteria->compare('tblhasilsurvei_pengurusan',$this->tblhasilsurvei_pengurusan,true);
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
		$criteria->compare('tblhasilsurvei_penilaian',$this->tblhasilsurvei_penilaian,true);
		$criteria->compare('tblhasilsurvei_saran',$this->tblhasilsurvei_saran,true);
		$criteria->compare('tblhasilsurvei_total',$this->tblhasilsurvei_total,true);
		$criteria->compare('tblhasilsurvei_syscreate',$this->tblhasilsurvei_syscreate,true);
		$criteria->compare('tblhasilsurvei_sysupdate',$this->tblhasilsurvei_sysupdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblhasilsurvei the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
