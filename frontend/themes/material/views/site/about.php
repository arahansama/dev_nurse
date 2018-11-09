<?php
use yii\helpers\Url;

?>
<div class="content">
  <div class="container-fluid">
<?php
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

var_dump(json_encode($arr,JSON_NUMERIC_CHECK));
?>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<script type="text/javascript">
 $(function () { 
            
            $.getJSON("<?=Url::to(['site/tmpchart']);?>",function(data){
                
                seriesData = data;
        Highcharts.chart('container', {
		    chart: {
		        plotBackgroundColor: null,
		        plotBorderWidth: 0,
		        plotShadow: false
		    },
		    title: {
		        text: 'Browser<br>shares<br>2017',
		        align: 'center',
		        verticalAlign: 'middle',
		        y: 40
		    },
		    tooltip: {
		        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		    },
		    plotOptions: {
		        pie: {
		            dataLabels: {
		                enabled: true,
		                distance: -50,
		                format: '<b>{point.txtname}</b>: {point.y} คน',
		                style: {
		                    fontWeight: 'bold',
		                    color: 'white'
		                }
		            },
		            startAngle: -90,
		            endAngle: 90,
		            center: ['50%', '75%']
		        }
		    },  
		    series: [{
		    	type: 'pie',
                name: 'จำนวน',
                colorByPoint: true,
                innerSize: '50%',
                data: seriesData
                	
 
            }]


		});
	});
});   
</script>

  </div>
</div>