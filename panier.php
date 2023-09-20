<?php
require_once 'head.html';
require_once 'header.php';


if (empty($_SESSION)) {
    session_start();
}
 ?>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<a class="btn btn-success" style="margin: 1%;" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>


<div class="container">

    <h1 class="titre-ajouter-article">Voici votre panier</h1>

    <table class="table">
        <thead>
            <!--  en tete -->
            <tr>
                <th scope="col">image</th>
                <th scope="col">Nom de l'article</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité</th>
                <th scope="col">Sous-Total</th>
                <th scope="col">Supprimer</th>

            </tr>
        </thead>
        <tbody>


            <?php
            $ids = (array_keys($_SESSION['panier']));
            if (empty($ids)) {
                echo "votre panier est vide";
            } else {
                foreach ($ids as $id) {
                    $statement = new articles;
                    $articles = $statement->selectById('articles', 'id', $id);
                    foreach ($articles as $article) :
            ?>
                        <tr>
                            <td><img style="width:10%" class="image-panier" src="lcd/iPhone/<?= $article['image'] ?>" alt=""></td> <!--  prix * quantité = sous total -->
                            <td><?= $article['categorie'] ?> <?= $article['nom'] ?> <?= $article['couleur'] ?> <?= $article['qualite'] ?></td><!--  titre article -->
                            <td id="prix"><?= $article['prix'] ?></td><!--  prix -->
                            <td>

                                <select>
                                    <option value="<?= $_SESSION['panier'][$id] ?>"><?= $_SESSION['panier'][$id] ?></option>


                                </select>
                            </td>
                            <td>22 €</td> <!--  prix * quantité = sous total -->
                            <td>
                                <!--  boutton supprimer -->
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </a>
                            </td>


                        </tr>



                <?php endforeach;
                } ?>
                <tr><!--  total -->

                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Total</th>
                    <td>€</td>
                    <td>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
        </tbody>



    <?php ;
            } ?>











    </table>

    <br>
    <br>
    <div class="button" style="display: flex;justify-content: flex-end;">
        <button href="" class="btn btn-primary col-4">Validez votre achat</button>
    </div>
</div>


</div>




</div>