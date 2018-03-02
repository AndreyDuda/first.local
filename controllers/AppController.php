<?php
/**
 * Created by PhpStorm.
 * User: duda
 * Date: 1/23/2018
 * Time: 19:25
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag([
            'name'    => 'keywords',
            'content' => ($keywords)? $keywords:'keywords'
        ]);
        $this->view->registerMetaTag([
            'name'    => 'description',
            'content' => ($description)? $description:'description'
        ]);
    }

}

