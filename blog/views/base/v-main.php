<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
  <title><?= $title ?></title>
</head>

<body>
  <hr class="mt0">
  <header class="site-header">
    <div class="logo">
      <div class="logo__title h3"><a class="nav-link" href="<?= BASE_URL ?>">Blog</a></div>
      <div class="logo__subtitle h6">interesting articles here</div>
    </div>
    <nav class="site-nav">
      <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>add">Add</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>categories">Categories</a></li>
      </ul>
    </nav>
  </header>
  <div class="site-content">
    <div class="container">
      <?= $content ?>
    </div>
  </div>
  <footer class="site-footer">
    <div class="container">
      &copy; bezustally
    </div>
  </footer>
  <script>
    notification = document.querySelector('.alert');
    if (notification) notification.addEventListener('click', () => notification.outerHTML = '');
  </script>
</body>

</html>
