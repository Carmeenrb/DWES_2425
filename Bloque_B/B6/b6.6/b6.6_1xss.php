<?php
// xss.php

// Recibir el mensaje desde la URL
$msg = $_GET['msg'] ?? 'No message provided';

// Escapar los caracteres especiales usando htmlspecialchars
$escapedMsgDefault = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');

?>
    <!-- xxs ejemplo -->
    <?php include '../includes/header.php' ?>

    <h1>Processed Message</h1>
    <p><strong>Original Message:</strong> <?= $msg ?></p>
    <p><strong>Escaped Message:</strong> <?= $escapedMsgDefault ?></p>

    <?php include '../includes/footer.php' ?>
