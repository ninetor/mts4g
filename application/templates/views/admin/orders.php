<?php
?>
<div class="container">
    <div>
        <form method="get">
        <div class="input-group">
            <input type="text" name="find_text" value="<?=$params['find_text']?>" class="form-control" placeholder="Искать по тексту...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Искать</button>
                    <a class="btn btn-default" href="/admin/orders">Сбросить</a>
                </span>
        </div>
        </form>
        <br>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Заказчик</th>
            <th>Телефон</th>
            <th>Текст</th>
            <th>Дата и время</th>
            <th>Картинка</th>
            <th>Победитель активной недели</th>
            <th></th>
        </tr>
        <?php foreach ($params['orders'] as $order) : ?>
            <tr>
                <td><?= $order['Social'] ?></td>
                <td><?= $order['Phone'] ?></td>
                <td><?= $order['Text'] ?></td>
                <td><?= dateLogs($order['Created']) ?></td>
                <td><img src="<?= $order['Image'] ?>" style="max-width: 50px; max-height: 50px;"></td>
                <td><?php if ($params['winnersWeek']['week']) {?>
                    <input type="checkbox" onchange="checkWinner(this,'<?= $order['id'] ?>')" class="form-control" style="width: 34px;"
                        <?php if (array_key_exists($order['id'],$params['winnersWeek']['winners'])) echo "checked" ?>>
                    <?php } else echo "Неделя победителей не создана"; ?>
                </td>
                <td>
                    <span class="glyphicon glyphicon-remove" onclick="removeOrder('<?= $order['id'] ?>');"></span>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= $params['pagination'] ?>

</div>