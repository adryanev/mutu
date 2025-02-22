<?php


namespace common\widgets;


use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class Menu extends \yii\widgets\Menu
{

    public $linkTemplate = '<a href="{url}">{icon} {label}</a>';
    public $submenuTemplate = "\n <div class='collapse ' id='{id}'><ul class='nav '>\n{items}\n</ul>\n</div>";
    public $activateParents = true;
    public $options = ['class' => 'nav'];
    private $dropdownIcon = '<b class="caret"></b>';
    public $labelTemplate = '<p>{label} {caret}</p>';
    public $labelWithoutIconTemplate = '<span class="sidebar-normal">{label}</span>';



    private $noDefaultAction;
    private $noDefaultRoute;
    /**
     * Renders the menu.
     */
    public function run()
    {
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = Yii::$app->request->getQueryParams();
        }
        $posDefaultAction = strpos($this->route, Yii::$app->controller->defaultAction);
        if ($posDefaultAction) {
            $this->noDefaultAction = rtrim(substr($this->route, 0, $posDefaultAction), '/');
        } else {
            $this->noDefaultAction = false;
        }
        $posDefaultRoute = strpos($this->route, Yii::$app->controller->module->defaultRoute);
        if ($posDefaultRoute) {
            $this->noDefaultRoute = rtrim(substr($this->route, 0, $posDefaultRoute), '/');
        } else {
            $this->noDefaultRoute = false;
        }
        $items = $this->normalizeItems($this->items, $hasActiveChild);
        if (!empty($items)) {
            $options = $this->options;
            $tag = ArrayHelper::remove($options, 'tag', 'ul');
            echo Html::tag($tag, $this->renderItems($items), $options);
        }
    }

    protected function renderItem($item)
    {

            if (isset($item['items'])) {
                $labelTemplate = '<a href="{url}" data-toggle="collapse">{label}</a>';
                $linkTemplate = '<a href="{url}" data-toggle="collapse">{icon} {label}</a>';

            } else {
                $labelTemplate = $this->labelTemplate;
                $linkTemplate = $this->linkTemplate;

            }
            $replacements = [];

            if(!empty($item['icon'])){
                $replacements = [
                    '{label}' => strtr($this->labelTemplate, ['{label}' => $item['label'],'{caret}'=> isset($item['items'])? $this->dropdownIcon : '',]),
                    '{icon}' => isset($item['icon'])? '<i class="material-icons-round">' . $item['icon'] . '</i> ': '<span class="sidebar-mini">'.preg_match_all("/[A-Z]/", ucwords(strtolower($item['label'])), $matches).'</span>',
                    '{url}' => isset($item['url']) ? Url::to($item['url']) : 'javascript:void(0);',

                ];
            }
            else{

                $labelTemplate = $this->labelWithoutIconTemplate;
                $expr = '/(?<=\s|^)[a-z]/i';
                preg_match_all($expr, $item['label'], $matches);
                $replacements = [
                    '{label}' => strtr($this->labelWithoutIconTemplate, ['{label}' => $item['label'],]),
                    '{icon}' => '<span class="sidebar-mini">'.implode('',$matches[0]).'</span>',
                    '{url}' => isset($item['url']) ? Url::to($item['url']) : 'javascript:void(0);',

                ];
            }



            $template = ArrayHelper::getValue($item, 'template', isset($item['url']) ? $linkTemplate : $labelTemplate);



        return strtr($template, $replacements);
    }


    protected function renderItems($items)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }
            if (!empty($class)) {
                if (empty($options['class'])) {
                    $options['class'] = implode(' ', $class);
                } else {
                    $options['class'] .= ' ' . implode(' ', $class);
                }
            }else{
                $options['class'] = '';
            }


            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $menu .= strtr($this->submenuTemplate, [


                    '{id}'=> str_replace('#','',$item['url']),
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }
        return implode("\n", $lines);
    }
    protected function normalizeItems($items, &$active)
    {
        foreach ($items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }
            if (!isset($item['label'])) {
                $item['label'] = '';
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $items[$i]['label'] = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $items[$i]['icon'] = isset($item['icon']) ? $item['icon'] : '';
            $hasActiveChild = false;
            if (isset($item['items'])) {
                $items[$i]['items'] = $this->normalizeItems($item['items'], $hasActiveChild);
                if (empty($items[$i]['items']) && $this->hideEmptyItems) {
                    unset($items[$i]['items']);
                    if (!isset($item['url'])) {
                        unset($items[$i]);
                        continue;
                    }
                }
            }
            if (!isset($item['active'])) {
                if (($this->activateParents && $hasActiveChild) || ($this->activateItems && $this->isItemActive($item))) {
                    $active = $items[$i]['active'] = true;
                } else {
                    $items[$i]['active'] = false;
                }
            } elseif ($item['active']) {
                $active = true;
            }
        }
        return array_values($items);
    }

    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            $arrayRoute = explode('/', ltrim($route, '/'));
            $arrayThisRoute = explode('/', $this->route);
            if ($arrayRoute[0] !== $arrayThisRoute[0]) {
                return false;
            }
            if (isset($arrayRoute[1]) && $arrayRoute[1] !== $arrayThisRoute[1]) {
                return false;
            }
            if (isset($arrayRoute[2]) && $arrayRoute[2] !== $arrayThisRoute[2]) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }
}