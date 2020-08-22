<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/animate.min.css',
      'css/paper-dashboard.css',
      'http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
      'https://fonts.googleapis.com/css?family=Muli:400,300',
      'css/themify-icons.css',
      // 'css/site.css',
    ];
    public $js = [
      'js/bootstrap-checkbox-radio.js',
      'js/bootstrap-notify.js',
      'js/chartist.min.js',
      // 'js/paper-dashboard.js',
      // 'js/demo.js'
      // 'js/app.js'
    ];
    public $depends = [
        'yii\jui\JuiAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
