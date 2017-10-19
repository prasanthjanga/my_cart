<?php defined('BASEPATH') OR exit('No direct script access allowed');

function common($value)
{
    $time=date("d M g:s a",strtotime($value));
    return $time;
}


//Template folder path
function template_path($uri = '') {
	return site_url('html/templates/v1/') . $uri;
}

function loadtemplate($content, $args = array()){
	$ci=& get_instance();
	
	$ci->load->view('cart/_sitelayout/header',$args);
	$ci->load->view('cart/_sitelayout/header_top',$args);
// 	$ci->load->view('cart/_sitelayout/left_menu',$args);
	$ci->load->view($content, $args);
	$ci->load->view('cart/_sitelayout/footer_top',$args);
	$ci->load->view('cart/_sitelayout/footer',$args);
}


// 0 to 200g		$5
// 200g to 500g		$10
// 500g to 1000g	$15
// 1000g to 5000g 	$20


function shipping_charges( $weight ) {
	if($weight >= '0' && $weight <= '200'){
		return 5;
	}else if($weight > '200' && $weight <= '500'){
		return 10;
	}else if($weight > '500' && $weight <= '1000'){
		return 15;
	}else if($weight > '1000' && $weight <= '5000'){
		return 20;
	}
}

function package_count($price, $weight){
	$count_price = ceil($price / 250);
	$count_weight = ceil($weight / 5000);
	return max(array($count_price, $count_weight));
}

