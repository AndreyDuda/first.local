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
        $id      = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if( !empty($product) ){
            throw new HttpException(404, 'Такого товара нет');
        }
        $hits    = Product::find()->where( ['hit' => '1'] )->limit(6)->all();

        $data = [
            'product' => $product,
            'hits'    => $hits
        ];

        $this->setMeta('STORE | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', $data);
    }

}