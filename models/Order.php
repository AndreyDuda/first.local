<?php

namespace app\models;

use \yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адресс',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class'     => TimestampBehavior::className(),
                'attribute' => [
                    ActiveRecord::EVENT_AFTER_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_AFTER_UPDATE => ['updated_at'],
                ],

                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
