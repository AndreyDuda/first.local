<?php
/**
 * Created by PhpStorm.
 * User: duda
 * Date: 1/23/2018
 * Time: 19:26
 */

namespace app\controllers;

use yii\web\Controller;

class PostController extends Controller
{
   /* public $layout = 'basic';*/

    public function actionIndex()
    {
        return $this->render('test');
    }
    public function actionShow()
    {
        $this->layout = 'basic';
        return $this->render('show');
    }
}