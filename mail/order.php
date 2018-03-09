
    <div class="table_responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименнование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $cart ): ?>
                <tr>
                    <td><?= $cart['name'] ?></td>
                    <td><?= $cart['qty'] ?></td>
                    <td><?= $cart['price'] ?></td>
                    <td><?= $cart['price'] * $cart['qty'] ?></td>
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
