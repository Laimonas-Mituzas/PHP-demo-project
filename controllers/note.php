<?php

$config = require('config.php');    

$db = new Database($config['database']);


$heading = "Note";

$sql = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($sql, ['id' => $_GET["id"]])->fetch();

require "views/note.view.php";