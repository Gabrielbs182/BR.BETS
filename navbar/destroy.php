<?php
session_start();

session_destroy();

    unset($_SESSION);
    unset($_COOKIE);

    header('Location: ../index.php');

?>