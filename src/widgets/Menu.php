<?php
declare(strict_types=1);

namespace mastuyink\templates\yii2sneat\widgets;

/*
 * The following example shows how to use Menu:
 *
 * ```php
 * <?= Menu::widget([
 *       'items' => [
 *         [
 *           'label' => 'Dashboard',
 *           'icon' => 'fa fa-home',
 *           'url'   => Yii::$app->homeUrl,
 *         ],
 *         [
 *           'label'  => 'Admin',
 *           'header' => true,
 *         ],
 *         [
 *           'label'  => 'Users',
 *           'icon'   => 'fa fa-users', // Full icon class for font awesome 5
 *           'url'    => ['/'.$moduleId.'/user/index'],
 *           'active' => ($controllerId == 'user')
 *         ],
 *         [
 *           'label' => 'Products',
 *           'icon'  => 'fa-solid fa-clipboard-list',
 *           'url'   => ['product/index'],
 *           'items' => [
 *             ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
 *             ['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
 *           ]
 *         ],
 *       ],
 *     ]); ?>
 * ```
*/
class Menu extends \yii\widgets\Menu
{
  public function init()
  {
    parent::init();
    $this->items           = $this->normalizeItemClass($this->items);
    $this->encodeLabels    = false;
    $this->activateParents = true;
    $this->activeCssClass  = 'active open';
    $this->linkTemplate    = '<a href="{url}" class="menu-link">{label}</a>';
    $this->submenuTemplate = "\n<ul class=\"menu-sub\">\n{items}\n</ul>\n";
    $this->options         = ['class'=>'menu-inner py-1'];
    $this->itemOptions     = [
      'class' => 'menu-item'
    ];
  }

  public function run()
  {
    parent::run();
  }

  protected function normalizeItemClass(array $items):array{
    foreach ($items as $key => $item) {
      if (isset($item['items'])) {
        $items[$key]['template'] = '<a href="{url}" class="menu-link menu-toggle">{label}</a>';
        $items[$key]['items']    = $this->normalizeItemClass($item['items']);
      }
      $label = '';
      if (is_array($item)) {
        if (isset($item['header']) && $item['header']) {
          $label .= '<li class="menu-header small text-uppercase"><span class="menu-header-text">'.$items[$key]['label'].'</span></li>';
        }else{
          if (isset($item['icon'])) {
            $label .= '<i class="menu-icon tf-icons '.(string)$item['icon'].'"></i>';
          }
          $label .= '<div>'.$item['label'].'</div>';
        }
        $items[$key]['label'] = $label;
      }else{
        unset($items[$key]);
      }
    }
    return $items;
  }
}