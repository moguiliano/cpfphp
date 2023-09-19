<?php

use Stripe\Terminal\Location;

if(isset($_POST['prix']) && !empty($_POST['prix']))
{
    require_once '/Applications/MAMP/htdocs/coinpourphone/vendor/autoload.php';
    $prix = filter_input(INPUT_POST, 'prix');
    $stripe = new \Stripe\StripeClient('sk_test_51KAiE6Bja7GgWYqGWus0pFvMPIWSwSY31d4RHpF9VQzZxXBdlCh6Xg7JCJRYESrcu1pRTPnbcIEHlA6H7pQNjI9z00HtBJBw3p');
    //creation d'intention de paiement.
    $intent = $stripe->paymentIntents->create(['amount' => $prix*100 , 'currency' => 'eur']);
    
    //      !!!    a faire condition sil ya un post et si la superglobale post n'est pas vide alors executer sinon header (index.php)
}else
{
}

?>


<!DOCTYPE html>

<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>stripe</title>
</head>

<body>

    <form action="" method="POST">
        <!--sert juste a valider l'intention de paiement-->
        <div class="" id="error"></div>
        <!--message d'erreur de paiement-->
        <input type="text" class="" id="cardholder-name" placeholder="titulaire de la carte" value ="mo gui">
        <div class="" id="card-elements"></div>
        <!--contientdra formulaire de saisie de carte-->
        <div class="" id="cards-errors" role="alert"></div>
        <!--contiendra erreur relatives a la carte (faux numero , mauvaise date d'expiration etc)-->
        <button type="button" id='card-button' data-secret="<?= $intent['client_secret']?>">Soumettre</button>
        <!--ne gère pas la connection avec strip il sert juste a valider l'intention de paiement -->
        <!-- ce code sert uniquement entre la promesse de paiement et le paiement lui meme ( qui lui sera géré pas js)-->
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="script.js"></script>
</body>

</html>

