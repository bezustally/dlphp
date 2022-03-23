<?php

function render(string $path, array $args = []): string {
  $theFullViewOrTemplatePath = "views/$path.php";
  extract($args);
  ob_start();
  include($theFullViewOrTemplatePath);
  return ob_get_clean();
}

function parseUrl(string $url, array $routes): array {
  $result = [
    'controller' => '404',
    'params' => [],
  ];

  foreach ($routes as $route) {
    $matches = [];

    if (preg_match($route['regex'], $url, $matches)) {
      $result['controller'] = $route['controller'];

      if (isset($route['params'])) {
        foreach ($route['params'] as $param => $number) {
          $result['params'][$param] = $matches[$number];
        }
      }
      break;
    }
  }

  return $result;
}

function defineContent() {
  $path = "controllers/" . CONTROLLER . ".php";

  $pageTitle = '404 Error | BBlog';

  include_once($path);

  $content['title'] = $pageTitle;
  $content['html'] = $pageContent;

  return $content;
}
