<?php

if (empty($_SERVER['PATH_INFO'])) {
	require "help.php";
	return ;
}

require "class.php";

switch ($_SERVER['REQUEST_METHOD']) {
	case "GET":
		switch ($_SERVER['PATH_INFO']) {
			case "/blog":
				return (new winkClient)->show_posts();
			case "/draft":
				return (new winkClient)->show_posts(1);
			case "/tags":
				return (new winkClient)->show_tags();
		}
		break ;
	case "POST":
		if ($_SERVER['PATH_INFO'] == "/create" && count($_REQUEST) >= 3)
			return (new winkClient)->new_post();
		break ;
	case "PUT":
		if ($_SERVER['PATH_INFO'] == "/publish" && isset($_REQUEST['title']))
			return (new winkClient)->pub_post();
		break ;
	case "DELETE":
		if ($_SERVER['PATH_INFO'] == "/delete" && isset($_REQUEST['title']))
			return (new winkClient)->del_post();
		break ;
	default :
		require "help.php";

}
require "help.php";

?>