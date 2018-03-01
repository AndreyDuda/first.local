<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 01.03.2018
 * Time: 18:12
 */

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne( Category::className(), ['id' => 'category_id'] );
    }

}