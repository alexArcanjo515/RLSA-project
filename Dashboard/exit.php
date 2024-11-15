<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION['user_id'])) {
    // Destruir todas as variáveis de sessão
    session_unset();
    session_destroy();
}

// Redirecionar para a página de login
header('Location: login.php');
exit();
?>
