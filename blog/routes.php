<?php

function getRoutes() {
  $number = '([1-9]+\d*)'; // 1+

  return [
    [
      'regex' => '/^add$/',
      'controller' => 'add'
    ],
    [
      'regex' => "/^article\/$number$/",
      'controller' => 'article',
      'params' => [
        'id'  => 1,
      ]
    ],
    [
      'regex' => '/^$/',
      'controller' => 'articles'
    ],
    [
      'regex' => '/^categories$/',
      'controller' => 'categories'
    ],
    [
      'regex' => "/^category\/$number$/",
      'controller' => 'category',
      'params' => [
        'id'  => 1,
      ]
    ],
    [
      'regex' => "/^delete\/$number$/",
      'controller' => 'delete',
      'params' => [
        'id'  => 1,
      ]
    ],
    [
      'regex' => "/^edit\/$number$/",
      'controller' => 'edit',
      'params' => [
        'id'  => 1,
      ]
    ],
    [
      'regex' => '/^(logs)(?:\/([\d]{4}-[\d]{2}-[\d]{2}))?$/',
      'controller' => 'logs',
      'params' => [
        'id'  => 1,
        'day' => 2
      ]
    ],
    [
      'regex' => '/^login$/',
      'controller' => 'login',
    ],
  ];
}

return getRoutes();
