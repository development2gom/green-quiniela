<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetTerminosCondiciones extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/webAssets/';
    public $css = [
        'plugins/ladda/ladda.css',
        'css/site-terminos.css.map',
        'css/site-terminos.css'
    ];
    public $js = [
        'plugins/ladda/spin.min.js',
        'plugins/ladda/ladda.min.js',
        'js/geeks.js'

    ];
    public $depends = [
        'app\assets\AppAssetClassicTopBar',
    ];
}
