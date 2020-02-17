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

function afficheArticlePanier($name, $img, $price, $value){
    ?>
    <div class="cadre article">
        <h2 class="nom">Adresse <?= $name ?></h2>
        <img src='<?= $img ?>' alt="Photo de '<?= $name ?> ">
        <p class="price">Pour seulement : <?= $price ?> € <span class="price_text">(Transport compris)</span>
        </p>
        <p class="info">Cocher pour supprimer un article</p>
        <input class="checkBox" type="checkbox" name="removeArticle[]" value="<?= $value ?>" id="">
    </div>
<?php
}


function totalPanier($priceT, $somme){
    $somme += $priceT;
    return $somme;
}