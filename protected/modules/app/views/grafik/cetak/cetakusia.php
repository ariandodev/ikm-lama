<style type="text/css">
  table {
    border-collapse: collapse;
  }
  thead {
    background-color: #AFE4E2;
  }
</style>

<div class="well" style="padding: 1px;">
  <h1 id="tahun1" align="center" class="page-title txt-color-blueDark">
    Laporan Grafik Usia Tahun <?php echo date('Y'); ?>
  </h1>
</div>
<table border="1" cellspacing="5" cellpadding="5" align="center" width="500">
<thead>
    <tr>
        <th data-class="expand">No</th>
        <th data-hide="tablet">Usia</th>
        <th data-hide="tablet, phone">Jumlah</th>
    </tr>
    </thead>
    <tbody id="tabelusia">
        <tr>
            <td align="center">1</td>
            <td> 15</td>
            <td align="right"><?php echo $chart_rekap['usai_kurang15']; ?></td>
        </tr>

        <tr>
            <td align="center">2</td>
            <td>15-20</td>
            <td align="right"><?php echo $chart_rekap['usai_15_20'];?></td>
        </tr>
        <tr>
            <td align="center">3</td>
            <td>21-25</td>
            <td align="right"><?php echo $chart_rekap['usai_21_25'];?></td>
        </tr>
        <tr>
            <td align="center">4</td>
            <td>26-30</td>
            <td align="right"><?php echo $chart_rekap['usai_26_30'];?></td>
        </tr>
        <tr>
            <td align="center">5</td>
            <td>31-35</td>
            <td align="right"><?php echo $chart_rekap['usai_31_35'];?></td>
        </tr>
        <tr>
            <td align="center">6</td>
            <td>36-40</td>
            <td align="right"><?php echo $chart_rekap['usai_36_40'];?></td>
        </tr>
        <tr>
            <td align="center">7</td>
            <td>40-45</td>
            <td align="right"><?php echo $chart_rekap['usai_41_45'];?></td>
        </tr>
        <tr>
            <td align="center">8</td>
            <td>46-50</td>
            <td align="right"><?php echo $chart_rekap['usai_46_50'];?></td>
        </tr>
        <tr>
            <td align="center">9</td>
            <td>51-55</td>
            <td align="right"><?php echo $chart_rekap['usai_51_55'];?></td>
        </tr>
        <tr>
            <td align="center">10</td>
            <td>56-60</td>
            <td align="right"><?php echo $chart_rekap['usai_56_60'];?></td>
        </tr>
        <tr>
            <td align="center">11</td>
            <td>>60</td>
            <td align="right"><?php echo $chart_rekap ['usai_lebih60'];?></td>
        </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="2"><b>Total</b></td>
            <?php 
                $total = 0;
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
            ?>
            <td align="right"><?php echo $total;?></td>
        </tr>
    </tfoot>
</table>

<table width="100%" id="tbl-ttd" style="display:none;">
  <tr>
    <td>
      <div id="ttd_pihak_1">

        <div id="mengetahui">
          <p>Mengetahui</p>
          <p>Ka. Bid Regulasi & Pengembangan Kinerja</p>
        </div>

        <div id="tertanda">
          <u>Gatot Sudarmono, SH</u>
          <br>NIP. 196809081996031002
        </div>
      </div>
    </td>
    <td>
      <div id="ttd_pihak_2">
        <div id="mengetahui">
          <p>Mengetahui</p>
          <p>Ka. Sie Pengembangan Kinerja</p>
        </div>

        <div id="tertanda">
          <u>Darsana, SH</u>
          <br>NIP. 196501141986121001
        </div>
      </div>
    </td>    
  </tr>
</table>

<style type="text/css">
  #tbl-ttd{
    margin-top: 30px;
    text-align: center;
  }
  #tertanda{
    margin-top: 70px;
  }
</style>