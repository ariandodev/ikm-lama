
<?php define('ASSETS_URL', 'themes/smartadmin'); ?>


<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
    <h3 class="page-title txt-color-blueDark">
      <i class="fa fa-group  fa-fw "></i> 
      Jenis Izin
    </h3>
  </div>
</div>
<hr>

<!-- widget grid -->

<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START --><!-- WIDGET END -->

        <!-- NEW WIDGET START -->
        <article class="col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-ikuskpd" data-widget-custombutton="false" data-widget-fullscreenbutton="false"  data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false">
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
                <h2>Jenis Izin </h2>
            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->
                   
                    <div class="well no-padding">
                   <form  id="jenis_kelamin" class="smart-form">
					<div id="attachement" style="padding: 20px;">
						<div class="row" >
							<section class="col col-2">
							<label for="label" >Jenis Izin </label>
							</section>
							<section class="col col-5">
								<select class="form-control" id="ikm">
									<option value="0">=== Pilih Jenis Izin ===</option>
									<option value="0">IMB</option>
									<option value="0">HO</option>
								</select>
							</section>
						</div>
						<div class="row">
							<section class="col col-2">
								<label for="label">Nama Izin </label>
							</section>
							<section class="col col-5">
								 <input class="form-control" placeholder="" type="text">
							</section>
						</div>
						<div class="row">
						    <section class="col col-2">
						          <label>Aktif</label>
						    </section>
						    <section class="col col-1">
						    	<label class="toggle">
						    		<input name="checkbox-toggle" checked="checked" type="checkbox">
						    		<i data-swchon-text="ON" data-swchoff-text="OFF"></i></label>
						    </section>
						</div>

                        <footer>
                            <button class="btn btn-success btn-sm pull-left" type="button">
                            <i class="fa  fa-save ">&nbsp;</i>Simpan
                            </button>
                        </footer>
                    </form>
                    </div>

                    </div>
               </article>

                         
                            
</section>

<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    pageSetUp();
</script>