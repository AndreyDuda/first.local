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
    public function actionTest()
    {


        return $this->render('test');
    }
}