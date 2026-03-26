<?php

$config = require('config.php');    

$db = new Database($config['database']);


$heading = "My Notes";


$sql = "SELECT * FROM notes WHERE user_id = 1";

$notes = $db->query($sql)->get();

require "views/notes.view.php";