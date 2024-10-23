<?php

class LaporanController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;		
		$this->renderPartial('index');
	}


	public function actionGetDataIzin()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$result = array();
		$row = array();
		$id = (int) trim($_POST['id']);
		$nama_izin = Yii::app()->db->createCommand('
			SELECT
			refjenisizinikm.refjenisizinikm_id AS id,
			refjenisizinikm.refjenisizinikm_nama AS nama
			FROM
			refjenisizinikm
			WHERE
			refloket_id ='.$id 
		)->queryAll();
		
		if (count($nama_izin)>0) {
			foreach($nama_izin as $list)
			{	
				$row[] = array(
					"id"=> $list['id'],
					'nama'=>$list['nama']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public function actionGetFormCari()
	{

		
		$gettahun = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$combojenisizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refloket_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			')->queryAll();

		$comboloket = Yii::app()->db->createCommand('SELECT
			refloket.refloket_id,
			refloket.refloket_nama
			FROM
			refloket

		')->queryAll();

		$this->renderPartial('formcari', array(
			'combojenisizin'=>$combojenisizin,
			'comboloket'=>$comboloket,
			'gettahun'=>$gettahun
		));

	}


	public function actionGetDataLaporan()
	{
		
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$jenis_izin = (int)trim($_REQUEST['jenis_izin']);

		//die($bulan);


		$nilai = Yii::app()->db->createCommand("
		CALL proc_ikm0daftarresponden (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();

		$jumlah = Yii::app()->db->createCommand("
		CALL proc_ikm1jumlah (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();

		$nrr = Yii::app()->db->createCommand("
		CALL proc_ikm2nrr (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();
		
		$nrrtertimbang = Yii::app()->db->createCommand("
		CALL proc_ikm3nrrtertimbang (".$tahun.",".$bulan.",".$jenis_izin.")	
		")->queryAll();

		$hasilakhir = Yii::app()->db->createCommand("
		CALL proc_ikm4hasilakhir (".$tahun.",".$bulan.",".$jenis_izin.")	
		")->queryRow();

		$getizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refloket_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			WHERE refjenisizinikm_id = '.$jenis_izin

		)->queryRow();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		$this->renderPartial('tabel_laporan', array(
			'nilai'=>$nilai,
			'jumlah'=>$jumlah,
			'nrr'=>$nrr,
			'nrrtertimbang'=>$nrrtertimbang,
			'hasilakhir'=>$hasilakhir,
			'getizin'=>$getizin,
			'bulan'=>$bulan,
			'tahun'=>$tahun
			));

	}

	public function actionGetFormCariTahunResponden()
	{
		$gettahun1 = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$getizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm')->queryAll();

		$this->renderPartial('formcari_tahun', array(
			'getizin'=>$getizin,
			'gettahun1'=>$gettahun1
		));
	}

	public function actionGetDataLaporanResponden()
	{
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$jenis_izin = (int)trim($_REQUEST['jenis_izin']);
		@$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();


		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekapizinbulan (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();
		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}
		// print_r($tahun);
		// print_r($bulan);
		// print_r($jenis_izin); die();
		// print_r($nilai); die();
		$this->renderPartial('lap_responden', array(
			'nilai'=>$nilai,
			'jenis_izin'=>$jenis_izin,
			'tahun'=>$tahun,
			'bulan'=>$bulan,
			'izin'=>$izin
			));
	}

	public function actionGetFormCariSampaiBulan()
	{
		$gettahun2 = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$this->renderPartial('formcari_sampaibulan',array(
			'gettahun2'=>$gettahun2
		));
	}

	public function actionGetDataLaporanSampaiBulan()
	{
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		

		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekaprespondensampaibulan (".$tahun.",".$bulan.")
		")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}


		$this->renderPartial('lap_sampaibulan', array(
			'nilai'=>$nilai,
			'tahun'=>$tahun,
			'bulan'=>$bulan
			));
	}

	public function actionGetFormCariPerBulan()
	{
		$gettahun2 = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$this->renderPartial('formcari_perbulan',array(
			'gettahun2'=>$gettahun2
		));
	}

	public function actionGetDataLaporanPerBulan()
	{
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		//error_reporting(-1)
		
		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekaprespondenperbulan (".$tahun.",".$bulan.")
		")->queryAll();

		$this->renderPartial('lap_perbulan', array(
			'nilai'=>$nilai,
			'tahun'=>$tahun,
			'bulan'=>$bulan
			));
	}

	public function actionGetFormCariTahun()
	{
		$gettahun2 = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$this->renderPartial('tabelcari_tahun',array(
			'gettahun2'=>$gettahun2
		));
	}

	public function actionGetDataLaporanPertahun()
	{
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		

		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekaprespondenbulan (".$tahun.",0)
		")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}


		$this->renderPartial('lap_pertahun', array(
			'nilai'=>$nilai,
			'tahun'=>$tahun,
			'bulan'=>$bulan
			));
	}

	public function actionGetFormCariRekapitulasi()
	{
		$gettahun3 = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$getizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm')->queryAll();

		$this->renderPartial('formcari_rekapitulasi',array(
			'gettahun3'=>$gettahun3
			,'getizin'=>$getizin
			
		));
	}

	public function actionGetDataRekapitulasi()
	{
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$jenis_izin = (int)trim($_REQUEST['jenisizin']);


		// echo $tahun;
		// echo $bulan;
		// echo $jenis_izin;die();
		
		@$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();


		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekapizin (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		$this->renderPartial('rekapitulasi', array(
			'nilai'=>$nilai,
			'tahun'=>$tahun,
			'bulan'=>$bulan,
			'izin'=>$izin
			));
	}
	
	public function actionGetFormCariNilaiIkm()
	{
		$gettahun1 = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$this->renderPartial('formcari_nilaiikm', array(
			'gettahun1'=>$gettahun1,			
			));
	}

	public function actionLaporanNilaiIkm()
	{
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);


		$data = Yii::app()->db->createCommand("
			CALL proc_rekapikmbulan (".$tahun.",0,".$bulan.")

			")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		$this->renderPartial('formnilaiikm', array(
			'nilai'=>$data,
			'tahun'=>$tahun,
			'bulan'=>$bulan
			));

	}

	public function actionGetFormCariPerjenisLayanan()
	{
		$gettahun1 = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$this->renderPartial('formcari_perjenislayanan', array(
			'gettahun1'=>$gettahun1,			
			));		
	}

	public function actionLaporanPerjenisLayanan()
	{
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);

		$jumlah = Yii::app()->db->createCommand("
		CALL proc_ikm1jumlah (".$tahun.",0,0)
		")->queryAll();

		$data = Yii::app()->db->createCommand("
			CALL proc_rekapresponden (".$tahun.",0,".$bulan.")

			")->queryAll();
		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		$this->renderPartial('formperjenislayanan', array(
			'nilai'=>$data,
			'jumlah'=>$jumlah,
			'tahun'=>$tahun,
			'bulan'=>$bulan
			));

	}

	public function actionGetFormCariPerSaran()
	{
		$getizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm')->queryAll();

		$this->renderPartial('formcari_saran', array(
			'getizin'=>$getizin
		));
	}

	public function actionGetDataLapSaran()
	{
		@$jenis_izin = (int)trim($_REQUEST['jenis_izin']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();

		$positif = Yii::app()->db->createCommand('SELECT
			tblhasilsurvei.tblhasilsurvei_penilaian,
			tblhasilsurvei.tblhasilsurvei_saran
			FROM
			tblhasilsurvei
			WHERE
			tblhasilsurvei.refjenisizinikm_id = '.$jenis_izin.' AND Month(tblhasilsurvei.tblhasilsurvei_syscreate)='.$bulan.' AND tblhasilsurvei.tblhasilsurvei_penilaian = "positif"

		')->queryAll();

		$negatif = Yii::app()->db->createCommand('SELECT
			tblhasilsurvei.tblhasilsurvei_penilaian,
			tblhasilsurvei.tblhasilsurvei_saran
			FROM
			tblhasilsurvei
			WHERE
			tblhasilsurvei.refjenisizinikm_id = '.$jenis_izin.' AND Month(tblhasilsurvei.tblhasilsurvei_syscreate)='.$bulan.' AND tblhasilsurvei.tblhasilsurvei_penilaian = "negatif"

		')->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		$this->renderPartial('lap_saran',array(
			'izin'=>$izin,
			'jenis_izin'=>$jenis_izin,
			'bulan'=>$bulan,
			'positif'=>$positif,
			'negatif'=>$negatif
		));
	}

	public function actionCetakResponden()
	{
		$tipe =trim($_REQUEST['tipe']);
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$jenis_izin = (int)trim($_REQUEST['jenis_izin']);

		@$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();

		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekapizinbulan (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

			switch ($tipe) {
				case 'word':
					header('Content-Type: application/vnd.ms-word');
					header('Content-Disposition: attachment; filename=laporan-responden.doc');
					break;
				case 'excel':
					header('Content-Type: application/vnd.ms-excel');
					header('Content-Disposition: attachment; filename=laporan-responden.xls');
					break;
				
				default:
					# code...
					break;
			}

		
			$this->renderPartial('cetak/cetakresponden', array(
				'nilai'=>$nilai,
				'tahun'=>$tahun,
				'bulan'=>$bulan,
				'izin'=>$izin
			));
				
	}

		

	public function actionCetakPertahun()
	{
		$tipe =trim($_REQUEST['tipe']);
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		
		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekaprespondenbulan (".$tahun.",0)
		")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakpertahun', array(
					'nilai'=>$nilai,
					'bulan'=>$bulan,
					'tahun'=>$tahun
				));
			
			break;
			
			default:
				# code...
				break;
			}
	}

	public function actionCetakPerbulan()
	{
		$tipe =trim($_REQUEST['tipe']);
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		
		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekaprespondenbulan (".$tahun.",0)
		")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakperbulan', array(
					'nilai'=>$nilai,
					'bulan'=>$bulan,
					'tahun'=>$tahun
				));
			
			break;
			
			default:
				# code...
				break;
			}
	}

	public function actionCetakPerJenisIzin()
	{
		$tipe = trim($_REQUEST['tipe']);
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$jenis_izin = (int)trim($_REQUEST['jenis_izin']);

		//die($bulan);

		

		$nilai = Yii::app()->db->createCommand("
		CALL proc_ikm0daftarresponden (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();

		$jumlah = Yii::app()->db->createCommand("
		CALL proc_ikm1jumlah (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();

		$nrr = Yii::app()->db->createCommand("
		CALL proc_ikm2nrr (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();
		
		$nrrtertimbang = Yii::app()->db->createCommand("
		CALL proc_ikm3nrrtertimbang (".$tahun.",".$bulan.",".$jenis_izin.")	
		")->queryAll();

		$hasilakhir = Yii::app()->db->createCommand("
		CALL proc_ikm4hasilakhir (".$tahun.",".$bulan.",".$jenis_izin.")	
		")->queryRow();

		$getizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refloket_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			WHERE refloket_id = '.$jenis_izin

		)->queryRow();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakperjenisizin', array(
					'nilai'=>$nilai,
					'jumlah'=>$jumlah,
					'nrr'=>$nrr,
					'nrrtertimbang'=>$nrrtertimbang,
					'hasilakhir'=>$hasilakhir,
					'getizin'=>$getizin,
					'bulan'=>$bulan,
					'tahun'=>$tahun
				));
			
			break;
			
			default:
				# code...
				break;
			}

		
	}

	public function actionCetakRekapitulasi()
	{
		$tipe = trim($_REQUEST['tipe']);
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$jenis_izin = (int)trim($_REQUEST['jenisizin']);
		@$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();


		$nilai = Yii::app()->db->createCommand("
		CALL proc_rekapizin (".$tahun.",".$bulan.",".$jenis_izin.")
		")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakrekapitulasi', array(
				'nilai'=>$nilai,
				'tahun'=>$tahun,
				'bulan'=>$bulan,
				'izin'=>$izin
			));
			
			break;
			
			default:
				# code...
				break;
			}
		
	}

	public function actionCetakNilaiIkm()
	{
		$tipe = trim($_REQUEST['tipe']);
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);


		$data = Yii::app()->db->createCommand("
			CALL proc_rekapikmbulan (".$tahun.",0,".$bulan.")

			")->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetaknilaiikm', array(
				'nilai'=>$data,
				'tahun'=>$tahun,
				'bulan'=>$bulan
			));
			
			break;
			
			default:
				# code...
				break;
			}
	}

	public function actionCetakJenisLayanan()
	{
		$tipe = trim($_REQUEST['tipe']);
		@$tahun = (int)trim($_REQUEST['tahun']);
		@$bulan = (int)trim($_REQUEST['bulan']);

		$jumlah = Yii::app()->db->createCommand("
		CALL proc_ikm1jumlah (".$tahun.",0,'".$bulan."')
		")->queryAll();

		$data = Yii::app()->db->createCommand(
			"call proc_rekapresponden ('".$tahun."',0,'".$bulan."')"

		)->queryAll();

		switch ($bulan) {
			case '1':
				$bulan= "Januari";
				break;
			
			case '2':
				$bulan= "Februari";
				break;
			case '3':
				$bulan= "Maret";
				break;
			case '4':
				$bulan= "April";
				break;
			case '5':
				$bulan= "Mei";
				break;
			case '6':
				$bulan= "Juni";
				break;
			case '7':
				$bulan= "Juli";
				break;
			case '8':
				$bulan= "Agustus";
				break;
			case '9':
				$bulan= "September";
				break;
			case '10':
				$bulan= "Oktober";
				break;
			case '11':
				$bulan= "November";
				break;
			case '12':
				$bulan= "Desember";
				break;
			 default:
           		$bulan= "";
		}


		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakjenislayanan', array(
				'nilai'=>$data,
				'jumlah'=>$jumlah,
				'tahun'=>$tahun,
				'bulan'=>$bulan
			));
			
			break;
			
			default:
				# code...
				break;
			}
		
	}

	public function actionCetakSaranPositif()
	{
		$tipe = trim($_REQUEST['tipe']);
		@$jenis_izin = (int)trim($_REQUEST['jenis_izin']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();

		$positif = Yii::app()->db->createCommand('SELECT
			tblhasilsurvei.tblhasilsurvei_penilaian,
			tblhasilsurvei.tblhasilsurvei_saran
			FROM
			tblhasilsurvei
			WHERE
			tblhasilsurvei.refjenisizinikm_id = '.$jenis_izin.' AND Month(tblhasilsurvei.tblhasilsurvei_syscreate)='.$bulan.' AND tblhasilsurvei.tblhasilsurvei_penilaian = "positif"

		')->queryAll();


		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetak_positif', array(
				'jenis_izin'=>$jenis_izin,
				'izin'=>$izin,
				'bulan'=>$bulan,
				'positif'=>$positif
			));
			
			break;
			
			default:
				# code...
				break;
			}

	}

	public function actionCetakSaranNegatif()
	{
		$tipe = trim($_REQUEST['tipe']);
		@$jenis_izin = (int)trim($_REQUEST['jenis_izin']);
		@$bulan = (int)trim($_REQUEST['bulan']);
		@$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();

		$negatif = Yii::app()->db->createCommand('SELECT
			tblhasilsurvei.tblhasilsurvei_penilaian,
			tblhasilsurvei.tblhasilsurvei_saran
			FROM
			tblhasilsurvei
			WHERE
			tblhasilsurvei.refjenisizinikm_id = '.$jenis_izin.' AND Month(tblhasilsurvei.tblhasilsurvei_syscreate)='.$bulan.' AND tblhasilsurvei.tblhasilsurvei_penilaian = "negatif"

		')->queryAll();


		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetak_negatif', array(
				'jenis_izin'=>$jenis_izin,
				'izin'=>$izin,
				'bulan'=>$bulan,
				'negatif'=>$negatif
			));
			
			break;
			
			default:
				# code...
				break;
			}

	}
		
		
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}