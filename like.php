<?php
// Check for permissions.
$liked = $_GET['liked'];
$story = $_GET['story'];

//print json_encode(true);
print json_encode(array($liked, $story));
