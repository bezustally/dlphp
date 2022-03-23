<style>
  hr {
    margin: 0;
    padding: 0;
  }

  .message {
    display: flex;
    justify-content: space-between;
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
<div class="chat" style="text-align: center; width: 300px; margin: 0 auto; border: 1px solid #eee">
  <div class="chat__send-btn">
    <a href="add.php" style="text-decoration: none; color: black; text-transform: uppercase; padding: 10px; display: block">Send</a>
  </div>
  <hr>
  <? if ($messages) : ?>
    <? foreach ($messages as $message) : ?>
      <div class="message">
        <div class="message__sender"><?= $message['username'] ?></div>
        <div class="message__text"><?= $message['text'] ?></div>
        <div class="message__time"><?= substr($message['timestamp'], -9) ?></div>
      </div>
      <hr>
    <? endforeach; ?>
  <? else : ?>
    <p>There's no messages yet</p>
  <? endif; ?>
  <div class="chat__send-btn">
    © 2022 bezustally
  </div>
</div>
