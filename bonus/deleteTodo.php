<?php 

// Assegnamo il valore arriavato dal $_POST alla variabile 
$index_todo_to_delete = $_POST['indexTodoToDelete'];

// Leggere il contenuto del file json 
$todos_string = file_get_contents('./todos.json');
// Decodificare il file json per ottenere un array di todos in formato PHP
$todos = json_decode($todos_string, true);

//Eleminiamo elemento con indice $index_todo_to_delete
array_splice($todos,$index_todo_to_delete,1);

// Risalvare il file:
// - Codifichiamo array $todos per avere il dato nel formato json(stringa) 
$todos_string = json_encode($todos);
// - Salviamo il file con il nuovo contenuto
file_put_contents('./todos.json', $todos_string);

// Creamo dati della risposta in formato php:
$response = [
    'success' => true,
    'todos' => $todos
];

// Trasformiamo la nostra risposta in formato json e stampiamo risposta con file todos aggiornato
header('Content-type: application/json');
echo json_encode($response);