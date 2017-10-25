<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'css/sweetalert.css',
    ];
    public $js = [
        'js/sweetalert.min.js',
        'js/adminlte.min.js',
        'js/adminlte.js',
       // 'js/dynamicsform.js'
    ];
    public $depends = [
            'yii\web\YiiAsset',
             'yii\web\JqueryAsset',
            'yii\bootstrap\BootstrapAsset',
            'yii\bootstrap\BootstrapPluginAsset'
    ];
}
