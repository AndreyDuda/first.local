<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
?>

<div class="container">
    <?php if( !empty($session['cart']) ): ?>
        <div class="table_responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименнование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $cart ): ?>
                    <tr>
                        <td><?= \yii\helpers\Html::img('@web/images/products/' . $cart['img'], ['height' => 50]) ?></td>
                        <td><?= $cart['name'] ?></td>
                        <td><?= $cart['qty'] ?></td>
                        <td><?= $cart['price'] ?></td>
                        <td><?= $cart['price'] * $cart['qty'] ?></td>
                        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">Итого:</td>
                    <td><?= $session['cart.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="4">На сумму:</td>
                    <td><?= $session['cart.sum'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    <hr />
    <?php $form = ActiveForm::begin() ?>
    <?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []) ?>
    <?= $form->field($order, 'name') ?>
    <?= $form->field($order, 'email') ?>
    <?= $form->field($order, 'phone') ?>
    <?= $form->field($order, 'address') ?>
    <?= Html::submitButton('Заказать', ['class' => 'btn btn-success'])?>
    <?php ActiveForm::end() ?>
    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif; ?>
</div>
