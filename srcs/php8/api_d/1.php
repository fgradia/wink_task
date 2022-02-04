<?php
$mongo = new MongoDB\Driver\Manager("mongodb://172.16.6.2:27017");

var_dump($mongo->getReadConcern());
?>
