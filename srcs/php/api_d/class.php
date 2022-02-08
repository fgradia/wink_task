<?php

require '/vendor/autoload.php';

class winkClient {

	private $mongo_socket = "mongodb://172.16.6.2:27017";
	private $mongo;
    private $db;
    private $coll;

	function __construct() {
			$this->mongo = new  MongoDB\Client($this->mongo_socket);
            $this->db = $this->mongo->winkDB;
            $this->coll = $this->db->Blog;
	}
    function print_doc($doc) {
        echo "[_id]",$doc['_id'],
            ",[title]", $doc['title'],
            ",[body]", $doc['body'],
            ",[status]", $doc['status'],
            ",[author]", $doc['author'],
            ",[hashtags]";
        foreach ($doc['hashtags'] as $tag)
            echo '#', $tag;
        echo nl2br("\n\n");
    }
	function show_posts($x = 0) {
        $status = $x ? 'draft' : 'published';
        $index = $this->coll->find([
            'status' => $status
        ]);
        foreach ($index as $doc) {
            $this->print_doc($doc);
        }
    }
    function show_tags() {
        if (!isset($_REQUEST['tag'])) {
            require "help.php";
            return ;
        }
        $index = $this->coll->find([
            'hashtags' => ['$in' => explode(',', $_REQUEST['tag'])]
        ]);
        foreach ($index as $doc) {
            $this->print_doc($doc);
        }
    }
	function new_post() {
        if (!isset($_REQUEST['title']) || !isset($_REQUEST['body']) || !isset($_REQUEST['tag'])) {
            require "help.php";
            return ;
        }
        $ret = $this->coll->find([
            'title' => $_REQUEST['title']
        ]);
        if (count($ret->toArray())) {
            echo "Another post has this title!", "\n";
            return ;
        }
        $ret = $this->coll->insertOne([
            'title' => $_REQUEST['title'],
            'body' => $_REQUEST['body'],
            'hashtags' => explode(',', $_REQUEST['tag']),
            'status' => 'draft',
            'author' => 'Brian Fox',
        ]);
        print_r($ret);
        printf("Inserted %d document\n", $ret->getInsertedCount());
    }
    function pub_post() {
        $ret = $this->coll->findOneAndUpdate([
            'title' => $_REQUEST['title']], [
                '$set' => ['status' => 'published']
        ]);
        if ($ret)
            echo "Post Updated: ", $_REQUEST['title'], "\n";
        else
            echo "Nothing to Update!", "\n";
    }
    function del_post() {
        $ret = $this->coll->findOneAndDelete([
            'title' => $_REQUEST['title']
        ]);
        print_r($ret);
        if ($ret)
            echo "Post Deleted: ", $_REQUEST['title'], "\n";
        else
            echo "Nothing to Delete!", "\n";
    }
}


?>