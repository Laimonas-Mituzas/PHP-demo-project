<?php

require 'functions.php';
require 'Database.php';
require 'router.php';

$config = require('config.php');    

$db = new Database($config['database']);

$posts = $db->query("SELECT * FROM posts");

foreach ($posts as $post) {
    echo $post['title'] . "<br>";
    echo $post['content'] . "<br>";
    echo $post['create_time'] . "<br><hr>";
}   