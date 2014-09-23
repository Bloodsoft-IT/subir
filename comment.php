<?php
// Check permissions and then let post
$story = $_GET['story'];
$comment_data = $_GET['comment'];

// FIXME: Random permission to post comment
$val = rand(0, 1000) % 2;
$comment = array(
    "user" => "subir",
    "image" => "Comment user image.",
    "description" => $comment_data);
print json_encode($val ? $comment : false);
