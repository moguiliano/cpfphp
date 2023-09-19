

<body>
<?php
require_once './header.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $statement = new articles;
    $article = $statement->selectById('articles','id',$id);
    
    

}
else
die("aucun article n'a été selctionné");
foreach ($article as $item) : ?>


    <div class="container bg-white border- rounded">
        <div class="presentation">
            <div class="row">
                <div class="col-6 p-3">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/coinpourphone/lcd/iphone/11/1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/coinpourphone/lcd/iphone/11/2.jpg" alt="Second slide">
                            </div>
                        
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                
                </div>
                <div class="col-6 p-3">
                    <h3><?= $item['categorie'] ?> <?= $item['nom'] ?> <?=$item['couleur']?> <?= $item['qualite'] ?></h3>
                    <br>
                    <p>description : </p>
                    <br>
                    <p>quantité :
                    <select>
                    <option value=""></option>
                    </select></p>
                    <br>
                    <a href="#" class="btn btn-success col-12">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                            <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"></path>
                        </svg>
                        Ajouter
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>

</body>
