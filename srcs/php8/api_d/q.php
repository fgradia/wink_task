<?php

echo 'ciao';



$mongo = new MongoDB\Driver\Manager("mongodb://172.16.6.2:27017");
var_dump($mongo);
$cmd = 'show dbs';
$exec = new MongoDB\Driver\Command($cmd);
$boh = $manager->executeCommand('show', $exec);
var_dump($boh);


?>