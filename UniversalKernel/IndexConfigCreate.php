<?php 
/**
 * @category    KiT
 * @package     KiT_Payme
 * @author      Игамбердиев Бахтиёр Хабибулаевич
 * @license      http://skill.uz/license-agreement.txt
 */
//namespace  KiT\Payme\UniversalKernel;
include_once __DIR__.'/Core/Error.php';
include_once __DIR__.'/Core/MySql.php';
include_once __DIR__.'/Core/Security.php';
include_once __DIR__.'/Core/Format.php';
include_once __DIR__.'/Core/Payme.php';
include_once __DIR__.'/Core/PaymeCallback.php';

class ConfigCreate {

	private $BD = null;
	static function Construct($db_group){
		date_default_timezone_set('Asia/Tashkent');
			//print_r($db_group);	
		$Payme = new Payme(new MySql($db_group));

		$Get = array(
				'merchant_id' 		=> $_REQUEST['groups']['payme']['fields']['merchant_id']['value'],
				'merchant_key_test' => $_REQUEST['groups']['payme']['fields']['merchant_key_test']['value'],
				'merchant_key' 		=> $_REQUEST['groups']['payme']['fields']['merchant_key']['value'],
				'checkout_url' 		=> $_REQUEST['groups']['payme']['fields']['checkout_url']['value'],
				'endpoint_url' 		=> $_REQUEST['groups']['payme']['fields']['endpoint_url']['value'],
				'status_test' 		=> $_REQUEST['groups']['payme']['fields']['status_test']['value'],
				'status_tovar' 		=> $_REQUEST['groups']['payme']['fields']['status_tovar']['value'],
				'callback_pay' 		=> $_REQUEST['groups']['payme']['fields']['callback_pay']['value'],
				'redirect' 			=> $_REQUEST['groups']['payme']['fields']['redirect']['value']
		);
		
		$Payme->PaymeConfig($Get);
	}

}
//print_r($db_group);
if(isset($db_group))
	ConfigCreate::Construct($db_group);
?>