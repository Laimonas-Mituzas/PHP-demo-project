<?php

use Core\Database;

$config = require base_path('config.php');    
$db = new Database($config['database']);

$currentUserId = 1;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// track the note to be deleted

$sql = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($sql, ['id' => $_GET["id"]])->findOrFail();

// Authorize the note belongs to the current user

authorize ($note["user_id"] === $currentUserId);

// Delete the note

    $sql = "DELETE FROM notes WHERE id = :id";

    $db->query($sql, ['id' => $_POST['id']]);

    header('Location: /notes');

    exit() ;

} else {


$sql = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($sql, ['id' => $_GET["id"]])->findOrFail();

authorize ($note["user_id"] === $currentUserId);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note'=> $note,
]);

}