<?php define('ASSETS_URL', 'themes/smartadmin'); ?>


<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
    <h3 class="page-title txt-color-blueDark">
      <i class="fa fa-group  fa-fw "></i> 
      Setting Pertanyaan Jawaban
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
                <h2>Pertanyaan Jawaban </h2>
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
                                <section class="col col-1">
                                    <label for="label" class="input">No </label>
                                </section>
                                <section class="col col-5">
                                   <input class="form-control" placeholder="" type="text">
                                </section>
                            </div>
                            <div class="row">
                                 <section class="col col-1">
                                    <label for="label" class="input">Pertanyaan </label>
                                </section>
                                <section class="col col-5">
                                   <label class="textarea"> <i class="icon-append fa fa-question-circle"></i>                             
                                    <textarea rows="3" placeholder=""></textarea>
                                    <b class="tooltip tooltip-top-right"> 
                                        <i class="fa fa-warning txt-color-teal"></i> 
                                        pertanyaan</b> 
                                   </label>
                                </section>
                            </div>
                            <div class="row">
                            <section class="col col-1">
                                Jawaban
                            </section>
                            <section class="col col-0">
                                A.  
                            </section>
                            <section class="col col-2">
                                 <input class="form-control" placeholder="" type="text">
                            </section>
                             <section class="col col-0">
                                B.  
                            </section>
                            <section class="col col-2">
                                 <input class="form-control" placeholder="" type="text">
                            </section>
                            </div>
                              <div class="row">
                            <section class="col col-1">
                               
                            </section>
                            <section class="col col-0">
                                C.  
                            </section>
                            <section class="col col-2">
                                 <input class="form-control" placeholder="" type="text">
                            </section>
                             <section class="col col-0">
                                D.  
                            </section>
                            <section class="col col-2">
                                 <input class="form-control" placeholder="" type="text">
                            </section>
                            </div>
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

                         
                               <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1432" data-widget-custombutton="false" data-widget-fullscreenbutton="false"  data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false">


                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2> Pertanyaan </h2>

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


                                      <table id="datatable_tabletools" class="table table-striped table-bordered smart-form">
                                        <thead>
                                            <tr>
                                              <th width="10" rowspan="2"><div align="center">No</div></th>
                                              <th width="750" rowspan="2"><div align="center">Pertanyaan</div></th>
                                              <th colspan="10"><div align="center">Jawaban</div></th>
                                          </tr>
                                          <tr>
                                            <th width="2"><div align="center">A</div></th>
                                            <th width="2"><div align="center">B</div></th>
                                            <th width="2"><div align="center">C</div></th>
                                            <th width="2"><div align="center">D</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan perizinan</td>
                                            <td>Sangat mudah </td>
                                            <td><span class="pull-left">Mudah</span></td>
                                            <td><span class="pull-left"> Kurang mudah </span></td>
                                            <td><span class="pull-left">Tidak mudah</span></td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>2</td>
                                            <td>Bagaimana pendapat saudara tentang kemudahan persyaratan perizinan yang harus dipenuhi</td>
                                            <td>Sangat sesuai </td>
                                            <td>Sesuai</td>
                                            <td>Kurang sesuai </td>
                                            <td>Tidak sesuai </td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>3</td>
                                            <td>Bagimana pendapat saudara tentang kejelasan informasi pelayanan yang diberikan di kantor ini</td>
                                            <td>Selalu ada </td>
                                            <td>Ada</td>
                                            <td>Kurang ada </td>
                                            <td>Tidak ada </td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>4</td>
                                            <td>Bagaimana pendapat saudara tentang kedisiplinan petugas front office di kantor ini</td>
                                            <td>Sangat disiplin  </td>
                                            <td>Disiplin</td>
                                            <td>Kurang disiplin </td>
                                            <td>Tidak disiplin </td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>5</td>
                                            <td>Bagaimana pendapat saudara tentang tanggung jawab petugas dalam memberikan pelayanan</td>
                                            <td>Sangat Bertanggung-jawab </td>
                                            <td>Bertanggung-jawab</td>
                                            <td>Kurang Bertanggung-jawab</td>
                                            <td>Tidak Bertanggung-jawab </td>
                                        </tr>
                                    </tbody>
                                </table>
                           </div>
                      </div>
                 
            </div>
            </article>           
</section>

<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    pageSetUp();
</script>