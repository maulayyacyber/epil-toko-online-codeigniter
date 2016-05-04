<script src="<?=base_url()?>system/application/js/highchart/js/highcharts.js"></script>
<?php
	$total_penjualan =$total_pembelian = 0;
	$bulan=$series="";
	foreach($result_grafik_laporan_bulanan as $bln=>$row){
		$laba = $row["penjualan"] - $row["pembelian"];
		$bulan = $bulan."'".$bln."',";
		$series = $series.$laba.",";
	}
	$bulan = substr($bulan,0,strlen($bulan)-1);
	$series = substr($series,0,strlen($series)-1);
?>
<script>
var chart1; // globally available
$(document).ready(function() {

     chart1 = new Highcharts.Chart({

         chart: {

            renderTo: 'statistik',

            type: 'spline'

         },

         title: {

            text: 'Grafik Laporan Tahunan',

         },

         xAxis: {

            categories: [<?=$bulan?>],
			title: {

               text: 'Bulan'

            }
			
         },

         yAxis: {
            title: {

               text: 'Laba'
            }

         },

         series: [{
			name : "laba",
			data : [<?=$series?>]
		}]
		
      });
	  
   });
</script>
<div id="statistik" style="margin-top:50px"></div>