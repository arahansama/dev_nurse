<?php
use yii\helpers\Url;
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<center><button class="btn btn-info"><h4>NURSE5-DATACENTER DASHBOARD</h4>
					<div class="ripple-container"></div>
				</center>
				</button>
				
			</div>
			<div class="col-md-4">
				<div id="chart1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
			</div>
			<div class="col-md-4">

			</div>
		</div>
	</div>
</div>


<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
 $(function () { 
            
            $.getJSON("<?=Url::to(['site/tmpchart']);?>",function(data){
                
                seriesData = data;
        Highcharts.chart('chart1', {
		    chart: {
		        plotBackgroundColor: null,
		        plotBorderWidth: 0,
		        plotShadow: false,
		        borderWidth: 0,
        		backgroundColor: null,
        		spacingBottom: 15,
		        spacingTop: 10,
		        spacingLeft: 10,
		        spacingRight: 10,
		        width: null,
		        height: null
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