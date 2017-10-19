<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// self::loginCheck(); //TO CHECK USER LOGIN OR NOT
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->model('cart_model');
		$this->load->library('uuid');
		$this->load->library('session');
		$this->load->library('cart');
		
		
	}
	
	public function index(){
		$data['thispage'] = 'i1';
		$data['title']="Welcome To Cart Page";
		
		$data['items_list'] = $this->cart_model->get_items_list();
		loadtemplate('cart/index_dst',$data);
	}

	public function add_cart(){
		
		$selected_items = array();
		$selected_items = $this->uri->rsegment_array();
		unset($selected_items[1]);
		unset($selected_items[2]);
		$items_list = $this->cart_model->get_items_list($selected_items);

		$total_price = $total_weight = 0;
		foreach ($items_list as $ilKey => $ilValue){
			
			$item_name[$ilValue['id']] = $ilValue['it_name'];
			$item_price[$ilValue['id']] = $ilValue['it_price'];
			$item_weight[$ilValue['id']] = $ilValue['it_weight'];
			$total_price += $ilValue['it_price'];
			$total_weight += $ilValue['it_weight'];
			
		}
		asort($item_price);

		$packageCount = package_count( $total_price, $total_weight ); // TOTAL_PRICE, TOTAL_WEIGHT
		$i=1;
		$tprice = $tweight = $total_it_price = $total_it_weight = $total_it_shipping = 0;
		$item_in_cart = array();
		
		foreach ($item_price as $key => $value){
			if($tprice+$value > '250'){
				$i++;
				$tprice = $tweight = 0;
			}
			
			$tprice += $value;
			$tweight += $item_weight[$key];
			
			$item_in_cart[$i][] = [
				'id' => $key,
				'it_name' => $item_name[$key],
				'it_price' => $value,
				'it_weight' => $item_weight[$key],
			];
			
		}
		
		echo '<table class="table">';
			echo '<tr>';
			echo '<th><i class="fa fa-cube"></i> Package Number</th>';
			echo '<th><i class="fa fa-th"> Item Name</th>';
			echo '<th class="text-sm-center"><i class="fa fa-balance-scale"></i> Item Weight</th>';
			echo '<th class="text-sm-center"><i class="fa fa-usd"></i> Item Price</th>';
			echo '<th class="text-sm-center"><i class="fa fa-shopping-basket"></i> Shipping Cost</th>';
			echo '</tr>';
		
		foreach ($item_in_cart as $pack_id => $items_array){
			echo '<tr>';
			echo '<td><span class="btn btn-sm btn-pill btn-info">Package '.$pack_id.'</span></td>';
			$item_name_array = $item_price_array = $item_weight_array = array();
			foreach ($items_array as $iaKey => $iaValue){
				$item_name_array[] = '<span class="btn btn-success">'.$iaValue['it_name'].'</span>';
				$item_price_array[] = $iaValue['it_price'];
				$item_weight_array[] = $iaValue['it_weight'];
			}
			echo '<td>'.implode(' ',$item_name_array).'</td>';
			echo '<td class="text-sm-center"><span class="btn btn-sm btn-pill btn-primary">'.array_sum($item_weight_array).' g</span></td>';
			echo '<td class="text-sm-center"><span class="btn btn-sm btn-pill btn-danger">$ '.array_sum($item_price_array).'</span></td>';
			echo '<td class="text-sm-center"><span class="btn btn-sm btn-pill btn-danger">$ '.shipping_charges(array_sum($item_weight_array)).'</span></td>';
			echo '</tr>';
			$total_it_price += array_sum($item_price_array);
			$total_it_weight += array_sum($item_weight_array);
			$total_it_shipping += shipping_charges(array_sum($item_weight_array));
		}
		echo '<td colspan="2"><strong class="pull-right"> Total Cart </strong></td>';
		echo '<td class="text-sm-center"><strong>'.$total_it_weight.' g</strong></td>';
		echo '<td class="text-sm-center"><strong>$ '.$total_it_price.'</strong></td>';
		echo '<td class="text-sm-center"><strong>$ '.$total_it_shipping.'</strong></td>';
		echo '</tr>';
		echo '</table>';
		
		exit;
		
	}
	
	
	
	
}
