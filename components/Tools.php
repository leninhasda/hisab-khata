<?php 
namespace app\components;
 
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class Tools extends Component
{
	public static $Format = 'yyyy-mm-dd';
	
	public static function today($format = '')
	{
		if( empty( $format ) ) {
			$format = 'Y-m-d H:i:s';
		}
		return date($format, time());
	}
}