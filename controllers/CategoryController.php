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
use yii\data\Pagination;


class CategoryController extends AppController
{

    public function actionIndex()
    {
        $hits = Product::find()->where( ['hit' => '1'] )->limit(6)->all();
        $data = [
            'hits' => $hits
        ];

        $this->setMeta('STORE');
        return $this->render('index', $data);
    }

    public function actionView($id)
    {
        $id         = Yii::$app->request->get('id');
        $category   = Category::findOne($id);
        $query      = Product::find()->where(['category_id' => $id]);
        $pagination = new Pagination([
            'pageSize'       => 3,
            'totalCount'     => $query->count(),
            'pageSizeParam'  => FALSE,
            'forcePageParam' => FALSE
        ]);
        $products   = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        $data       = [
            'products'   => $products,
            'category'   => $category,
            'pagination' => $pagination
        ];

        $this->setMeta('STORE | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', $data);

    }


}