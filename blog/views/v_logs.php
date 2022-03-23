<style>
  .logs {
    margin: 0 auto;
  }

  th {
    text-align: center;
    text-transform: uppercase;
  }

  table,
  td,
  th {
    border: 1px solid #000;
    border-collapse: collapse;
    word-break: break-all;
  }

  td {
    padding: 10px;
    max-width: 500px;

  }

  .danger {
    color: red;
  }
</style>
<? if ($showDay) : ?>
  <? if ($e404) : ?>
    <h1 class="alert alert-danger center fit">Нет таких логов</h1>
    <a class="center" style="display: block;" href="<?= BASE_URL ?>logs">назад</a>
  <? else : ?>
    <div class="header">
      <h1 class=" center">Логи за <?= substr($name, 0, -4) ?></h1>
      <a href="<?= BASE_URL ?>logs">назад</a>
    </div>
    <table class=logs">
      <tr>
        <th>Time</th>
        <th>Ip</th>
        <th>URI</th>
        <th>Referer</th>
      </tr>
      <? foreach ($visits as $day) : ?>
        <tr class="<?= $day['isDanger'] ? 'danger' : '' ?>">
          <td><?= $day['dt'] ?></td>
          <td><?= $day['ip'] ?></td>
          <td><?= $day['uri'] ?></td>
          <td><?= $day['referer'] ?></td>
        </tr>
      <? endforeach; ?>
    </table>
  <? endif; ?>
<? else : ?>
  <div class="log">
    <h1 class="center">Дни логов</h1>
    <div class="logs">
      <? foreach ($visitsDays as $day) : ?>
        <div>
          <a href="<?= BASE_URL ?>logs/<?= substr($day, 0, -4) ?>"><?= substr($day, 0, -4) ?></a>
        </div>
      <? endforeach; ?>
    </div>
  </div>
<? endif; ?>
