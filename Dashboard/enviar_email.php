<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Conexão com o banco de dados
$host = 'localhost';
$db = 'comercial';
$user = 'tacweb';
$pass = 'nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237';

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
$conn->exec("SET NAMES 'utf8mb4'"); // Definindo a codificação

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailDestino = $_POST['email_destino'];
    $mensagem = $_POST['mensagem'];

    // Recuperar informações da empresa
    $sql = "SELECT * FROM perfil WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $nome_empresa = htmlspecialchars($row['nome_empresa']);
        $email_empresa = htmlspecialchars($row['email']);

        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'alexarcanjo515@gmail.com'; // Seu email
            $mail->Password = 'lsjzogvscggbflpy'; // Sua senha ou token de app
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Definindo o charset
            $mail->CharSet = 'UTF-8';

            // Destinatários
            $mail->setFrom($email_empresa, $nome_empresa);
            $mail->addAddress($emailDestino);

            // Conteúdo do email
            $mail->isHTML(true);
            $mail->Subject = "Resposta da Sua Mensagem";
            $mail->Body    = nl2br(htmlspecialchars($mensagem));

            // Definindo a prioridade do email
            $mail->addCustomHeader('X-Priority', '1'); // 1 = Alta prioridade
            $mail->addCustomHeader('X-MSMail-Priority', 'High');
            $mail->addCustomHeader('Importance', 'High');

            // Enviar email
            $mail->send();
            header("Location: email-inbox.php?success=1");
            exit();
        } catch (Exception $e) {
            header("Location: email-inbox.php?error=1&message=" . urlencode($mail->ErrorInfo));
            exit();
        }
    } else {
        header("Location: email-inbox.php?error=1&message=" . urlencode("No record found for the company."));
        exit();
    }
} else {
    header("Location: email-inbox.php");
    exit();
}
?>