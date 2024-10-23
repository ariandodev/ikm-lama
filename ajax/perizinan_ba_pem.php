<?php require_once("inc/init.php"); ?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Berita Acara (BA) Pemeriksaan
		</h1>
	</div>
</div>
<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-21" data-widget-editbutton="false" data-widget-deletebutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-check"></i> </span>
					<h2>Alur Pendaftaran Izin</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<div class="row">
							<form id="wizard-1" novalidate>
								<div id="bootstrap-wizard-1" class="col-sm-12">
									<div class="form-bootstrapWizard" align="center">
										<ul class="bootstrapWizard form-wizard">
											<li data-target="#step1">
												<span class="step">1</span> <span class="title">Pendaftaran</span>
											</li>
											<li class="active" data-target="#step2">
												<span class="step">2</span> <span class="title">Pencetakan</span>
											</li>
											<li data-target="#step3">
												<span class="step">3</span> <span class="title">Kasir</span>
											</li>
											<li data-target="#step4">
												<span class="step">4</span> <span class="title">Pengambilan SK</span>
											</li>
											
											<li data-target="#step5">
												<span class="step">5</span> <span class="title">Laporan</span>
											</li>
											<li data-target="#step6">
												<span class="step">6</span> <span class="title">Grafik</span>
											</li>
											
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="tab-content">
										<div class="tab-pane" id="tab1">
											<br>
											<h3><strong>Step 1 </strong> - Pendaftaran</h3>
										</div>
										<div class="tab-pane active" id="tab2">
											<br>
											<h3><strong>Step 2</strong> - Pencetakan</h3>
										</div>
										<div class="tab-pane" id="tab3">
											<br>
											<h3><strong>Step 3</strong> - Kasir</h3>
										</div>
										<div class="tab-pane" id="tab4">
											<br>
											<h3><strong>Step 4</strong> - Pengambilan SK<br>
										</h3>
										</div>
										
										<div class="tab-pane" id="tab5">
											<br>
											<h3><strong>Step 5</strong> - Laporan</h3>
										</div>
										<div class="tab-pane" id="tab6">
											<br>
											<h3><strong>Step 6</strong> - Grafik</h3>
										</div>
									</div>
								</div>
							</form>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

	  </div>
			<!-- end widget -->
	</div>
</div>



<div class="row">
	<div class="col-sm-12">
		
	  <div class="well">
			<button class="close" data-dismiss="alert">
					x
			</button>
			<h1 class="semi-bold">B. 2. Apa itu &quot;BA Pemeriksaan&quot; ?</h1>
		<p class="text-justify">Survey disini merupakan kegiatan survey pemeriksaan lapangan sesuai dengan jadwal yang telah ditentukan terhadap permohonan suatu izin untuk mengumpulkan dan mendapatkan informasi terkait. Pada halaman ini terdapat daftar suatu form survey yang dilengkapi fitur pengeditan dan penghapusan data. Adapun pada form ini dilengkapi fasilitas pencarian cepat, yang memungkinkan dalam melakukan pencarian data secara cepat dan tepat pada sejumlah data yang banyak.</p>
	  </div>

		
	</div>
</div>

<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
	<!-- widget options:
	usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

	data-widget-colorbutton="false"
	data-widget-editbutton="false"
	data-widget-togglebutton="false"
	data-widget-deletebutton="false"
	data-widget-fullscreenbutton="false"
	data-widget-custombutton="false"
	data-widget-collapsed="true"
	data-widget-sortable="false"

	-->
	<header>
		<span class="widget-icon"> <i class="fa fa-search"></i> </span>
		<h2>Pencarian</h2>

	</header>

	<!-- widget div-->
	<div>
		<!-- widget content -->
		<div>
			<div class="row">
				<div class="col-md-4">
					<div class="icon-addon addon-md">
						<i class="icon-append fa fa-search"></i>
						<input class="form-control" id="nomor_daftar" name="nomor_daftar" placeholder="Nomor Pendaftaran" type="text"
						data-autocomplete='[
						"000123 / PT. Medika / Jatinegara, Bali",
						"000124 / PT. Jaya Trans / Margarana, Bali",
						"000125 / CV. Semarak / Jombor, Sleman",
						"000126 / CV. Adi Sentosa / Pluit, Jakarta",
						"000127 / PT. Era Jaya / Yogyakarta"]' />
					</div>
				</div>	
				(Ketikkan Nama Pemohon atau Nama Jenis Permohonan)		
			</div>
		</div><br />
		<!-- end widget content -->
	</div>
	<!-- end widget div -->

