<!-- <pre> -->
<?php
// print_r($items_list);
// exit;
?>
<!-- Main content -->
<div class="main">
<div class="container-fluid"><br>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4 class="text-primary"><i class="fa fa-list"></i> Items List</h4>
			<div class="card-actions"></div>
		</div>
		<div class="card-block">
		<form action="<?php echo base_url('index.php/cart/index'); ?>" >
		<table class="table table-striped table-bordered">
		<thead>
		<tr>
<!-- 			<th><i class="fa fa-hashtag"></i></th> -->
			<th width="2%"><i class="fa fa-check-square-o"></i></th>
			<th><i class="fa fa-th"></i> Item Name</th>
			<th><i class="fa fa-usd"></i> Item Price</th>
			<th><i class="fa fa-balance-scale"></i> Item Weight (g)</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		if (empty($items_list)){
			$items_list = array();
		}
		$i=1;
		foreach ($items_list as $ilKey => $ilValue){
			echo '<tr>';
// 			echo '<td>'.$i.'</td>';
			echo '<td><input type="checkbox" name="item_selected" value="'.$ilValue['id'].'"></td>';
			echo '<td>'.$ilValue['it_name'].'</td>';
			echo '<td>$ '.$ilValue['it_price'].'</td>';
			echo '<td>'.$ilValue['it_weight'].' g</td>';
			echo '</tr>';
			$i++;
		}
		?>
		</tbody>
		</table>
		<a class="btn btn-success" onClick="placeOrder()">Place Order</a>
		<p id="demo"></p>
		</form>
		
		</div><!-- /.card-block -->
	</div><!-- /.card end -->
	<div class="card">
		<div class="card-header">
			<h4 class="text-primary"><i class="fa fa-cart-plus"></i> My Cart</h4>
			<div class="card-actions"></div>
		</div>
		<div class="card-block" id="add_to_cart">
		
		
		</div><!-- /.card-block -->
	</div><!-- /.card end -->

</div><!--/row-->
	
	
	</div>
</div><!-- /.conainer-fluid -->

<script type="text/javascript">
//START TO 
function placeOrder() {
    var coffee = document.forms[0];
    var txt = "";
    var i;
    for (i = 0; i < coffee.length; i++) {
        if (coffee[i].checked) {
            txt = txt + coffee[i].value + "/";
        }
    }
//     alert(txt);exit;
		$('#add_to_cart').load( '<?php echo base_url(); ?>index.php/cart/add_cart/' + txt );
}
// END TO 

</script>