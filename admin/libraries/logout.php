<?php
require_once 'functions.php';
function logout()
{
    if(is_connected())
    {
        unset($_SESSION['connecte']);
        header('location:../login.php');

    }

}
logout();