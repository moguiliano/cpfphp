<?php
require_once './head.html';
require_once './admin/libraries/utils.php';


?>


<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>


   <img class="navbar-brand row col-2" src="./logo_coin_pour_phone.png"></img>

   <!--cette bascule a droite-->
   <div class="row">

      <div class="collapse navbar-collapse col-8" id="navbarTogglerDemo03">
         <ul class="nav-item">
            <li class="d-flex justify-content-center">

               <?php
               $db = Database::connect(); //j'appel la fonction connect que je stocke dans une variable $db
               $articles = new articles;
               $marques = $articles->selectAll('marques');

               foreach ($marques as $marque) : ?>
                  <div class="nav-link">
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
                  </div>

               <?php endforeach ?>
            </li>

         </ul>

      </div>


   </div>
   <ul class="nav-item">
         <li class="">
            <a class="nav-link" href="panier.php">
               <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"></path>
               </svg>

               Panier

            </a>
            <a class="nav-link" href="connexion.php">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
               </svg>

               Compte

            </a>
         </li>
      </ul>

</nav>