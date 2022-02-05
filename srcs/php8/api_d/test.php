<?php
// require 'vendor/autoload.php';
// echo "ciao\n";
// $cl = new MongoDB\Client("mongodb://mongo_srv:27017");
// $db = $cl->DBTEST;

// $coll = $db->COLLTEST;

// $doc = $coll->find();

// echo $doc;

require "class.php";

// $wc = new winkBlog();
// // var_dump($wc);
// print_r($wc);

// $coll = (new winkBlog)->mongo->winkDB->Blog;
// var_dump($coll);

$insertOneResult = (new winkClient)->coll->insertOne([
    'username' => 'qweqeqweqweqwe',
    'email' => 'qweqweqweqweqw@example.com',
    'name' => 'Admqweqweqweqweqweqwin User',
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

// var_dump($insertOneResult->getInsertedId());

(new winkClient)->show_post();

?>
