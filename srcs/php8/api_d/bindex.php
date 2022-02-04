<?php

class winkBlog {

	private $mongo_socket = "172.16.6.2:27017";
	private $mongo;

	function __construct() {
			$this->mongo = new  MongoDB\Driver\Manager("mongodb://".$this->mongo_socket);
	}
	//function show_post() {}
	//function create_post(title,body,)
}

$wc = new winkBlog();
var_dump($wc);




?>