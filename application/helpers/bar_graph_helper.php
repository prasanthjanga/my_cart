<?php defined('BASEPATH') OR exit('No direct script access allowed');


//Graph Template folder path
function bargraph_path($uri = '') {
	return site_url('assets/graph.v1/') . $uri;
}

function bargraph_js() {
	echo '<script src="'.bargraph_path().'amcharts.js" type="text/javascript"></script>';
	echo '<script src="'.bargraph_path().'serial.js" type="text/javascript"></script>';
	echo '<script src="'.bargraph_path().'plugins/export/export.min.js" type="text/javascript"></script>';
	echo '<link rel="stylesheet" href="'.bargraph_path().'plugins/export/export.css" type="text/css" media="all" />';
	echo '<style type="text/css"> .amcharts-chart-div a {display:none !important;} </style>';
}


function loadbar ( $graphName, $chatData = array(), $x, $y , $height = array() ){
	$bulletsArray = array( "round", "square", "triangleUp", "triangleDown", "bubble", );
	$bulletsArray[array_rand($bulletsArray)];

	//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	?>

<script>
var chart = AmCharts.makeChart( "<?php echo $graphName; ?>", {
	  "type": "serial",
	  "theme": "light",
	  "dataProvider": <?php echo $chatData; ?>,
	  "gridAboveGraphs": true,
	  "startDuration": 0.8,
	  "graphs": <?php echo $y; ?>,
	  "chartCursor": {
	    "categoryBalloonEnabled": false,
	    "cursorAlpha": 0,
	    "zoomable": true,


	    "graphBulletSize": 1.5,
      	"valueZoomable":false,
         "cursorAlpha":0,
         "valueLineEnabled":false,
         "valueLineBalloonEnabled":true,
         "valueLineAlpha":0.3
	  },
	  "categoryField": "<?php echo $x['x']; ?>",
	  "categoryAxis": {
		"labelRotation":45,
	    "gridPosition": "start",
	    "gridAlpha": 0,
	    "tickPosition": "start",
	    "tickLength": 20,

	  },
	  "legend":{
		"useGraphSettings" : true,
	  },
	  "export": {
	    "enabled": true
	  }

	} );
</script>

<div id="<?php echo $graphName; ?>" style="width:100%; height:<?php echo (!empty($height))?$height:'400px'; ?>;"></div>
		
<?php 
} //LOADBAR FUNCTION END




function loadbar_aggregate ( $graphName, $chatData = array(), $x, $y, $color = array(), $height = array() ){
	$bulletsArray = array( "round", "square", "triangleUp", "triangleDown", "bubble", );
	$bulletsArray[array_rand($bulletsArray)];

	//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	?>

<script>
var chart2;

var chartData2 = <?php echo $chatData; ?>;

AmCharts.ready(function () {
    // SERIAL CHART
    chart2 = new AmCharts.AmSerialChart();
    chart2.dataProvider = chartData2;
    chart2.categoryField = "label";
    chart2.startDuration = 1;

    // AXES
    // category
    var categoryAxis = chart2.categoryAxis;
    categoryAxis.labelRotation = 45;
    categoryAxis.gridPosition = "start";

    
    //LEGEND
    var legend = new AmCharts.AmLegend();
// 	legend.data = [{title:"90percentile", color:"#67b7dc"}, {title:"Average", color:"#62cf73"}];
	legend.position = "bottom";
	legend.valueText = "[[value]]";
	legend.valueAlign = "left";
	legend.equalWidths = false;
	chart2.addLegend(legend);

    // value
    // in case you don't want to change default settings of value axis,
    // you don't need to create it, as one value axis is created automatically.

    // GRAPH
    <?php 
    foreach($y as $yKey => $yValue){
    	echo 'var graph = new AmCharts.AmGraph();';
    	echo 'graph.valueField = "'.$yValue.'"'."\n";
    	echo 'graph.balloonText = "[[title]]: <b>[[value]]</b>";'."\n";
    	if (!empty($color)){
    		echo 'graph.fillColors = "#'.$color[$yKey].'";'."\n";
    	}
    	echo 'graph.type = "column";'."\n";
    	echo 'graph.title = "'.$yValue.'";'."\n";
    	echo 'graph.lineAlpha = 0;'."\n";
    	echo 'graph.fillAlphas = 1;'."\n";
    	echo 'chart2.addGraph(graph);'."\n";
    	echo "\n";
    }
    	
    ?>
//     var graph = new AmCharts.AmGraph();
//     graph.valueField = "90percentile";
//     graph.balloonText = "[[title]]: <b>[[value]]</b>";
//     graph.fillColors = "#67b7dc";
//     graph.type = "column";
//     graph.title = "90percentile";
//     graph.lineAlpha = 0;
//     graph.fillAlphas = 1;
//     chart2.addGraph(graph);


//     var graph = new AmCharts.AmGraph();
//     graph.valueField = "average";
//     graph.balloonText = "[[title]]: <b>[[value]]</b>";
//     graph.fillColors = "#62cf73";
//     graph.type = "column";
//     graph.title = "Average";
//     graph.lineAlpha = 0;
//     graph.fillAlphas = 1;
//     chart2.addGraph(graph);

	// CHART EXPORT
	chart2.export = {
		enabled: true,
	}
    
    // CURSOR
    var chartCursor = new AmCharts.ChartCursor();
    chartCursor.cursorAlpha = 0;
    chartCursor.zoomable = false;
    chartCursor.categoryBalloonEnabled = false;
    chart2.addChartCursor(chartCursor);

    chart2.creditsPosition = "top-right";

    chart2.write(<?php echo $graphName; ?>);
});
</script>

<div id="<?php echo $graphName; ?>" style="width:100%; height:<?php echo (!empty($height))?$height:'400px'; ?>;"></div>
		
<?php

}