</div><!-- widget grid -->


<div class="row">
<article class="col-sm-12 col-md-12 col-lg-12">
		<!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-23" data-widget-editbutton="false">
					
					data-widget-colorbutton="false"	
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true" 
					data-widget-sortable="false"
					
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>BA Pemeriksaan</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
<div class="widget-body no-padding">
						
  <form action="" id="order-form" class="smart-form" novalidate>
							<table id="user" class="table table-bordered table-striped" style="clear: both">
							<tbody>
								<tr>
									<td style="width:35%;">Nomor Pendaftaran</td>
									<td style="width:65%"><a href="#" >1157/08/2014</a></td>
								</tr>
								<tr>
									<td>Jenis Izin</td>
									<td>SIUP (Surat Izin Usaha Perikanan)</td>
								</tr>
								<tr>
									<td>Jenis Permohonan</td>
									<td>BARU</td>
								</tr>
								<tr>
									<td>Nama Pemohon</td>
									<td>WARDONO</td>
								</tr>
								<tr>
									<td>Nama Usaha</td>
									<td>SINAR LAUT</td>
								</tr>

								<tr>
									<td>Nomor KTP</td>
									<td>3327090504730006</td>
								</tr>
								<tr>
									<td>Nomor NPWP</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Nomor Telepon</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Lokasi/ Usaha / Bangunan</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Kecamatan
									<td>-</td>
								</tr>

								<tr>
									<td>Kelurahan</td>
									<td>-</td>
								</tr>
								

							</tbody>
						</table>                                               
                                <form action="" id="order-form" class="smart-form" novalidate>

							<fieldset>
                            
                            <div class="row">
									<section class="col col-6">
                                 <label class="input"> <i class="icon-append fa fa-list-ol"></i>
											<input type="text" name="nobap" placeholder="Nomor BAP" >
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Nomor BAP</b>
								   </label>
                                  </section>
                                </div>
                            
                            <div class="row">
									<section class="col col-6">
                                 <label class="input"> <i class="icon-append fa fa-calendar "></i>
											<input type="text" name="tgl1" placeholder="Tanggal BAP" class="datepicker" data-dateformat="dd/mm/yy">
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal BAP</b>
								   </label>
                                  </section>
                                </div>
                                
                                <div class="row">
									<section class="col col-6">
                                 <label class="input"> <i class="icon-append fa fa-calendar "></i>
											<input type="text" name="tgl2" placeholder="Tanggal Pemeriksaan Lapangan Realisasi" class="datepicker" data-dateformat="dd/mm/yy">
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal Pemeriksaan Lapangan Realisasi</b>
								   </label>
                                  </section>
                                </div>
                                                                
                                </fieldset>                            			
							<footer>
								<button type="submit" class="btn btn-primary" id="eg7">
									<i class="fa fa-save"></i> Simpan
								</button>							
	  							<button type="submit" class="btn btn-dafault">
									<i class="fa fa-print"></i> Cetak
								</button>
								<button type="submit" class="btn btn-success">
									<i class="fa fa-pencil"></i> Edit
								</button>
 							 </footer>                            



  </form>
<!-- end widget content --><!-- end widget div --><!-- end widget --></div>

<script type="text/javascript">
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();
	
	$('#eg7').click(function() {

		$.smallBox({
			title : "Data Berhasil Disimpan",
			content : "<i class='fa fa-save'></i><i> Klik disini untuk lihat data</i>",
			color : "#739E73",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000			
		});

	})
	
</script>