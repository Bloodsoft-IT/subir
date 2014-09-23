<?php
$stories = array();
// With Everything
$story[] = array(
    "user" => "1godaddy",
    "id" => 121,
    "user_image" => "40 X 40 User image data",
    "description" => "1Now use your web address to describe what you do and who you are.. Watch how...",
    "post" => array(
        "id" => 1,
        "image" => file_get_contents('base64image.data'),
    ),
    "liked" => false,
    "comments" => array(
        array(
            "user" => "subir",
            "image" => "Some data",
            "description" => "I said something. And this is the comment I posted earlier."
        ),
        array(
            "user" => "godaddy",
            "image" => "Some data",
            "description" => "Go daddy said something and this is his comment. Also, this is a multi-line comment. And if you notice, the word \"multi-line\" starts just below the word \"Go\""
        )
    )
);
// Without a post
$story[] = array(
    "user" => "2godaddy",
    "id" => 221,
    "user_image" => "40 X 40 User image data",
    "description" => "2Now use your web address to describe what you do and who you are.. Watch how...",
    "liked" => true,
    "comments" => array(
        array(
            "user" => "subir",
            "image" => "Some data",
            "description" => "I said something. And this is the comment I posted earlier."
        ),
        array(
            "user" => "godaddy",
            "image" => "Some data",
            "description" => "Go daddy said something and this is his comment. Also, this is a multi-line comment. And if you notice, the word \"multi-line\" starts just below the word \"Go\""
        )
    )
);

// Without a comment
$story[] = array(
    "user" => "2godaddy",
    "id" => 321,
    "user_image" => "40 X 40 User image data",
    "description" => "2Now use your web address to describe what you do and who you are.. Watch how...",
    "liked" => true
);
print json_encode($story);
