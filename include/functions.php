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

function displayArticle(Article $article)
{
    ?>

    <div class="card col-4 cadre">
        <img class="card-img-top" src="<?= $article->getImg() ?>" alt="<?= $article->getName() ?>">
        <h2 class="nom card-title">Direction : <?= $article->getName() ?></h2>
        <p class="price">Pour seulement : <?= $article->getPrice() ?>
            <span class="price_text">(Transport compris)</span></p>
        <p class="price">Il reste encore : <?= $article->getStock() ?> place(s)</p>
        <p class="description"><?= $article->getDescription() ?></p>
        <p class="price_text">Poids du bagage strictement inférieur à <?= $article->getWeight() ?></p>
        <?php
        if (is_a($article, 'Shoes')) {
            echo(' <p class="price">Nous vous conseillons une paire de : <br/>' . $article->getStyleShoe() . '.</p>');
        } elseif (method_exists($article, 'getStyleCloth')) {
            echo(' <p class="price">Nous vous conseillons : <br/>' . $article->getStyleCloth() . '.</p>');
        }
        ?>
        <input type="hidden" name="cacher" value="1">
        <p class="price"><input type="checkbox" name="article[]" value="<?= $article->getId() ?>"></p>
    </div>
    <?php
}

function displayCatalogue(Catalogue $catalogue)
{
    foreach ($catalogue->getCat() as $article) {
        displayArticle($article);
    }
}

function displayUser(CLient $user)
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

function displayLsUsers(ListeClient $listeClient)
{
    foreach ($listeClient->getLs_users() as $ls_user) {
        displayUser($ls_user);
    }
}

function totalPanier($priceT, $somme)
{
    $somme += $priceT;
    return $somme;
}