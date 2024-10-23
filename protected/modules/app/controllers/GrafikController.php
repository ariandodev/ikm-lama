<?php

class GrafikController extends Controller
{
	/*=========================================== function memanggil form =================================================*/
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionJenisIzin()
	{
		$model = Loket::model()->findAll();

		$this->renderPartial('jenis_izin', array(
			'model'=>$model
		));

	}

	public function actionTingkatPendidikan()
	{
		$this->renderPartial('tingkat_pendidikan');
	}

	public function actionJenisKelamin()
	{
		$this->renderPartial('jenis_kelamin');
	}

	public function actionLoket()
	{
		$this->renderPartial('loket');
	}

	public function actionUsia()
	{
		$this->renderPartial('usia');
	}

	public function actionSaran()
	{
		$this->renderPartial('saran');
	}

	public function actiongetgrafik()
		{
			$this->renderPartial('grafik_izin');
		}

	public function actionNilaiikm()
	{			
		$gettahun = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$getizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refloket_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm

		')->queryAll();

		$this->renderPartial('nilaikepuasan', array(
			'getizin'=>$getizin,			
			'gettahun'=>$gettahun
		));
	}

	public function actionPerjenislayanan()
	{
		$gettahun = Yii::app()->db->createCommand('SELECT
			YEAR(tblhasilsurvei.tblhasilsurvei_syscreate) AS tahun
			FROM
			tblhasilsurvei
			GROUP BY tahun	
		')->queryAll();

		$getizin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refloket_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm

		')->queryAll();

		$this->renderPartial('perjenislayanan', array(
			'getizin'=>$getizin,			
			'gettahun'=>$gettahun
		));
	}

	/*============================================= Akhir Function Memanggil Form ========================================================*/

	/*============================================= Function Memproses Tabel ===============================================*/

	public function actionGetTable()
	{
		// $tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		// $tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));
		
		// $get = Yii::app()->db->createCommand(
		// "
		// CALL proc_grafikjenisizin ('".$tanggal_awal."','".$tanggal_akhir."')
		// "
		// )->queryAll();
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));
		// print_r($tanggal_awal);
		// print_r($tanggal_akhir); die();

		$gettingkatpend = Yii::app()->db->createCommand(
		"
		CALL proc_grafikjenisizin ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();

		// $gettingkatpend = Yii::app()->db->createCommand('
		// 	SELECT
		// 	refjenisizinikm_id,
		// 	refjenisizinikm_nama,
		// 	(SELECT count(b.tblhasilsurvei_id) FROM tblhasilsurvei b WHERE b.refjenisizinikm_id =refjenisizinikm.refjenisizinikm_id AND tblhasilsurvei_syscreate = '.$tanggal_awal.'  AND tblhasilsurvei_syscreate <= '.$tanggal_akhir.'  ) as jumlah
		// 	FROM refjenisizinikm 
		// 	ORDER BY refjenisizinikm_nama
		// 	')->queryAll();

		$i = 1;
		foreach ($gettingkatpend as $data) {
			echo '<tr>
					<td>'.$i++.'</td>
					<td>'.$data['refjenisizinikm_nama'].'</td>
					<td>'.$data['jumlah'].'</td>
				  </tr>';
		} 
		echo '<script> $("#dt_basic").DataTable();</script>';

	}

	public function actionGetTablePendidikan()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$gettingkatpend = Yii::app()->db->createCommand(
		"
		CALL proc_grafiktkpendidikan ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		$i = 1;
		foreach ($gettingkatpend as $data) {
			echo '<tr>
					<td>'.$i++.'</td>
					<td>'.$data['reftingkatpendidikan_nama'].'</td>
					<td>'.$data['jumlah'].'</td>
				  </tr>';
		}
		echo '<script> $("#dt_basic").DataTable();</script>';
	}

