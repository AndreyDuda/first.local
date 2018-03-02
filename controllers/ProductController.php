<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 02.03.2018
 * Time: 22:56
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;


class ProductController extends AppController
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
    }

}