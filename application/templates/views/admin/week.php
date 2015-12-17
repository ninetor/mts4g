<div class="container">
  <h1><?=$params['week']['Title']?></h1>
    <br>

    <table class="table table-striped">
        <tr>
            <th>Заказчик</th>
            <th>Телефон</th>
            <th>Текст</th>
            <th>Дата и время</th>
            <th>Картинка</th>
        </tr>
        <?php foreach ($params['week']['winners'] as $order) : ?>
            <tr>
                <td><?= $order['Social'] ?></td>
                <td><?= $order['Phone'] ?></td>
                <td><?= $order['Text'] ?></td>
                <td><?= dateLogs($order['Created']) ?></td>
                <td><img src="<?= $order['Image'] ?>" style="max-width: 50px; max-height: 50px;"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>