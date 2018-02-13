<?php 
//if(is_file(__DIR_.'/Error.php'))

include_once __DIR__.'/Core/Error.php';
include_once __DIR__.'/Core/MySql.php';
include_once __DIR__.'/Core/Security.php';
include_once __DIR__.'/Core/Format.php';
include_once __DIR__.'/Core/Payme.php';
include_once __DIR__.'/Core/PaymeCallback.php';
class ExePaymeCallback {

	
	static function Construct($db_group){
		define('LANG', 'ru');
		if(isset($_SERVER['PHP_AUTH_USER']))
		{
			date_default_timezone_set('Asia/Tashkent');
			
			define('PHP_AUTH_USER', $_SERVER['PHP_AUTH_USER']);
			define('PHP_AUTH_PW', $_SERVER['PHP_AUTH_PW']);
				
			$PaymeCallback = new PaymeCallback($db_group);
			
			$Sql['PerformTransaction'][] = array(
					'Sql' => 'Update sales_order Set status=:p_state Where increment_id = :p_cms_order_id',
					'Param'=>array(
							':p_state' => 'payme_paid'
					)
			);
			$Sql['PerformTransaction'][] = array(
					'Sql' => 'Update sales_order_grid Set status=:p_state Where increment_id = :p_cms_order_id',
					'Param'=>array(
							':p_state' => 'payme_paid'
					)
			);
			$Sql['PerformTransaction'][] = array(
					'Sql' => 'UPDATE sales_order_status_history AS t
								JOIN sales_order o 
								  On o.entity_id = t.parent_id
								 Set t.status=:p_state
							   Where o.increment_id = :p_cms_order_id',
					'Param'=>array(
							':p_state' => 'payme_paid'
					)
			);
			
			
			$Sql['CancelTransaction'][] = array(
					'Sql' => 'Update sales_order Set status=:p_state Where increment_id = :p_cms_order_id',
					'Param'=>array(
							':p_state' => 'canceled'
					)
			);
			$Sql['CancelTransaction'][] = array(
					'Sql' => 'Update sales_order_grid Set status=:p_state Where increment_id = :p_cms_order_id',
					'Param'=>array(
							':p_state' => 'canceled'
					)
			);
			$Sql['CancelTransaction'][] = array(
					'Sql' => 'UPDATE sales_order_status_history AS t
								JOIN sales_order o 
								  On o.entity_id = t.parent_id
								 Set t.status=:p_state
							   Where o.increment_id = :p_cms_order_id',
					'Param'=>array(
							':p_state' => 'canceled'
					)
			);
										
			$rezult = $PaymeCallback->Execute($Sql);
			exit(json_encode($rezult));
		}
		else
		{
			ExePaymeCallback::Test($db_group);
		}		
	}
	
	static function Test($db_group){
		
		$Payme = new Payme(new MySql($db_group));
		 
		//echo '<pre>';
		//print_r(json_decode($_GET['Json'], true));exit();
		print_r($Payme->Test(json_decode($_GET['Json'], true), true));
	}
}
//print_r($db_group);
if(isset($db_group))
	ExePaymeCallback::Construct($db_group);
?>