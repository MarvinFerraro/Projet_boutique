<?php
function listCats()
{

    $cats = [
        ["Chiang Mai", "img/chiang_mai.jpg", 1500,],
        ["Bangkok", "img/bangkok.jpg", 1200,],
        ["Lampang", "img/lampang.jpg", 1800,]
    ];

    return $cats;
}

function displayArticle($article)
{
    ?>
    <div class="cadre article">
        <h2 class="nom">Direction : <?= $article->getName() ?></h2>
        <img src="<?= $article->getImg() ?>" alt="<?= $article->getName() ?>">
        <p class="price">Pour seulement : <?= $article->getPrice() ?>
            <span class="price_text">(Transport compris)</span></p>
        <p class="price">Il reste encore : <?= $article->getStock() ?> place(s)</p>
        <p class="description"><?= $article->getDescription() ?></p>
        <p class="price_text">Poids du bagage strictement inférieur à <?= $article->getWeight() ?></p>
        <input type="hidden" name="cacher" value="1">
        <input type="checkbox" name="article[]" value="<?= $article->getId() ?>">
    </div>
    <?php
}

function displayCatalogue($bdd)
{
    $cata_test = new Catalogue($bdd);
    return $cata_test->getCat();
}

function displayUser($user)
{
    ?>
    <div class="card " style="width: 18rem;">
        <div class="card-header">
            Client
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Client : <?= $user->getName() ?></li>
            <li class="list-group-item">Email : <?= $user->getEmail() ?></li>
            <li class="list-group-item">Adresse : <?= $user->getAdress() ?></li>
            <li class="list-group-item">Code Postal : <?= $user->getPostalCode() ?></li>
            <li class="list-group-item">Ville : <?= $user->getCity() ?></li>
        </ul>
    </div>
    <?php
}

function displayLsUsers($bdd)
{
    $ls_users = new ListeClient($bdd);
    return $ls_users->getLs_users();
}

function totalPanier($priceT, $somme)
{
    $somme += $priceT;
    return $somme;
}