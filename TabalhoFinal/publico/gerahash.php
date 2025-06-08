<?php
$senhaDigitada = "123456";
$hashDoBanco = '$2y$10$0Wx4zvboDyf4jmtLnva62OLdOgkMNP.5X2EbKfJG3UGNSe5rDYLKG';

if (password_verify($senhaDigitada, $hashDoBanco)) {
    echo "Senha correta!";
} else {
    echo "Senha incorreta.";
}
?>
