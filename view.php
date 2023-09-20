 <?php

    use function PHPSTORM_META\type;

    require_once 'header.php';

    ?>



 <div class="row">

     <?php



        $id = filter_input(INPUT_GET, 'id');
        require_once 'admin/libraries/utils.php';
        $statement = new articles;
        $articles = $statement->selectById('articles', 'id_model', $id);
        foreach ($articles as $article) : ?>

            <div class="col-sm-6 col-md-5 col-lg-4" class="article">
                <div class="card" style="width: 19rem">
                    <img class="card-img-top" src="lcd/iPhone/<?= $article['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <div class="caption">
                            <h5 class="card-title"> <?= $article['categorie'] ?> <?= $article['nom'] ?> <?= $article['couleur'] ?> <?= $article['qualite'] ?></h5>
                            <p class="prix">Prix : <?= $article['prix'] ?> € </p>
                        </div>
                        <div class="detailPanier">
                            <a href="infosArticle.php?id=<?= $article['id'] ?>" class="btn btn-primary col-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg> Détails
                            </a>
                            <a href="addPanier.php?id=<?= $article['id'] ?>" class="btn btn-success col-6">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                Panier
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


 </div>






 </body>


 </html>