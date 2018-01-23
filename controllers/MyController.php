<?php
/**
 * Created by PhpStorm.
 * User: duda
 * Date: 1/23/2018
 * Time: 18:44
 */

namespace app\controllers;




class MyController extends AppController
{
    public function actionIndex(){
        $first = 'first string';
        $names = ['Ivan', 'Petr', 'Viktor'];
        return $this->render('index', [
            'first' => $first,
            'names' => $names
        ]);
    }
    public function actionBlogPost(){
        return 'Blog Post';
    }
}