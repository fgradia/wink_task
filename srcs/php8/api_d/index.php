<?php


class winkBlog {

	private $mongo_socket = "172.16.6.2:27017";
	private $mongo;

	function __construct() {
			$this->mongo = new  MongoDB\Driver\Manager("mongo://".$this->mongo_socket);
	}
}

?>