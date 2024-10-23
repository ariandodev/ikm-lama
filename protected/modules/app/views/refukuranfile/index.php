<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-film"></i> 
		Setting Referensi Ukuran Foto</h1>
        </div>
	</div>
</div>


<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="well">
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Setting Ukuran Foto</h2>

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
						
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th width="20"><div align="center">No</div></th>
									<th width="187"><div align="center">Bagian </div></th>
									<th width="187"><div align="center">Ukuran Lebar</div></th>
									<th width="158"><div align="center">Ukuran Tinggi</div></th>
									
									<th width="146"><div align="center"></div></th>
								</tr>
							</thead>
							<tbody>
							<?php $no=1; foreach ($refukuran as $referensi): ?>
								<tr>
								
									<td><?php echo $no++; ?></td>
									<td><?php echo $referensi['refukuranfile_kode']; ?></td>
									<td><?php echo $referensi['refukuranfile_width']; ?></td>
									<td><?php echo $referensi['refukuranfile_height']; ?></td>
									
									<td>
									<button onclick="edit(<?php echo $referensi['refukuranfile_id']; ?>)" class="btn btn-primary">
									<i class="fa fa-gear"></i>
									Edit
									</button>
									</td>
								
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

			      </div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
	</div>
	</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="ref-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Edit Ukuran Foto<div id="tbljadwalsurvey_id"></div>
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form">

					<fieldset>

						<section>
							<div class="row">
								<label class="label col col-4">Bagian</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-list"></i>
										<input value="" type="text" name="nama" id="nama" disabled="disabled">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Ukuran Lebar</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-resize-horizontal"></i>
										<input value="" type="number" name="width" id="width">
									</label>
									<span class="txt-color-red" id="pesan_error_width"></span>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Ukuran Tinggi</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-resize-vertical"></i>
										<input value="" type="number" name="height" id="height">
									</label>
									<span class="txt-color-red" id="pesan_error_height"></span>
								</div>
							</div>
						</section>
					
					</fieldset>

					
					<input type="hidden" name="id" id="id" value="">

					<footer>
						<button onclick="return simpan()" class="btn btn-primary">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
									
					

			</div></form>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
pageSetUp();

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#width").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#pesan_error_width").html("Mohon isikan hanya dengan Angka").show().fadeOut(4000);
               return false;
    }
   });

  $("#height").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#pesan_error_height").html("Mohon isikan hanya dengan Angka").show().fadeOut(4000);
               return false;
    }
   });
});

// PAGE RELATED SCRIPTS

// menu
$("#menu").menu();

if($('.DTTT_dropdown.dropdown-menu').length){
	$('.DTTT_dropdown.dropdown-menu').remove();
}

function edit (id) {
	$.ajax({
		url: 'app/refukuranfile/getdata',
		type: 'post',
		data: {
			id: id,
		},
		success:function(data) {
			$("#id").val(data.split("||")[0]);
 			$("#nama").val(data.split("||")[1]);
 			$("#width").val(data.split("||")[2]);
			$("#height").val(data.split("||")[3]);
		}
	});
					
	$("#ref-form").modal("show");
}

function simpan () {
		$.ajax({
			url: 'app/refukuranfile/simpan',
			type: 'post',
			data: {
				id: $("#id").val(),
				height: $("#height").val(),
				width: $("#width").val()
			},
			success: function(data) {
				if (data=="success") {
					$("#ref-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail');
				}
			}
		}); 
	return false;
}


function notifikasi(title, msg, type) {
	if (type=='success') {
		var warna = '#296191';
		var icon = 'fa-save';
		var isrefresh = "<p class='text-align-right'><a onclick='refresh()' class='btn bg-color-orange txt-color-white btn-sm'>Klik Untuk Merefresh Halaman</a></p>";
	} else {
		var warna = '#B61F1F;';
		var icon = 'fa-warning';
		var isrefresh = "";
	}
	$.smallBox({
		title : title,
			//content : "<i class='fa fa-clock-o'></i><i>"+msg+"</i>",
			content : msg+isrefresh,
			color : warna, // warna background
			icon : "fa "+icon+" swing animated",
			//iconSmall : "fa "+ icon +" bounce animated", // dengan animasi bounce
			timeout : 4000 // lama alert ditampilkan
		});
	}

function refresh () {
	window.location.reload();
}
	
</script>