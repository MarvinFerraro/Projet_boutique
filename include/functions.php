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

function displayArticle($article){
    ?>
    <div class="cadre article">
        <h2 class="nom">Direction : <?=$article->getName() ?></h2>
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
function displayCatalogue($bdd) {
    $cata_test = new Catalogue($bdd);
     return $cata_test->getCat();
}


function totalPanier($priceT, $somme){
    $somme += $priceT;
    return $somme;
}