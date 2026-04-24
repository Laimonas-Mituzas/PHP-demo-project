<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$sql = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($sql, ['id' => $_GET["id"]])->findOrFail();

authorize ($note["user_id"] === $currentUserId);


view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors'=> [],
    'note' => $note
]);