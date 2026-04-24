<?php

use Core\Validator;
use Core\App;
use Core\Database;

// dd('Hello');
$db = App::resolve(Database::class);

$currentUserId = 1;

// find the corresponding note in the database
$sql = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($sql, ['id' => $_POST["id"]])->findOrFail();

// authorize the user to make sure they can update the note
authorize ($note["user_id"] === $currentUserId);

// validate the incoming request data
$errors = [];
if (! Validator::string($_POST['body'],1,500)) {
    $errors['body'] = 'A body of no more than 500 characters is required';

}

if (count($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// update the note in the database
$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect the user back to the notes page
header('location: /notes');
die();






