<?php
$cats = [
    ["Chiang Mai","img/chiang_mai.jpg",1500],
    ["Bangkok","img/bangkok.jpg",1200],
    ["Lampang","img/lampang.jpg",1800]
];
// La fonctions qui m'affiche les données dynamiquement
function afficheArticle($cats)
{
    foreach ($cats as $cat) {
        echo ('
        <div class="cadre article">
        <h2 class="nom">Adresse ' .$cat[0] . '</h2>
        <img src=" ' . $cat[1] . ' " alt="Photo de '. $cat[0].' ">
         <p class="price">Pour seulement : ' . $cat[2].' € <span class="price_text">(Transport compris)</span></p>
        </div>');
    }
}
// Les fonctions qui affiche le nom le prix et l'image une à une!
function afficheArticle1()
{
    $name = "Chiang-Mai";
    $price = 1500;
    $image = "img/chiang_mai.jpg";
    return $name ." ". $price . " ". $image;
}

function afficheArticle2()
{
    $name = "Bangkok";
    $price = 1200;
    $image = "img/bangkok.jpg";
    return $name . $price . $image;
}

function afficheArticle3()
{
    $name = "Lampang";
    $price = 1800;
    $image = "img/Lampang.jpg";
    return $name . $price . $image;
}

