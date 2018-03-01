<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 01.03.2018
 * Time: 20:41
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;


class CategoryController extends AppController
{

    public function actionIndex()
    {
        $hits = Product::find()->where( ['hit' => '1'] )->limit(6)->all();

        $data = [
            'hits' => $hits
        ];
        return $this->render('index', $data);
    }

}