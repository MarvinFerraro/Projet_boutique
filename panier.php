<?php
include ('include/functions.php');
include ('include/head.php');


//$panier =[];
//$somme = 0;
//foreach ($_POST['article'] as $key => $item){
//    $item = $cats[$key];
//    array_push($panier,$item);
//    $somme = $item[2] + $item[2];
//}
//afficheArticle($panier);
//var_dump($panier);
//?>
<!--<p class="pricePanier"> La somme totale est de : --><?//= $somme?><!--</p>-->
<!---->
<?php




foreach ($_POST['article'] as $key => $item){
    $item = $cats[$key];
    var_dump($item);
    afficheArticle([$item]);
}

include ('include/footer.php');