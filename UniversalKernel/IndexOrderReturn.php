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

class IndexInsertOrder {

	private $BD = null;
	static function Construct($db_group){
		date_default_timezone_set('Asia/Tashkent');
			//print_r($db_group);
		$Payme = new Payme(new MySql($db_group));
		$return = $Payme->OrderReturn();
		return $return;
	}

}

//print_r($db_group);
if(isset($db_group))
	return IndexInsertOrder::Construct($db_group);
?>