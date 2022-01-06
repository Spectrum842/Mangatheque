<?php
    // On détruit la session et redirige
    session_destroy();
    header('Location: /public/index.php');
    exit;