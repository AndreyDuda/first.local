<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 01.03.2018
 * Time: 17:53
 */

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Product;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        return $this->hasMany( Product::className(), ['category_id' => 'id'] );
    }

}