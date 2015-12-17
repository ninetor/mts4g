<div class="container">
    <form method="post">
    <div class="questions-accord questions-accord--short">
        <a href="#" class="questions-accord__item">
            <span style="padding: 17px;">Создать новую неделю победителей</span>

            <div class="button open">
                <div class="line left"></div>
                <div class="line right"></div>
            </div>
            <div class="answer" style="display: none;">
                <div class="input-group">
                    <input type="text" placeholder="Введите название недели" class="form-control" name="weekadd">
      <span class="input-group-btn">
          <button type="submit" class="btn btn-primary form-control">Создать </button>
      </span>
                </div>
                <!-- /input-group -->

            </div>
        </a>
    </div>
    </form>
    <br>

    <table class="table table-striped">
        <tr>
            <th>Название недели</th>
            <th>Статус</th>
            <th>Создана</th>
            <th></th>
        </tr>
        <?php foreach ($params['weeks'] as $week) : ?>
            <tr>
                <td><a href="/admin/weeksview?id=<?= $week['id'] ?>"><?= $week['Title'] ?></a></td>
                <td><?= $week['Active'] ? "Активна" : "В архиве" ?></td>
                <td><?= dateLogs($week['Created']) ?></td>
                <td><a class="glyphicon glyphicon-remove" href="/admin/removeweek?id=<?= $week['id'] ?>"></a></td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>