<?php
//$cats = [
//    ["Chiang Mai","img/chiang_mai.jpg",1500],
//    ["Bangkok","img/bangkok.jpg",1200],
//    ["Lampang","img/lampang.jpg",1800]
//];
//
//// La fonctions qui m'affiche les données dynamiquement
//function afficheArticle($cats)
//{
//    $i=0;
//    foreach ($cats as $cat) {
//         $i++;
//        echo ('
//        <div class="cadre article">
//        <h2 class="nom">Adresse ' .$cat[0] . '</h2>
//        <img src=" ' . $cat[1] . ' " alt="Photo de '. $cat[0].' ">
//         <p class="price">Pour seulement : ' . $cat[2].' € <span class="price_text">(Transport compris)</span></p>
//         <input type="checkbox" name="article[]" value ="article '.$i .'" id="">
//        </div>
//        ');
//    }
//}


function listCats()
{

    $cats = [
        ["Chiang Mai", "img/chiang_mai.jpg", 1500,1],
        ["Bangkok", "img/bangkok.jpg", 1200,1],
        ["Lampang", "img/lampang.jpg", 1800,1]
    ];

    return $cats;
}





function afficheArticlePanier($name, $img, $price, $value, $quantitySelect)
{
    ?>
    <div class="cadre article">
        <h2 class="nom">Adresse <?= $name ?></h2>
        <img src='<?= $img ?>' alt="Photo de '<?= $name ?> ">
        <p class="price">Pour seulement : <?= $price ?> € <span class="price_text">(Transport compris)</span>
        </p>
        <input type="number" name="quantityT" value="<?= $value ?>">
        <p class="price">La quantité est de : <?= $quantitySelect ?></p>
        <?php
        $sommeQua = $price * $quantitySelect;
        ?>
        <p class="price">Pour une valeur de : <?= $sommeQua ?></p>
        <p class="info">Cocher pour supprimer un article</p>
        <input class="checkBox" type="checkbox" name="removeArticle[]" value="<?= $value ?>" id="">
    </div>
    <?php
}

function catArticle($cats)
{
    $i = 0;
    foreach ($cats as $cat => $value) { ?>
        <div class="cadre article">
            <h2 class="nom">Adresse <?= $value[0] ?></h2>
            <img src='<?= $value[1] ?>' alt="Photo de '<?= $value[0] ?>'' ">
            <p class="price">Pour seulement : <?= $value[2] ?> € <span class="price_text">(Transport compris)</span></p>
            <input type="number" name="quantityT[]" value="<?= $value[3]?>">
            <?php
            $sommeQuantite = $value[2] * $value[3]?>
            <p class="price">La quantité est de : <?= $value[3] ?></p>
            <p class="price">Pour une valeur de : <?= $sommeQuantite ?></p>
            <p class="info">Cocher pour supprimer un article</p>
            <input type="checkbox" name="article[]" value="<?= $i ?>" id="">
        </div>
        <?php
        $i++;
    }
}

function totalPanier($priceT, $somme)
{
    $somme += $priceT;
    return $somme;
}
