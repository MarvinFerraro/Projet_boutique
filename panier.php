<?php
require 'include/functions.php';
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
//
//foreach ($_POST['article'] as $key => $item){
//    $item = $cats[$key];
//    var_dump($item);
//    afficheArticle([$item]);
//}
$cats = listCats();
$catsNew = [];
if (!empty($_POST['article'])) {
    $selected_cats = $_POST['article'];
    $somme = 0;
    ?>
    <form action="panier.php" method="post">
        <?php
        foreach ($selected_cats as $article) {
            ?>
            <div class="cadre article">
                <h2 class="nom">Adresse <?= $cats[$article][0] ?></h2>
                <img src='<?= $cats[$article][1] ?>' alt="Photo de '<?= $cats[$article][0] ?> ">
                <p class="price">Pour seulement : <?= $cats[$article][2] ?> € <span class="price_text">(Transport compris)</span>
                </p>
                <input type="checkbox" name="removeArticle[]" value="<?= $article ?>" id="">
            </div>
            <?php
            $somme += $cats[$article][2];
        }
        var_dump($catsNew);
        ?>
        <input type="submit" value="Modifié panier">
    </form>
    <p> La somme est de <?= $somme ?></p>
    <?php
} elseif (!empty($_POST['removeArticle'])) {
    $removeCats = $_POST['removeArticle'];
    foreach ($cats as $cat => $value) {
        if (!in_array($cats, $removeCats)) {
            ?>
            <div class="cadre article">
                <h2 class="nom">Adresse <?= $value[0] ?></h2>
                <img src='<?= $value[1] ?>' alt="Photo de '<?= $value[0] ?>'' ">
                <p class="price">Pour seulement : <?= $value[2] ?> € <span class="price_text">(Transport compris)</span>
                </p>
            </div>
            <?php
        }
    }
} else {
    ?>
    <p class="price">Rempli moi ce panier tocard</p>
    <?php
}
?>
<?php
include ('include/footer.php');