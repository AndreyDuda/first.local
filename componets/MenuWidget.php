<?php

namespace app\componets;

use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();

        if( $this->tpl === NULL ){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $menu = Yii::$app->cache->get('menu');
        if($menu){
            return $menu;
        }
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        Yii::$app->cache->set('menu', $this->menuHtml, 60*60*24);

        return $this->menuHtml;
    }

    public function getTree()
    {
        $tree = [];
        foreach ( $this->data as $id=>&$node ){
            if( !$node['parent_id'] ){
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }

        return $tree;
    }

    public function getMenuHtml($tree)
    {
        $str = '';

        foreach ($tree as $category){
            $str .= $this->catToTemplate($category);
        }

        return $str;
    }

    public function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;

        return ob_get_clean();
    }
}