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
use app\models\Order;
use app\models\OrderItems;

class CartController extends AppController
{

    public function actionAdd()
    {
        $this->layout = FALSE;
        $id           = Yii::$app->request->get('id');
        $qty          = (int)Yii::$app->request->get('qty');
        $qty          = ( !$qty )? 1 : $qty;
        $product      = Product::findOne($id);

        if( empty($product) ){
            return FALSE;
        }
        $session = Yii::$app->session;
        $session->open();

        $cart    = new Cart();
        $cart->addToCart($product, $qty);

        $data    = [
            'session' => $session
        ];
        return $this->render('cart-modal', $data);
    }

    public function actionClear()
    {
        $this->layout = FALSE;
        $session      = Yii::$app->session;

        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $data    = [
            'session' => $session
        ];
        return $this->render('cart-modal', $data);
    }

    public function actionDelItem()
    {
        $this->layout = FALSE;
        $id           = Yii::$app->request->get('id');
        $session      = Yii::$app->session;
        $session->open();
        $cart         = new Cart();
        $cart->recalc($id);

        $data    = [
            'session' => $session
        ];
        return $this->render('cart-modal', $data);
    }

    public function actionShow()
    {
        $this->layout = FALSE;
        $session      = Yii::$app->session;
        $session->open();

        $data    = [
            'session' => $session
        ];
        return $this->render('cart-modal', $data);
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $order   = new Order();

        $data    = [
            'session' => $session,
            'order'   => $order
        ];

        $this->setMeta('Корзина');
        return $this->render('view', $data);
    }
}