<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = 'contacto@villozam.com';
    $subject = 'Nuevo mensaje desde web';
    $message = "Nombre: {$_POST['name']}\nEmail: {$_POST['email']}\nMensaje: {$_POST['message']}";
    $headers = 'From: webmaster@villozam.com';

    header('Content-Type: application/json');

    $data = [
        'status' => 'success',
        'message' => 'Mensaje recibido (prueba local)',
        'data' => $_POST
    ];

    echo json_encode($data);
}
?>
