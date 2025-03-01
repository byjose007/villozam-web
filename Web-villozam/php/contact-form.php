<?php
// Configuración del correo electrónico
$recipient_email = "byjose007@gmail.com"; // Correo de destino
$subject_prefix = "Formulario de Contacto Villozam: "; // Prefijo para el asunto

// Definir headers para el correo
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: webform@villozam.com" . "\r\n"; // Remitente (ajusta según necesites)
$headers .= "Reply-To: {$_POST['email']}" . "\r\n"; // Reply-to será el email del remitente

// Verificar que el método sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitizar y validar datos del formulario
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'response' => 'error',
            'message' => 'Por favor, ingrese un correo electrónico válido.'
        ]);
        exit;
    }
    
    // Verificar que los campos no estén vacíos
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode([
            'response' => 'error',
            'message' => 'Por favor, complete todos los campos requeridos.'
        ]);
        exit;
    }
    
    // Crear el contenido del correo electrónico en formato HTML
    $email_content = "<html><body>";
    $email_content .= "<h2>Mensaje de Contacto - Villozam</h2>";
    $email_content .= "<p><strong>Nombre:</strong> {$name}</p>";
    $email_content .= "<p><strong>Email:</strong> {$email}</p>";
    $email_content .= "<p><strong>Asunto:</strong> {$subject}</p>";
    $email_content .= "<p><strong>Mensaje:</strong></p>";
    $email_content .= "<p>" . nl2br($message) . "</p>"; // nl2br convierte saltos de línea en <br>
    $email_content .= "<p>Este mensaje fue enviado desde el formulario de contacto de villozam.com</p>";
    $email_content .= "</body></html>";
    
    // Intentar enviar el correo
    $mail_success = mail($recipient_email, $subject_prefix . $subject, $email_content, $headers);
    
    // Verificar si el correo se envió correctamente
    if ($mail_success) {
        // Mensaje enviado con éxito
        echo json_encode([
            'response' => 'success',
            'message' => '¡Gracias por contactarnos! Su mensaje ha sido enviado correctamente.'
        ]);
    } else {
        // Error al enviar el mensaje
        echo json_encode([
            'response' => 'error',
            'message' => 'Lo sentimos, hubo un problema al enviar su mensaje. Por favor, inténtelo de nuevo más tarde.'
        ]);
    }
} else {
    // Si no es un método POST, redirigir a la página principal
    header("Location: /");
    exit;
}
?>