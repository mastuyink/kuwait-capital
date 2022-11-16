<?php
namespace mastuyink\templates\yii2sneat;

use Yii;
use yii\web\AssetBundle;

class TemplateAsset extends AssetBundle
{
    public $sourcePath = '@vendor/mastuyink/yii2-sneat/sneat-assets/assets';
    public $css = [
      'https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap',
      'vendor/fonts/boxicons.css',
      'vendor/css/core.css',
      'vendor/css/theme-default.css',
      'css/demo.css',
      'vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
      'vendor/css/pages/page-auth.css',
      'vendor/fontawesome/css/all.min.css',
    ];
    public $js = [
      'vendor/libs/popper/popper.js',
      'vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
      'vendor/js/menu.js',
      'js/main.js',
      'js/buttons.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];

    public $linkAssets = true;
    public function registerAssetFiles($view)
    {
      $manager = $view->getAssetManager();
      $view->registerJsFile($manager->getAssetUrl($this, $file, ArrayHelper::getValue($options, 'appendTimestamp')), $options);
    }
}
