<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    echo "<pre>";
    echo print_r($_GET);
    echo "</pre>";

    $id = (int)($_GET['id']);
    echo $id;
  ?>
</body>
</html>