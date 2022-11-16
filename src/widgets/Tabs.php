<?php
declare(strict_types=1);

namespace mastuyink\templates\yii2sneat\widgets;

class Tabs extends \yii\bootstrap5\Tabs
{

  public function init()
  {
    if($this->navType == 'nav-pills'){
      $this->options['class'] = 'mb-3';
    }
    parent::init();
  }

  public function run():string
  {
    $tabs = '<div class="nav-align-top mb-4">';
    $tabs .= parent::run();
    $tabs .= '</div>';
    return $tabs;
  }

  public static function pills(array $itemsAndOptions):string{
    $itemsAndOptions['navType'] = 'nav-pills';
    return self::widget($itemsAndOptions);
  }
  public static function tabs(array $itemsAndOptions):string{
    $itemsAndOptions['navType'] = 'nav-tabs';
    return self::widget($itemsAndOptions);
  }
}