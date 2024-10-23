<?php 
	/**
	* written by : Suryo Prasetyo W <the.oyrus@gmail.com>
	* description : Extension untuk menggenerate Tanggal Lokal Indonesia
	* 
	*/
	class TanggalIndonesia extends CApplicationComponent
	{
		public function TanggalUmum($tgl)
		{
			$tanggal = date('d',strtotime($tgl));
			$bulan = $this->getBulan(date('n',strtotime($tgl)));
			$tahun = date('Y',strtotime($tgl));
			$tanggalumum = $tanggal ." ".$bulan." ".$tahun;
			return $tanggalumum;
		}

		public function TanggalHari($tgl)
		{
			$tglumum = $this->TanggalUmum($tgl);
			$hari = $this->getHari($tgl);
			return $hari .' '. $tglumum;
		}

		public function getBulan($kodebulan)
		{
			// date('n',strtotime('17-09-2014')) hasilnya 9
			// menggunakan format 'm' akan menghasilkan nomor bulan dengan 0
			// menggunakan format 'n' akan menghasilkan nomor bulan tanpa 0
			// dalam class ini gunakan 'n'
			switch ($kodebulan) {
				case 1:
				$namabulan = 'Januari';
				break;
				case 2:
				$namabulan = 'Februari';
				break;
				case 3:
				$namabulan = 'Maret';
				break;
				case 4:
				$namabulan = 'April';
				break;
				case 5:
				$namabulan = 'Mei';
				break;
				case 6:
				$namabulan = 'Juni';
				break;
				case 7:
				$namabulan = 'Juli';
				break;
				case 8:
				$namabulan = 'Agustus';
				break;
				case 9:
				$namabulan = 'September';
				break;
				case 10:
				$namabulan = 'Oktober';
				break;
				case 11:
				$namabulan = 'November';
				break;
				case 12:
				$namabulan = 'Desember';
				break;
				
				default:
				$namabulan = 'salah';
				break;
			}
			return $namabulan;
		}

		function getHari($tgl) {
			if(($tgl == '') or ($tgl == null) or ($tgl == '0') or ($tgl == '01-01-1970') or ($tgl == '1970-01-01') or ($tgl == '0000-00-00') or ($tgl == '00-00-0000')){ 
				return '';
			} else {
				$tanggal = strtotime($tgl);
				$hari = date('w', $tanggal);
				switch ($hari) {
					case 0: $hari = 'Minggu'; break;
					case 1: $hari = 'Senin'; break;
					case 2: $hari = 'Selasa'; break;
					case 3: $hari = 'Rabu'; break;
					case 4: $hari = 'Kamis'; break;
					case 5: $hari = 'Jumat'; break;
					case 6: $hari = 'Sabtu'; break;
				}
				return $hari;
			}
		}

		function getJam($waktu,$akhiran='WIB') {
			$jam = date('H:i',strtotime($waktu));
			return $jam.' '.$akhiran;
		}

		function selisih_tgl($tgla, $tglb, $suffix="")
		{
			$selisih = floor(abs( strtotime($tgla) - strtotime($tglb) ) / 86400);
			return $selisih." ".$suffix;
		}

		function xTimeAgo ($oldTime, $newTime, $timeType) {
			$timeCalc = strtotime($newTime) - strtotime($oldTime);
			if ($timeType == "x") {
				if ($timeCalc = 60) {
					$timeType = "m";
				}
				if ($timeCalc = (60*60)) {
					$timeType = "h";
				}
				if ($timeCalc = (60*60*24)) {
					$timeType = "d";
				}
			}
			if ($timeType == "s") {
				$timeCalc .= " seconds ago";
			}
			if ($timeType == "m") {
				$timeCalc = round($timeCalc/60) . " menit";
			}
			if ($timeType == "h") {
				$timeCalc = round($timeCalc/60/60) . " jam";
			}
			if ($timeType == "d") {
				$timeCalc = round($timeCalc/60/60/24) . " hari";
			}
			return $timeCalc;
		}

		function timeAgo($timestamp){
			date_default_timezone_set('Asia/Jakarta');
			$skrg = date("Y-m-d H:i:s");
			$isi = str_replace("-","",$this->xTimeAgo($skrg,$timestamp,"m"));
			$isi2 = str_replace("-","",$this->xTimeAgo($skrg,$timestamp,"h"));
			$isi3 = str_replace("-","",$this->xTimeAgo($skrg,$timestamp,"d"));
			$go="";
			if($isi > 60)
			{
				$go=$isi2;
			}elseif($isi2 > 24)
			{
				$go=$isi3;
			}elseif($isi < 61)
			{
				$go=$isi;
			}
			return $go;
		}

		function cek_selisih_waktu($oldTime, $newTime, $issuffix=false)
		{
			$hasil = $this->xTimeAgo($oldTime,$newTime,'m');
			$selisih_menit = explode(" ", $this->xTimeAgo($oldTime,$newTime,'m') );
			$selisih_jam = explode(" ", $this->xTimeAgo($oldTime,$newTime,'h') );

			if($selisih_menit[0] < 60) {
				//$hasil = xTimeAgo($oldTime,$newTime,'h');
				$hasil = "0 menit";
				if(!$issuffix) {
					$hasil = 0;
				}
			}

			if($selisih_menit[0] > 60) {
				$hasil = $this->xTimeAgo($oldTime,$newTime,'h');
				if(!$issuffix) {
					$hasil = explode(" ", $hasil);
					$hasil = $hasil[0];
				}
			}

			if($selisih_jam[0] > 23) {
				$hasil = $this->xTimeAgo($oldTime,$newTime,'d');
				if(!$issuffix) {
					$hasil = explode(" ", $hasil);
					$hasil = $hasil[0];
				}
			}

			return $hasil;

		}
	}