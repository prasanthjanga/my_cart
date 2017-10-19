<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( $thispage == "l1" ) {
	require('login_view.php');
} elseif ( $thispage == "i1" ) {
	require('dashboard_view.php');
} elseif ( $thispage == "ddv1" ) {
	require('dst_dashboard_view.php');
} elseif ( $thispage == "4" ){
	require 'sample.php';
} else{
	require('login_view1.php');
}

?>