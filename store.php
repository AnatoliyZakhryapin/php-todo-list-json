<?php

// Assegnamo il valore arriavato dal $_POST chiamata alla variabile
$new_todo = $_POST['newTodo'] ?? '';

$response = [
    'success' => true
];

// Se il dato arravato e non e vuoto:
if ($new_todo) {

    // Leggere il contenuto del file json 
    $todos_string = file_get_contents('./todos.json');
    // decodificare il file json per ottenere un array di todos in formato PHP
    $todos = json_decode($todos_string, true);

    // Pushare la nuova todo (ricevuta dal $_POST) nell'array
    $todos[] = [
        'text' => $new_todo,
        'done' => true
    ];

    // Creamo dati della risposta in formato php:
    $response['todos'] = $todos;

    // Risalvare il file:
    // - Codifichiamo array $todos per avere il dato nel formato json(stringa) 
    $todos_string = json_encode($todos);
    // - Salviamo il file con il nuovo contenuto
    file_put_contents('./todos.json', $todos_string);
} 
// Altrimenti se $new_todo e vuoto non salviamo niente e creamo la variabile della risposta:
else {

    $response = [
        'success' => false,
        'message' => 'Todo params is required!'
        ];
}

// Trasformiamo la nostra risposta in formato json altrimenti ci da warning nella risposta 
header('Content-type: application/json');
echo json_encode($response);