<?php defined('BASEPATH') OR exit('No direct script access allowed');


//Graph Template folder path
function graph_path($uri = '') {
	return site_url('assets/graph.v1/') . $uri;
}

function graph_js() {
	echo '<script src="'.graph_path().'amcharts.js" type="text/javascript"></script>';
	echo '<script src="'.graph_path().'serial.js" type="text/javascript"></script>';
	echo '<script src="'.graph_path().'plugins/export/export.min.js" type="text/javascript"></script>';
	echo '<link rel="stylesheet" href="'.graph_path().'plugins/export/export.css" type="text/css" media="all" />';
	echo '<style type="text/css"> .amcharts-chart-div a {display:none !important;} </style>';
}
// $linechartdivData = '[
// 	{
// 		"date": "2009-10-02",
// 		"value": 5,
// 		"value1": 8
// 	},
// 	{
// 		"date": "2009-10-03",
// 		"value": 15,
// 		"value1": 18
// 	},
// 	{
// 		"date": "2009-10-04",
// 		"value": 13,
// 		"value1": 10
// 	},
// 	{
// 		"date": "2009-10-05",
// 		"value": 17,
// 		"value1": 11
// 	},
// 	{
// 		"date": "2009-10-06",
// 		"value": 15,
// 		"value1": 7
// 	},
// 	{
// 		"date": "2009-10-09",
// 		"value": 19,
// 		"value1": 8
// 	},
// 	]';
// echo loadgraph('chartdiv',$linechartdivData);
function loadgraph($graphName, $chatData = array()){
	$bulletsArray = array( "round", "square", "triangleUp", "triangleDown", "bubble", );
	
	//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE 
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE	
?>
<script>
	// since v3, chart can accept data in JSON format
	// if your category axis parses dates, you should only
	// set date format of your data (dataDateFormat property of AmSerialChart)
	var lineChartData = <?php echo $chatData; ?>;
	
	AmCharts.ready(function () {
		var chart = new AmCharts.AmSerialChart();
		chart.dataProvider = lineChartData;
	
		chart.categoryField = "date";
		chart.dataDateFormat = "YYYY-MM-DD";
	
		// sometimes we need to set margins manually
		// autoMargins should be set to false in order chart to use custom margin values
		chart.autoMargins = false;
		chart.marginRight = 0;
		chart.marginLeft = 0;
		chart.marginBottom = 0;
		chart.marginTop = 0;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
		categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
		categoryAxis.inside = true;
		categoryAxis.gridAlpha = 0;
		categoryAxis.tickLength = 0;
		categoryAxis.axisAlpha = 0;
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 4;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.type = "line";
		graph.valueField = "value";
		graph.lineColor = "<?php echo '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; ?>";
        graph.bullet = "square";
//		graph.customBullet = "<?php //echo graph_path(); ?>images/star.png"; // bullet for all data points
// 		graph.bulletSize = 14; // bullet image should be a rectangle (width = height)
// 		graph.customBulletField = "customBullet"; // this will make the graph to display custom bullet (red star)
		chart.addGraph(graph);

		var graph = new AmCharts.AmGraph();
		graph.type = "line";
		graph.valueField = "value1";
		graph.lineColor = "<?php echo '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; ?>";
		graph.bullet = "round";
//		graph.customBullet = "<?php //echo graph_path(); ?>images/star.png"; // bullet for all data points
// 		graph.bulletSize = 14; // bullet image should be a rectangle (width = height)
// 		graph.customBulletField = "customBullet"; // this will make the graph to display custom bullet (red star)
		chart.addGraph(graph);
		
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chart.addChartCursor(chartCursor);
		
	
		// WRITE
		chart.write('<?php echo $graphName; ?>');
	});
</script>
<div id="<?php echo $graphName; ?>" style="width:100%; height:300px;"></div>
		
<?php

}

function maingraph ( $graphName, $chatData = array(), $appLine ){
	$bulletsArray = array( "round", "square", "triangleUp", "triangleDown", "bubble", );
	$bulletsArray[array_rand($bulletsArray)];

	//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
?>

<script>
var chart = AmCharts.makeChart("<?php echo $graphName; ?>", {
    "type": "serial",
    "theme": "light",
    "dataProvider": <?php echo $chatData; ?>,
    "graphs": <?php echo $appLine; ?>,
    "marginTop": 20,
    "marginRight": 70,
    "marginLeft": 40,
    "marginBottom": 20,
    "chartCursor": {
        "graphBulletSize": 1.5,
     	"zoomable":false,
      	"valueZoomable":true,
         "cursorAlpha":0,
         "valueLineEnabled":true,
         "valueLineBalloonEnabled":true,
         "valueLineAlpha":0.2
    },
    "autoMargins": false,
    "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
    "categoryField": "date",
    "valueScrollbar":{
    "offset":30
    },
    "categoryAxis": {
        "parseDates": true,
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "HH:NN",
        //"cursorPosition": "mouse"
    },
    "categoryField": "date",
    "categoryAxis": {
        "minPeriod": "hh",
        "parseDates": true
    },
    "legend":{
        "useGraphSettings" : true,
    },
    "export": {
        "enabled": true,
    }
});
</script>

<div id="<?php echo $graphName; ?>" style="width:100%; height:400px;"></div>
		
<?php

}

function dateGraph ( $graphName, $chatData = array(), $appLine , $height = array() ){
	$bulletsArray = array( "round", "square", "triangleUp", "triangleDown", "bubble", );
	$bulletsArray[array_rand($bulletsArray)];

	//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	?>

<script>
var chart = AmCharts.makeChart("<?php echo $graphName; ?>", {
    "type": "serial",
    "theme": "light",
    "dataProvider": <?php echo $chatData; ?>,
    "graphs": <?php echo $appLine; ?>,
    "marginTop": 20,
    "marginRight": 70,
    "marginLeft": 40,
    "marginBottom": 20,
    "chartCursor": {
        "graphBulletSize": 1.5,
     	"zoomable":false,
      	"valueZoomable":true,
         "cursorAlpha":0,
         "valueLineEnabled":true,
         "valueLineBalloonEnabled":true,
         "valueLineAlpha":0.2
    },
    "autoMargins": false,
    "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
    "categoryField": "date",
    "valueScrollbar":{
    "offset":30
    },
    "categoryAxis": {
        "parseDates": true,
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "chartCursor": {
//         "categoryBalloonDateFormat": "HH:NN",
        //"cursorPosition": "mouse"
    },
    "categoryField": "date",
    "categoryAxis": {
        //"minPeriod": "hh",
        "parseDates": true
    },
    "legend":{
        "useGraphSettings" : true,
    },
    "export": {
        "enabled": true,
//         "position":"top-left",
    }
});
</script>

<div id="<?php echo $graphName; ?>" style="width:100%; height:<?php echo (!empty($height))?$height:'400px'; ?>;"></div>
		
<?php

}
