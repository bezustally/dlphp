<?php
  echo $_SERVER['REQUEST_METHOD'];
  echo "<pre>";
  echo print_r($_POST);
  echo "</pre>";
?>
<form method="post">
  <input type="text" name="1">
  <input type="text" name="2">
  <button>Send</button>
</form>
