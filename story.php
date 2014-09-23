<?php
$story = $_GET['story'];
$hide = $_GET['hide'];

//print json_encode(true);
print json_encode(array($story, $hide));
