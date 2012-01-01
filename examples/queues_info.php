<?php
  //korzystaj z lokalnej kopii, jeśli istnieje
  if (file_exists(dirname(__FILE__) . '/../elibriPHP.php')) {
    require_once(dirname(__FILE__) . '/../elibriPHP.php');
  } else {
    require_once('elibriPHP.php');
  }

  $login = getenv('ELIBRI_API_LOGIN');
  $password = getenv('ELIBRI_API_PASSWORD');

  $api = new ElibriAPI($login, $password);

  $queues_list = $api->getQueues();

  foreach ($queues_list as $queue) {
    print "Kolejka {$queue->name} => {$queue->product_count} produktów\n";
  }


?>
