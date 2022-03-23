<?php

function getRoutes() {
  $number = '([1-9]+\d*)'; // 1+

  return [
    [
      'regex' => '/^add\/?$/',
      'controller' => 'articles/add'
    ],
    [
      'regex' => "/^article\/$number$/",
      'controller' => 'articles/one',
      'params' => [
        'id'  => 1,
      ]
    ],
    [
      'regex' => '/^$/',
      'controller' => 'articles/all'
    ],
    [
      'regex' => '/^categories\/?(admin)?$/',
      'controller' => 'categories/all',
      'params' => [
        'admin' => 1,
      ]
    ],
    [
      'regex' => "/^category\/$number$/",
      'controller' => 'categories/one',
      'params' => [
        'id'  => 1,
      ]
    ],
    [
      'regex' => '/^categories\/?(add)?$/',
      'controller' => 'categories/add',
      'params' => [
        'add' => 1,
      ]
    ],
    [
      'regex' => "/^delete\/$number$/",
      'controller' => 'articles/delete',
      'params' => [
        'id'  => 1,
      ]
    ],
    [
      'regex' => "/^edit\/$number$/",
      'controller' => 'articles/edit',
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
      'controller' => 'auth/login',
    ],
  ];
}

return getRoutes();
