
<?php //print_r($title);
// echo "<pre>";
// print_r($dashboard_count);


// print_r($lab_details);
// exit;

?>
<!-- Main content -->
<div class="main">
<div class="container-fluid"><br>

<div class="row">
	<div class="col-sm-6 col-lg-4">
	<a data-toggle="collapse" href="#ALLTEST" aria-expanded="false" aria-controls="ALLTEST" style="color:#fff">
		<div class="card card-inverse card-info">
			<div class="card-block p-b-0">
                <h4 class="m-b-0 text-xs-center">Total DST Initiations</h4>
                <br>
                <p class="text-xs-center">1<?php //echo ($dashboard_count)?$dashboard_count[0]['iot_count']:'0'; ?></p>
			</div>
		</div>
	</a>
	</div><!--/col-->
	<div class="col-sm-6 col-lg-4">
	<a data-toggle="collapse" href="#PASS" aria-expanded="false" aria-controls="PASS" style="color:#fff">
    	<div class="card card-inverse card-success">
			<div class="card-block p-b-0">
				<h4 class="m-b-0 text-xs-center">DST Test Passed</h4>
				<br>
				<?php //$passPercent = round((count($passArray)/count($onDemandArray))*100); ?>
                <p class="text-xs-center"><?php //echo $passPercent; ?> %</p>
			</div>
		</div>
	</a>
	</div><!--/col-->
	<div class="col-sm-6 col-lg-4">
	<a data-toggle="collapse" href="#FAIL" aria-expanded="false" aria-controls="FAIL" style="color:#fff">
    	<div class="card card-inverse card-danger">
			<div class="card-block p-b-0">
				<h4 class="m-b-0 text-xs-center">DST Test Failed</h4>
				<br>
				<?php //$failPercent = round((count($failArray)/count($onDemandArray))*100); ?>
                <p class="text-xs-center"><?php //echo $failPercent; ?> %</p>
			</div>
		</div>
	</a>
	</div><!--/col-->
</div><!--/row-->
	
<div class="card card-default" style="border:0px;">
	<div class="card-block collapse" id="ALLTEST">
		<div class="card-title">
		<h4 class="text-info col-xs-11">List Of All Total Tests Initiations Form Last 30 Days
		<span class="tag tag-pill tag-info">Daily DST : <?php //echo count($onDemandArray).' / '.count($onDemandUniqueArray); ?></span>
		</h4>
		<h4><a class="btn-minimize collapsed pull-right" data-toggle="collapse" href="#ALLTEST" aria-expanded="false" aria-controls="UNIQUE">
			<i class="icon-close"></i>
		</a></h4>
		</div>
		<table class="table table-bordered table-striped table-condensed">
		  <thead>
		    <tr>
		      <th>Sno</th>
		      <th>Test Id</th>
		      <th>Status</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$i = 1;
// 		  	foreach( $onDemandArray as $odaKey => $odaValue ){
// 				echo '<tr>'; 
// 				echo '<td width="1%">'.$i.'</td>'; 
// 				echo '<td width="15%">'.$odaValue['test_id'].'</td>'; 
// 				echo '<td width="15%">'.$odaValue['school_code'].'</td>'; 
// 				echo '<td width="15%">'.$odaValue['school_name'].'</td>';
// 				echo '<td width="5%">'.flagStatus($odaValue['flag']).'</td>';
// 				echo '</tr>';
// 				$i++;
// 		  	}
		  ?>
		  </tbody>
		</table>
	</div>
</div>

<div class="card card-default" style="border:0px;">
	<div class="card-block collapse" id="PASS">
		<div class="card-title">
		<h4 class="text-success col-xs-11">List Of All DST Test Passed Form Last 30 Days
		<span class="tag tag-pill tag-success">Daily DST : <?php //echo $passPercent; ?> %</span>
		</h4>
		<h4><a class="btn-minimize collapsed pull-right" data-toggle="collapse" href="#PASS" aria-expanded="false" aria-controls="UNIQUE">
			<i class="icon-close"></i>
		</a></h4>
		</div>
		<table class="table table-bordered table-striped table-condensed">
		  <thead>
		    <tr>
		      <th>Sno</th>
		      <th>Test Id</th>
		      <th>Status</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$i = 1;
