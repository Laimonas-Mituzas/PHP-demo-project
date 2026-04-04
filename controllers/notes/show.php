<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$sql = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($sql, ['id' => $_GET["id"]])->findOrFail();

authorize ($note["user_id"] === $currentUserId);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note'=> $note,
]);
