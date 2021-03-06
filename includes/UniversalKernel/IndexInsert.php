<?php 
/**
 * @category    KiT
 * @package     KiT_Payme
 * @author      Игамбердиев Бахтиёр Хабибулаевич
 * @license      http://skill.uz/license-agreement.txt
 */

//namespace  KiT\Payme\UniversalKernel;
if(!defined('TABLE_PREFIX')) define('TABLE_PREFIX', '');
include_once __DIR__.'/Core/Error.php';
include_once __DIR__.'/Core/MySql.php';
include_once __DIR__.'/Core/MySqli.php';
include_once __DIR__.'/Core/Security.php';
include_once __DIR__.'/Core/Format.php';
include_once __DIR__.'/Core/Payme.php';
include_once __DIR__.'/Core/PaymeCallback.php';

class IndexInsert {

	private $BD = null;
	static function Construct($db_group, $Sql){
		date_default_timezone_set('Asia/Tashkent');
			//print_r($db_group);
		$DbConnect = false;
		if (extension_loaded('mysqli') and !$DbConnect){$DbConnect=true; $Db = new DbMySqli($db_group);}	
		if (extension_loaded('pdo') and !$DbConnect or !$Db ){$DbConnect=true; $Db = new MySql($db_group); }
		if (extension_loaded('mysql') and !$DbConnect or !$Db ){$DbConnect=true; $Db = new MySql($db_group);}
		$Payme = new Payme($Db);
		$return = $Payme->Insert($Sql);
		return $return;
	}

}

//print_r($db_group);
if(isset($db_group))
	return IndexInsert::Construct($db_group, $Sql);
?>