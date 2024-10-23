 <div class="widget-body">
 	<div id="grfjenisizin" style="min-width: 310px; height: 400px; margin: 0 auto"></div>                         
 </div>

<script type="text/javascript">

 function generate_chart(awal, akhir) {

            
            //if (awal=='' || akhir=='')

            var options = {
                chart: {
                renderTo: 'grfjenisizin',
                type: 'column',
                margin: [ 50, 50, 100, 80],
                 /*options3d: {
                    enabled: true,
                    alpha: 8,
                    beta: 3,
                    depth: 50,
                    viewDistance: 25
                    }*/
                },

                plotOptions: {
                column: {
                    colorByPoint: true
                }
                },
                colors: [
                    '#ff0000',
                    '#00ff00',
                    '#0000ff',
                    '#0f0f0f',
                    '#f0f0f0'
                ],

                title: {
                    text: 'Grafik Laporan Jenis Izin' //judul chart
                },

                xAxis: {
                    categories: [
                        
              
                    ]
                },


                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }
                },
                legend: {
                     enabled: false
                },

                tooltip: {
                    formatter: function() {
                        return 'Jumlah: '+ Highcharts.numberFormat(this.y) +
                               ' Responden';
                    }
                },
                
                series: [{
                    type: 'column',
                    name: 'Jumlah',
                    data: ''
                }]

            };
           }


</script>