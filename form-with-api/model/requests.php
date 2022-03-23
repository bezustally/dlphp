<?php

function getRequests(): array {
  $lines = file('./db/all.requests');
  $requests = [];
  foreach ($lines as $line) {
    $requests[] = toArray($line);
  }

  return $requests;
}

function toArray(string $line): array {
  $line = rtrim($line);
  $parts = explode(';', $line);
  return ['timestamp' => $parts[0], 'name' => $parts[1], 'phone' => $parts[2]];
}

function addRequest(string $name, string $phone): bool {
  $timestamp = date("Y-d-m H:i:s");
  $newRequest = "$timestamp;$name;$phone\n";
  file_put_contents('./db/all.requests', $newRequest, FILE_APPEND);
  return true;
}
