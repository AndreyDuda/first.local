<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 06.03.2018
 * Time: 19:37
 */

namespace app\controllers;

use app\models\Product;
use app\models\Cart;
use Yii;

class CartController extends AppController
{

    public function actionAdd()
    {
        $id      = Yii::$app->request->get('id');
        $product = Product::findOne($id);

        if( empty($product) ){
            return FALSE;
        }
        $session = Yii::$app->session;
        $session->open();

        $cart    = new Cart();
        $cart->addToCart($product);

    }
}