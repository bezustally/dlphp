<?php

$day = URL_PARAMS['day'];
$args = [];
$args['showDay'] = !empty($day);

if ($args['showDay']) {
  $args['name'] = $day . '.txt' ?? '';
  $isValidDay = hasVisitsDay($args['name']);
  $args['e404'] = !$isValidDay;
  if ($isValidDay) {
    $args['visits'] = getVisits($args['name']);
  }
  $pageTitle = 'Logs for ' . substr($args['name'], 0, -4);
} else {
  $pageTitle = 'Logs';
  $args['visitsDays'] = getVisitsDays();
}

$pageContent = render('v_logs', $args);
