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
class AppAssetClassicTopBar extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/webAssets/templates/classic/topbar/assets/';
    public $css = [
        '../../../../css/site-admin.css.map',
        '../../../../css/site-admin.css',
        'css/site.min.css'
    ];
    public $js = [
        'js/Section/Menubar.min.js',
        'js/Section/Sidebar.min.js',
        'js/Section/PageAside.min.js',
        'js/Plugin/menu.min.js',
        'js/config/tour.min.js',
        "../../global/js/Plugin/responsive-tabs.js",
        "../../global/js/Plugin/closeable-tabs.js",
        "../../global/js/Plugin/tabs.js",
        '../../global/js/ConfigInit.js',
        '../../global/js/Plugin/bootstrap-sweetalert.min.js',
        'js/Site.min.js',
    ];
    public $depends = [
        'app\assets\AppAssetClassicCore',
    ];
    
}
