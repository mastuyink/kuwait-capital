<?php
declare(strict_types=1);

namespace mastuyink\templates\yii2sneat\widgets;


/*
 * The following example shows how to use Menu:
 *
 * ```php
 * <?= Tabs::pills([
 *   'items' => [
 *     [
 *         'label'   => 'One',
 *         'content' => 'Anim pariatur cliche...',
 *         'active'  => true
 *     ],
 *     [
 *         'label'   => 'Two',
 *         'content' => 'Content Number Two',
 *     ],
 *   ],
 * ])?>
 * 
 * <?= Tabs::tabs([
 *   'items' => [
 *     [
 *         'label'   => 'One',
 *         'content' => 'Anim pariatur cliche...',
 *         'active'  => true
 *     ],
 *     [
 *         'label'   => 'Two',
 *         'content' => 'Content Number Two',
 *     ],
 *   ],
 * ])?>
 * ```
*/
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
    $itemsAndOptions['navType'] = 'nav-pills '.(!empty($itemsAndOptions['navFill']) ? 'nav-fill' : NULL);
    unset($itemsAndOptions['navFill']);
    return self::widget($itemsAndOptions);
  }
  public static function tabs(array $itemsAndOptions):string{
    $itemsAndOptions['navType'] = 'nav-tabs '.(!empty($itemsAndOptions['navFill']) ? 'nav-fill' : NULL);
    unset($itemsAndOptions['navFill']);
    return self::widget($itemsAndOptions);
  }
}