	public function actionGetTableJenisKelamin()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$getjeniskelamin = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksex ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		$i = 1;
		foreach ($getjeniskelamin as $data) {
			echo '<tr>
					<td>'.$i++.'</td>
					<td>'.$data['refsex_nama'].'</td>
					<td>'.$data['jumlah'].'</td>
				  </tr>';
		}
	}


	public function actionGetTableLoket()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$getloket = Yii::app()->db->createCommand(
		"
		CALL proc_grafikloket ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		$i = 1;
		foreach ($getloket as $data) {
			echo '<tr>
					<td>'.$i++.'</td>
					<td>'.$data['refloket_nama'].'</td>
					<td>'.$data['jumlah'].'</td>
				  </tr>';
		}
	}

	public function actionGetTabelUsia()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafikusia ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$this->renderPartial('tabelusia', array(
			'chart_rekap'=>$chart_rekap
		));

	}

	public function actionGetTabelSaran()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksaran ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$this->renderPartial('tabelsaran', array(
			'chart_rekap'=>$chart_rekap
		));

	}

	public function actionGetTabelNilaiIkm()
	{
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekapikmbulan ('".$tahun."','".$jenis_izin."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$this->renderPartial('tabelnilaiikm', array(
			'chart_rekap'=>$chart_rekap
		));

	}

	public function actionGetTabelperjenislayanan()
	{
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekaprespondenbulan ('".$tahun."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$this->renderPartial('tabelperjenislayanan', array(
			'chart_rekap'=>$chart_rekap
		));

	}



	/*============================================= Akhir Function Memproses Tabel ===============================================*/

	/*============================================= Function mentotal data tabel =================================================*/

	public function actionGetTotal()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));
		
		$get = Yii::app()->db->createCommand(
		"
		CALL proc_grafikjenisizin ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		$total = 0;

		foreach ($get as $data) {
			$total += $data['jumlah'];
		}

		echo $total;
	}

	public function actionGetTotalPendidikan()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$gettingkatpend = Yii::app()->db->createCommand(
		"
		CALL proc_grafiktkpendidikan ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		$totala = 0;

		foreach ($gettingkatpend as $data) {
			$totala += $data['jumlah'];
		}

		echo $totala;
	}

	public function actionGetTotalJenisKelamin()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$getjeniskelamin = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksex ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		$totalb = 0;

		foreach ($getjeniskelamin as $data) {
			$totalb += $data['jumlah'];
		}

		echo $totalb;
	}

	public function actionGetTotalLoket()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		
		$get = Yii::app()->db->createCommand(
		"
		CALL proc_grafikloket ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		$total_loket = 0;

		foreach ($get as $data) {
			$total_loket += $data['jumlah'];
		}

		echo $total_loket;
	}

	public function actionGetTotalUsia()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafikusia ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$total = '';
		$total = $chart_rekap['usai_kurang15']+
	             $chart_rekap['usai_15_20']+
	             $chart_rekap['usai_21_25']+
	             $chart_rekap['usai_26_30']+
	             $chart_rekap['usai_31_35']+
	             $chart_rekap['usai_36_40']+
	             $chart_rekap['usai_41_45']+
	             $chart_rekap['usai_46_50']+
	             $chart_rekap['usai_51_55']+
	             $chart_rekap['usai_56_60']+
	             $chart_rekap ['usai_lebih60'];
	    echo $total;
	}

	public function actionGetTotalSaran()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksaran ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();
			$total = '';
			$total = $chart_rekap['positif']+
					 $chart_rekap['negatif']+
					 $chart_rekap['abstain'];
			echo $total;
		
	}

	public function actionGetTotalNilaiIkm()
	{
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekapikmbulan ('".$tahun."','".$jenis_izin."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$total = '';
		$total = $chart_rekap['jan']+
	             $chart_rekap['feb']+
	             $chart_rekap['mar']+
	             $chart_rekap['apr']+
	             $chart_rekap['mei']+
	             $chart_rekap['jun']+
	             $chart_rekap['jul']+
	             $chart_rekap['agt']+
	             $chart_rekap['sep']+
	             $chart_rekap['okt']+
	             $chart_rekap['nov']+
	             $chart_rekap['des'];	             
	    echo $total;
	}

	public function actionGetTotalperjenislayanan()
	{
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);

		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekaprespondenbulan ('".$tahun."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$total = '';
		$total = $chart_rekap['jan']+
	             $chart_rekap['feb']+
	             $chart_rekap['mar']+
	             $chart_rekap['apr']+
	             $chart_rekap['mei']+
	             $chart_rekap['jun']+
	             $chart_rekap['jul']+
	             $chart_rekap['agt']+
	             $chart_rekap['sep']+
	             $chart_rekap['okt']+
	             $chart_rekap['nov']+
	             $chart_rekap['des'];	             
	    echo $total;
	}

	/*====================================================== Akhir Function memproses data tabel ======================================*/

	/*===================================================== Function Memanggil Grafik ========================================================*/


	public function actionAjxGrfJenisIzin()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));
		//$loket =trim($_REQUEST['loket']);


		header("Content-Type: application/json");
		$result = array();
		$row = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafikjenisizin ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryAll();

		foreach($chart_rekap as $data)
		{
			if ($data['jumlah']>0) {
				$row[] = array(
					$data['refjenisizinikm_nama'],
					floatval( $data['jumlah'] ),
					);
			}	
		}
		
		$result=array_merge($result,$row);
		echo CJSON::encode($result);
	}

	public function actionAjxGrfTingkatPendidikan()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));



		header("Content-Type: application/json");
		$result = array();
		$row = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafiktkpendidikan ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryAll();
		foreach($chart_rekap as $data)
		{	
			$row[] = array(
				$data['reftingkatpendidikan_nama'],
				floatval( $data['jumlah'] ),
			);
		}
		
		$result=array_merge($result,$row);
		echo CJSON::encode($result);
	}

	public function actionAjxGrfJenisKelamin()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));



		header("Content-Type: application/json");
		$result = array();
		$row = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksex ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryAll();
		foreach($chart_rekap as $data)
		{	
			$row[] = array(
				$data['refsex_nama'],
				floatval( $data['jumlah'] ),
			);
		}
		
		$result=array_merge($result,$row);
		echo CJSON::encode($result);
	}

	public function actionAjxGrfLoket()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		header("Content-Type: application/json");
		$result = array();
		$row = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafikloket ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);

		$chart_rekap = $chart_rekap->queryAll();
		foreach($chart_rekap as $data)
		{	
			$row[] = array(
				$data['refloket_nama'],
				floatval( $data['jumlah'] ),
			);
		}
		
		$result=array_merge($result,$row);
		echo CJSON::encode($result);
	}


	public function actionAjxGrfSaran()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));



		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksaran ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		$row = array(
					array(
						"Positif",
						floatval( $chart_rekap['positif'] )
					)
					,array(
						
						"Negatif",
						floatval( $chart_rekap['negatif'] )
					)
					,array(
						"Abstain",
						floatval( $chart_rekap['abstain'] )
					)
				);
		
		$result=$row;
		echo CJSON::encode($result);
	}

	public function actionAjxGrfUsia()
	{
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafikusia ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		
		$row = array(
					array(
						"< 15",
						floatval( $chart_rekap['usai_kurang15'] )
					)
					,array(
						
						"15-20",
						floatval( $chart_rekap['usai_15_20'] )
					)
					,array(
						"21-25",
						floatval( $chart_rekap['usai_21_25'] )
					)
					,array(
						"26-30",
						floatval( $chart_rekap['usai_26_30'] )
					)
					,array(
						"31-35",
						floatval( $chart_rekap['usai_31_35'] )
					)
					,array(
						"36-40",
						floatval( $chart_rekap['usai_36_40'] )
					)
					,array(
						"40-45",
						floatval( $chart_rekap['usai_41_45'] )
					)
					,array(
						"46-50",
						floatval( $chart_rekap['usai_46_50'] )
					)
					,array(
						"51-55",
						floatval( $chart_rekap['usai_51_55'] )
					)
					,array(
						"56-60",
						floatval( $chart_rekap['usai_56_60'] )
					)
					,array(
						"> 60",
						floatval( $chart_rekap['usai_lebih60'] )
					)
				);
		
		$result=$row;
		echo CJSON::encode($result);
	}

	public function actionAjxGrfNilaiIkm()
	{
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);


		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekapikmbulan ('".$tahun."','".$jenis_izin."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		
		$row = array(
					array(
						"Jan",
						floatval( $chart_rekap['jan'] )
					)
					,array(						
						"Feb",
						floatval( $chart_rekap['feb'] )
					)
					,array(
						"Mar",
						floatval( $chart_rekap['mar'] )
					)
					,array(
						"Apr",
						floatval( $chart_rekap['apr'] )
					)
					,array(
						"Mei",
						floatval( $chart_rekap['mei'] )
					)
					,array(
						"Jun",
						floatval( $chart_rekap['jun'] )
					)
					,array(
						"Jul",
						floatval( $chart_rekap['jul'] )
					)
					,array(
						"Ags",
						floatval( $chart_rekap['agt'] )
					)
					,array(
						"Sep",
						floatval( $chart_rekap['sep'] )
					)
					,array(
						"Okt",
						floatval( $chart_rekap['okt'] )
					)
					,array(
						"Nov",
						floatval( $chart_rekap['nov'] )
					)
					,array(
						"Des",
						floatval( $chart_rekap['des'] )
					)
				);
		
		$result=$row;
		echo CJSON::encode($result);
	}

	public function actionAjxGrfperjenislayanan()
	{
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);


		header("Content-Type: application/json");
		$result = array();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekaprespondenbulan ('".$tahun."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		
		$row = array(
					array(
						"Jan",
						floatval( $chart_rekap['jan'] )
					)
					,array(						
						"Feb",
						floatval( $chart_rekap['feb'] )
					)
					,array(
						"Mar",
						floatval( $chart_rekap['mar'] )
					)
					,array(
						"Apr",
						floatval( $chart_rekap['apr'] )
					)
					,array(
						"Mei",
						floatval( $chart_rekap['mei'] )
					)
					,array(
						"Jun",
						floatval( $chart_rekap['jun'] )
					)
					,array(
						"Jul",
						floatval( $chart_rekap['jul'] )
					)
					,array(
						"Ags",
						floatval( $chart_rekap['agt'] )
					)
					,array(
						"Sep",
						floatval( $chart_rekap['sep'] )
					)
					,array(
						"Okt",
						floatval( $chart_rekap['okt'] )
					)
					,array(
						"Nov",
						floatval( $chart_rekap['nov'] )
					)
					,array(
						"Des",
						floatval( $chart_rekap['des'] )
					)
				);
		
		$result=$row;
		echo CJSON::encode($result);
	}


	public function actionCetakGrafikJenisIzin()
	{
		$tipe = trim($_REQUEST['tipe']);
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		
		$get = Yii::app()->db->createCommand(
		"
		CALL proc_grafikjenisizin ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakjenisizin', array(
				'get'=>$get
			));
			
			break;
			
			default:
				# code...
				break;
			}

	}

	public function actionCetakTingkatPendidikan()
	{
		$tipe = trim($_REQUEST['tipe']);
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$gettingkatpend = Yii::app()->db->createCommand(
		"
		CALL proc_grafiktkpendidikan ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();
		
		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakpendidikan', array(
				'gettingkatpend'=>$gettingkatpend
			));
			
			break;
			
			default:
				# code...
				break;
			}


	}

	public function actionCetakJenisKelamin()
	{
		$tipe = trim($_REQUEST['tipe']);
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$getjeniskelamin = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksex ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakjeniskelamin', array(
				'getjeniskelamin'=>$getjeniskelamin
			));
			
			break;
			
			default:
				# code...
				break;
			}
		
	}

	public function actionCetakUsia()
	{
		$tipe = trim($_REQUEST['tipe']);
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafikusia ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakusia', array(
				'chart_rekap'=>$chart_rekap
			));
			
			break;
			
			default:
				# code...
				break;
			}
	}

	public function actionCetakLoket()
	{
		$tipe = trim($_REQUEST['tipe']);
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$getloket = Yii::app()->db->createCommand(
		"
		CALL proc_grafikloket ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		)->queryAll();

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakloket', array(
				'getloket'=>$getloket
			));
			
			break;
			
			default:
				# code...
				break;
			}
	}

	public function actionCetakSaran()
	{
		$tipe = trim($_REQUEST['tipe']);
		$tanggal_awal =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_awal'])));
		$tanggal_akhir =date('Y-m-d',strtotime(trim($_REQUEST['tanggal_akhir'])));


		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_grafiksaran ('".$tanggal_awal."','".$tanggal_akhir."')
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetaksaran', array(
				'chart_rekap'=>$chart_rekap
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
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);
		$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekapikmbulan ('".$tahun."','".$jenis_izin."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetaknilaiikm', array(
				'chart_rekap'=>$chart_rekap,
				'izin'=>$izin
			));
			
			break;
			
			default:
				# code...
				break;
			}
	}

	public function actionCetakJenisLayanan()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$tipe = trim($_REQUEST['tipe']);
		$tahun = (int)trim($_REQUEST['tahun']);		
		$jenis_izin = (int)trim($_REQUEST['jenis_izin']);
		$izin = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif
			FROM
			refjenisizinikm
			where refjenisizinikm_id='.$jenis_izin.'')->queryRow();

		$chart_rekap = Yii::app()->db->createCommand(
		"
		CALL proc_rekaprespondenbulan ('".$tahun."',0)
		"
		);
		$chart_rekap = $chart_rekap->queryRow();

		switch ($tipe) {
			case 'html':
				$this->renderPartial('cetak/cetakjenislayanan', array(
				'chart_rekap'=>$chart_rekap,
				'izin'=>$izin
			));
			
			break;
			
			default:
				# code...
				break;
			}
	}
	
	/*====================================================== Akhir Function memanggil Grafik =============================================*/
	

		







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