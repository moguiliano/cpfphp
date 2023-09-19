<?php
if(empty($_SESSION))
{
    session_start();

}
require_once './head.html';
require_once './admin/libraries/utils.php';
/**
 * choses a faire front end :
 * aligner toutes les marques tant que c'est possible 
 * mettre la div panier connection alignée avec menu et logo quand ecran plus petit que 992px ;
 * aligner les marques de facon horizontale a pattir de 922 px
 * center les articles 
 * 
 * https://getbootstrap.com/docs/4.6/utilities/display/
 */
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcoinpourphone" aria-controls="navbarcoinpourphone" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="PanierConnection nav-item d-flex justify-content-between col-4 d-lg-none d-xl-none">
            <a class="nav-link" href="panier.php">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                    <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"></path>
                </svg>

                Panier

            </a>
            <a class="nav-link" href="connexion.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                </svg>

                Compte

            </a>

        </div>
        <div class="nav-item row col-2">
            <img src="./logo_coin_pour_phone.png" style="max-width: 80%;min-width: 90px;" alt="Logo">
        </div>
        <div class="collapse navbar-collapse justify-content-between" id="navbarcoinpourphone">


            <ul class="navbar-nav">



                <li class="nav-nav-item">
                    <h5>Coin pour phone , pièces detachées pour smartphones</h5>

                    <?php
                    $db = Database::connect(); //j'appel la fonction connect que je stocke dans une variable $db
                    $articles = new articles;
                    $marques = $articles->selectAll('marques');

                    foreach ($marques as $marque) : ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-light dropdown-toggle text-muted" data-toggle="" aria-expanded="false"> <?= $marque['nom'] ?>
                            </button>

                            <div class="dropdown-menu">

                                <?php $types = $articles->selectById('types', 'id_marque', $marque['id']); ?>
                                <?php foreach ($types as $type) : ?>

                                    <h3 class='dropdown-item' style='color:rgb(64, 125, 191)'><strong><?= $type['nom'] ?></strong></h3>


                                    <?php $models = $articles->selectById('models', 'id_type', $type['id']) ?>
                                    <?php foreach ($models as $model) : ?>
                                        <a class="dropdown-item" href="./view.php?id=<?= $model['id'] ?>"><?= $model['nom'] ?></a>
                                    <?php endforeach ?>


                                    <div class='dropdown-divider'></div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </li>



            </ul>
            <div class="PanierConnection nav-item d-none d-lg-block">
                <a class="nav-link" href="panier.php">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                        <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"></path>
                    </svg>

                    Panier
                    <span class="badge badge-danger"><?=array_sum($_SESSION['panier'])?></span>

                </a>
                <a class="nav-link" href="connexion.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>

                    Compte

                </a>
            </div>
        </div>


    </nav>
</header>









<script>
    window.addEventListener("resize", mangeDataToggler);
    window.onload = mangeDataToggler();

    function mangeDataToggler() //fonction appeler au demarrage et lors du changement de la taille d'ecran .
    {
        const mediaQuery = window.matchMedia('(max-width: 992px)')
        // Check if the media query is true
        var buttonMarque = document.getElementsByClassName('btn btn-outline-light dropdown-toggle text-muted')

        if (mediaQuery.matches) {
            for (a = 0; a < buttonMarque.length; a++) {
                buttonMarque[a].setAttribute("data-toggle", "dropdown");

            }

        } else {
            for (a = 0; a < buttonMarque.length; a++) {
                buttonMarque[a].removeAttribute("data-toggle", "dropdown");

            }


        }
    }
</script>