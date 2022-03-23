<style>
  table,
  tr,
  td,
  th {
    border: 1px solid #eee;
    border-collapse: collapse;
  }

  .message {
    align-items: center;
    height: 30px;
  }

  .chat__send-btn {
    background: whitesmoke;
  }

  .chat__send-btn:hover {
    background: #ddd;
  }
</style>
<table class="chat" style="text-align: center; width: 300px; margin: 0 auto; border: 1px solid #eee">
  <? if ($messages) : ?>
    <tr>
      <th>Username</th>
      <th>Message</th>
      <th>Date</th>
    </tr>
    <? foreach ($messages as $message) : ?>
      <tr class="message">
        <td class="message__sender"><?= $message['username'] ?></td>
        <td class="message__text"><?= $message['text'] ?></td>
        <td class="message__time"><?= substr($message['timestamp'], -9) ?></td>
      </tr>
    <? endforeach; ?>
  <? else : ?>
    <p>There's no messages yet</p>
  <? endif; ?>
</table>
<hr style="width: 300px;">
<a href=" index.php" style="text-align: center; display: block">Go to standart view</a>