function loadbar_iteration ( $graphName, $chatData = array(), $noIterations = array(), $height = array() ){
	$bulletsArray = array( "round", "square", "triangleUp", "triangleDown", "bubble", );
	$bulletsArray[array_rand($bulletsArray)];

	//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	?>

<script type="text/javascript">
var chart2;

var chartData2 = <?php echo $chatData; ?>;

AmCharts.ready(function () {
    // SERIAL CHART
    chart2 = new AmCharts.AmSerialChart();
    chart2.dataProvider = chartData2;
    chart2.categoryField = "label";
    chart2.startDuration = 1;

    // AXES
    // category
    var categoryAxis = chart2.categoryAxis;
    categoryAxis.labelRotation = 45;
    categoryAxis.gridPosition = "start";

    // value
    // in case you don't want to change default settings of value axis,
    // you don't need to create it, as one value axis is created automatically.

    // GRAPH
<?php
// echo count($noIterations);
for ( $j=0; $j<=$noIterations-1; $j++ ) {
// 	$rand = dechex(rand(0x000000, 0xFFFFFF));
// 	$rand = substr(str_shuffle('ABCDEF0123456789abcdef'), 0, 6);
	$rand = array('0', 'A', '1', 'B', '2', 'C', '3', 'D', '4', 'E', '5', 'F', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$color = $rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	
	echo 'var graph = new AmCharts.AmGraph();';
// 	echo '<br/>';
	echo 'graph.valueField = "'. $j .'";';
// 	echo '<br/>';
	echo 'graph.balloonText = "[[title]]: <b>[[value]]</b>";';
// 	echo '<br/>';
	echo 'graph.fillColors = "#'.($color).'";';
// 	echo '<br/>';
	echo 'graph.type = "column";';
// 	echo '<br/>';
	echo 'graph.title = "Iteration-'. ($j+1) .'",';
// 	echo '<br/>';
	echo 'graph.lineAlpha = 0;';
// 	echo '<br/>';
	echo 'graph.fillAlphas = 1;';
// 	echo '<br/>';
	echo 'chart2.addGraph(graph);';	
	//echo '<br>';
// 	$add = $j+1;
// 	$titleArray[] = array("title" => "Iteration-$add", "color" => "#".$color);
}
// array_pop($titleArray);
// $titleEncode = json_encode( $titleArray );

?>

	//LEGEND
	var legend = new AmCharts.AmLegend();
	// legend.data = [{title:"90percentile", color:"#67b7dc"}, {title:"Average", color:"#62cf73"}];
	//legend.data = <?php //echo $titleEncode; ?>;
	legend.position = "bottom";
	legend.valueText = "[[value]]";
	//legend.valueWidth = 100;
	legend.valueAlign = "left";
	legend.equalWidths = false;
	chart2.addLegend(legend);


	// CHART EXPORT
	chart2.export = {
		enabled: true,
	}
    
    // CURSOR
    var chartCursor = new AmCharts.ChartCursor();
    chartCursor.cursorAlpha = 0;
    chartCursor.zoomable = false;
    chartCursor.categoryBalloonEnabled = false;
    chart2.addChartCursor(chartCursor);

    chart2.creditsPosition = "top-right";
    
    chart2.write("<?php echo $graphName; ?>");
    
    
});

</script>

<div id="<?php echo $graphName; ?>" style="width:100%; height:<?php echo (!empty($height))?$height:'400px'; ?>;"></div>
		
<?php

}