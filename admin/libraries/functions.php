<?php

function is_connected() // cette fonction verifie sil y a bien une session connecté
{

    if (session_status() === PHP_SESSION_NONE) //si la session n'est pas active on la demarre
    {
        session_start();
    }
    return !empty($_SESSION['connecte']);
}

function demande_de_connection()
{
    if (!is_connected()) {
        (header('Location:../admin/login.php'));
        exit();
    }
}

?>