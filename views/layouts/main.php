<?php

/** @var yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use mastuyink\templates\yii2sneat\TemplateAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

TemplateAsset::register($this);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
$baseAssetUrl = Yii::$app->assetManager->getPublishedUrl('@vendor/mastuyink/yii2-sneat/sneat-assets/assets');
$lang = strtolower(Yii::$app->language);
$dir = $lang == 'ar' ? 'rtl' : 'ltr';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>"
  class="light-style layout-menu-fixed"
  dir="<?= $dir ?>"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
  >
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="">
<?php $this->beginBody() ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?= $this->render('sidebar') ?>
        <div class="layout-page">
          <?= $this->render('navbar',[
            'baseAssetUrl' => $baseAssetUrl
          ]) ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between">
                <h1 class="fs-4"><?= $this->title; ?></h1>
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                  <div class="">
                    <?= Breadcrumbs::widget([
                      'links'   => $this->params['breadcrumbs'],
                      'options' => [
                        'class' => 'breadcrumb-style1'
                      ]
                    ]) ?>
                  </div>
                <?php endif ?>
              </div>
              <?= Alert::widget() ?>
              <?= $content ?>
              <?= $this->render('footer') ?>
              <?= $this->render('modal') ?>
            </div>
          </div>
        </div>
      </div>
  </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
