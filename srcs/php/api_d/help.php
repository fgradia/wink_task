<?php

echo nl2br(
"welcome to Wink REST API Specification..


● List of public posts => GET req to /blog
    \"http://localhost:9000/blog\"

● List of public posts => GET req to /draft
    \"http://localhost:9000/draft\"

● Create a post => POST req to /create with title, body, tags
    \"http://localhost:9000/create?title=post_title&body=post_body&tag=tag1,tag2\"

● Publish a post => PUT req to /publish with title
    \"http://localhost:9000/publish?title=post_title\"

● Delete a post => DELETE req to /delete with title
    \"http://localhost:9000/delete?title=post_title\"

● Filter posts by hashtags => GET req to /tags with tags
    \"http://localhost:9000/tags?tag=tag1,tag2\"


N.B.
title == use unique title for each post
tags == a comma-separated-string 

");

?>