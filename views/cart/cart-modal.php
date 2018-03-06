<?php if( !empty($session['cart']) ): ?>
    <div class="table_responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименнование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($session['cart'] as $id => $cart ): ?>
                    <tr>
                        <td><?= $cart['img'] ?></td>
                        <td><?= $cart['name'] ?></td>
                        <td><?= $cart['qty'] ?></td>
                        <td><?= $cart['price'] ?></td>
                        <td><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
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
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
