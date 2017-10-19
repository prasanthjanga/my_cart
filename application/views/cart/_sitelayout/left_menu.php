<div class="sidebar">
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a href="<?php echo base_url(); ?>index.php/dst/profile" class="btn btn-link">
        <i class="fa fa-user"></i> Profile
    </a>
	<a href="<?php echo base_url(); ?>index.php/dst/logout" class="btn btn-link" >
    	<i class="fa fa-lock"></i> Logout
    </a>
</div>
    <nav class="sidebar-nav">
        <ul class="nav">
        <li class="nav-title">
                Dashboard
        </li>
<?php 
// echo '<pre>';
$leftMenu = dashboard_menu();
// $selectMenu = array('i1','p1');

foreach ( $leftMenu as $mainTitle => $subArray ) {
	// echo $mainTitle;
// 	echo $subArray['url'];
	echo '<li class="nav-item nav-dropdown">';
	//echo '<a class="nav-link nav-dropdown-toggle" href="'. $subArray['url'] .'"><i class="fa fa-'. $subArray['icon'] .'"></i> '. $mainTitle .'</a>';
	// echo '<a class="nav-link nav-dropdown-toggle" href="'. ($subArray["url"]!="#")?$subArray["url"] : "#".'"><i class="fa fa-'. $subArray['icon'] .'"></i> '. $mainTitle .'</a>';
if($subArray["url"]!="#"){
	echo '<a class="nav-link nav-dropdown-toggle" href="'.base_url().'index.php/'. $subArray['url'].'"><i class="fa fa-'. $subArray['icon'] .'"></i> '. $mainTitle .'</a>';
} else {
	echo '<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-'. $subArray['icon'] .'"></i> '. $mainTitle .'</a>';

	echo '<ul class="nav-dropdown-items">';
	foreach ( $subArray as $subTitle => $subUrl ) {
		//echo $subTitle;
		if( $subTitle != 'url' && $subTitle != 'icon' ){
// 			echo $subTitle;
			//echo $subUrl;
			echo '<li class="nav-item">';
			echo '<a class="nav-link" href="'.base_url().'index.php/'.  $subUrl['url'] .'"><i class="fa fa-'. $subUrl['icon'] .'"></i> '. $subTitle .'</a>';
			echo '</li>';
		}
	}
	echo '</ul>';
}//ELSE END
	echo '</li>';
}
?>

        </ul>
    </nav>
</div>
