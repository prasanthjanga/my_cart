<?php defined('BASEPATH') OR exit('No direct script access allowed');


//Graph Template folder path
function calender_js() {
	echo '<script src="'.template_path().'js/libs/moment.min.js"></script>'."\n";
	echo '<script src="'.template_path().'js/libs/fullcalendar.min.js"></script>'."\n";
	echo '<script src="'.template_path().'js/libs/gcal.min.js"></script>'."\n";

}
function randomColor(){
	//START TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
	$color = array(
			'#FF9999',
			'#F76EB3',
			'#19E5E6',
			'#FF9933',
			'#FFAA00',
			'#00D4FF',
			'#EEC900',
			'#CCCC00',
			'#B2CC33',
			'#00FF80',
			'#33FFBB',
			'#FF7F66',
			'#00FFD5',
			'#FF7733',
			'#00AAFF',
			'#3399FF',
			'#9999FF',
			'#BD9EFA',
			'#F5A3F5',
			'#FFD500',
			'#EB4763',
	);
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$lineColor = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	//END TO GENERATE RANDOM COLORS FOR EACH EVERY LINE
// 	return $lineColor; 
	return $color[rand(0,20)]; 
}

function calenderData( $calenderDataArray = array() ){
?>
	<script>
	$(function(){

	    $('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,basicWeek,basicDay'
				},
// 				defaultDate: '2017-01-12',
				defaultDate: '<?php echo date('Y-m-d'); ?>',
				defaultView: 'basicWeek',
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: <?php echo $calenderDataArray; ?>
// 				events: [{title:"XKL0556",start:"2017-4-01",end:"2017-4-01",color:"#FFAA00",textColor:"black"},{title:"XKL05156",start:"2017-4-02",end:"2017-4-02",color:"#FFAA00",textColor:"black"}]
			});
	});

	</script>
<?php 
}

function bgColor($flag = '') { // TO RETURN APPROVE STATUS FLAG IN DETAIL
	$flagArray =array();//X-Applied, A-Approved, R-Rejected
	$flagArray = array(
			'A' => '#ff4500',
			'V' => '#00bf8f',
	);
	return $flagArray[$flag];
}
