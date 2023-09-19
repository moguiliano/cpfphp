<?php
require_once '../head.html';
require_once 'libraries/functions.php';

/**
 * si l'utilisateur est connecté, diriger automatiquement vers l'index.
 */
if (is_connected())
{
    header('location:index.php');
    exit();
}

/**
 * si les champs sont correctement remplis, demarrer sesion
 */
$Errors=null;
if (!empty($_POST['Passe']) && !empty($_POST['Pseudo']))
{
    $passe = filter_input(INPUT_POST,'Passe');
    $Pseudo = filter_input(INPUT_POST,'Pseudo');
    if($passe==='1234!' && $Pseudo === '1234')
    {   
        session_start();
        $_SESSION['connecte']=1;
        header('location:index.php');
        exit();
    }else($Errors = 'Erreur de données');

}   


/**
 * 
 */



//PHP_AUTH_USER (nom d'utilisateur)
//PHP_AUTH_PW ( mot de passe)
//AUTH_TYPE (type d'identification)








?>

<body>
    <div style="padding-top:10%;">
    <div class="list-group border rounded col-4 offset-4">
        <form action='' method='POST' enctype="multipart/form-data">

            <div class="col-11">
                <label for="Pseudo" class="form-label">Pseudo</label>
                <input type="text" name="Pseudo" class="form-control" id="Pseudo" aria-describedby="Pseudo">
            </div>
            <div class="col-11">
                <label for="Passe" class="form-label">Mot de passe</label>
                <input type="password" name="Passe" class="form-control" id="Passe">
                    <?php if ($Errors) : ?>
                        <p class="alert alert-danger"><?=$Errors;?></p>
                    <?php endif; ?>
            </div>
            <br>
            <div class="col-11">
                <button type="submit" class="btn btn-primary">Se Connecter</button>
            </div>
        </form>
        <br>
    </div>
    </div>
    
</body>