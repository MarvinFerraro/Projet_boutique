<?php
$cats = [
    ["Chiang Mai","img/chiang_mai.jpg",1500],
    ["Bangkok","img/bangkok.jpg",1200],
    ["Lampang","img/lampang.jpg",1800]
];

// La fonctions qui m'affiche les données dynamiquement
function afficheArticle($cats)
{
    $i=0;
    foreach ($cats as $cat) {
         $i++;
        echo ('
        <div class="cadre article">
        <h2 class="nom">Adresse ' .$cat[0] . '</h2>
        <img src=" ' . $cat[1] . ' " alt="Photo de '. $cat[0].' ">
         <p class="price">Pour seulement : ' . $cat[2].' € <span class="price_text">(Transport compris)</span></p>
         <input type="checkbox" name="article[]" value ="article '.$i .'" id="">
        </div>
        ');
    }
}

