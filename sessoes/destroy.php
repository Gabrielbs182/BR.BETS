<?php

session_start();

session_destroy();

    unset($_SESSION);
    unset($_COOKIE);

    header('Location: http://127.0.0.1/index.php');

?>