// 		  	foreach( $passArray as $paKey => $paValue ){
// 				echo '<tr>'; 
// 				echo '<td width="1%">'.$i.'</td>'; 
// 				echo '<td width="15%">'.$paValue['test_id'].'</td>'; 
// 				echo '<td width="15%">'.$paValue['school_code'].'</td>'; 
// 				echo '<td width="15%">'.$paValue['school_name'].'</td>';
// 				echo '<td width="5%">'.flagStatus($paValue['flag']).'</td>';
// 				echo '</tr>';
// 				$i++;
// 		  	}
		  ?>
		  </tbody>
		</table>
	</div>
</div>

<div class="card card-default" style="border:0px;">
	<div class="card-block collapse" id="FAIL">
		<div class="card-title">
		<h4 class="text-danger col-xs-11">List Of All DST Test Failed Form Last 30 Days
		<span class="tag tag-pill tag-danger">Daily DST : <?php //echo $failPercent; ?> %</span>
		</h4>
		<h4><a class="btn-minimize collapsed pull-right" data-toggle="collapse" href="#FAIL" aria-expanded="false" aria-controls="UNIQUE">
			<i class="icon-close"></i>
		</a></h4>
		</div>
		<table class="table table-bordered table-striped table-condensed">
		  <thead>
		    <tr>
		      <th>Sno</th>
		      <th>Test Id</th>
		      <th>Status</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php 
// 		  	$i = 1;
// 		  	foreach( $failArray as $faKey => $faValue ){
// 				echo '<tr>'; 
// 				echo '<td width="1%">'.$i.'</td>'; 
// 				echo '<td width="15%">'.$faValue['test_id'].'</td>'; 
// 				echo '<td width="15%">'.$faValue['school_code'].'</td>'; 
// 				echo '<td width="15%">'.$faValue['school_name'].'</td>';
// 				echo '<td width="5%">'.flagStatus($faValue['flag']).'</td>';
// 				echo '</tr>';
// 				$i++;
// 		  	}
		  ?>
		  </tbody>
		</table>
	</div>
</div>

	<div class="card">
		<div class="card-header">
			<h4 class="text-primary">
				<i class="fa fa-bar-chart"></i> DST Test Graph For Last 30 Days
			</h4>
			<div class="card-actions"></div>
		</div>
		<div class="card-block">
		<?php 
		/*
// 		echo '<pre>';
// 		print_r($dailyArray);
		$dgdKey = $dgdValue = $graphDataArray = $bcYAxis = $yAxisArray = $xAxisArray = array();

// 		print_r($dashboard_graph_data);
		foreach($dashboard_graph_data as $dgdKey => $dgdValue ){
// 			$graphData[date('d-m-Y',strtotime($dgdValue['created_date']))][$dgdValue['flag']] = '100';
			$graphData[$dgdValue['school_code'].' - '.date('d-m-Y',strtotime($dgdValue['created_date']))][$dgdValue['flag']] = '1';
			$yAxisArray[] = $dgdValue['flag'];
		}
		if($graphData){
			foreach ($graphData as $gdKey => $gdValue){
				$dateArray = array("month"=> $gdKey);
				$graphDataArray[] = array_merge($dateArray, $gdValue);
			}
		}
// 		print_r($graphDataArray);
		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		$graphDataArray = json_encode ( $graphDataArray);
		
		$xAxisArray = array('x'=>'month');
// 		$yAxisArray = array('C','F');
		$axisY = array_unique($yAxisArray);
		foreach( $axisY as $ayKey => $ayValue ){ // 
// 				echo $ayValue;
			//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
// 			$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
			//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
			if($ayValue == 'Success'){
				$lineColor = "#3b9d5e";
			}elseif($ayValue == 'Fail'){
				$lineColor = "#f86c6b";
			}
			$bcYAxis[] = array(
					"balloonText" 	=>	"$ayValue",
					"fillAlphas"	=>	0.8,
					"lineAlpha"		=>	0.2,
					"type"			=>	"column",
					"lineColor"		=>	"$lineColor", //TO ADD KPI LINE COLOR DARK
					"valueField"	=>	"$ayValue",
					"title" 		=>	"$ayValue",
			);
		}
		$bcYAxis = json_encode ( $bcYAxis);
		bargraph_js();
		loadbar('chart2bar', $graphDataArray, $xAxisArray, $bcYAxis );
		*/
		?>
		
		
		</div><!-- /.card-block -->
	</div><!-- /.card end -->
	
	
	
	
	</div>
</div><!-- /.conainer-fluid -->
