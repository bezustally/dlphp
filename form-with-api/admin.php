<?php

include_once('model/requests.php');
$requests = getRequests();

?>
<table>
  <tr>
    <td>Date</td>
    <td>Name</td>
    <td>Phone</td>
  </tr>
  <? foreach ($requests as $request) : ?>
    <tr>
      <td><?= $request["timestamp"] ?></td>
      <td><?= $request["name"] ?></td>
      <td><?= $request["phone"] ?></td>
    </tr>
  <? endforeach; ?>
</table>
