<?php
session_start();
require 'include/functions.php';
require 'include/functionsSQL.php';
include("include/head.php");
$articles = list_articles($bdd);
//todo
// Traitement php du post dans session avec message
?>
    <form action="panierSQL.php" method="post">
        <?php
        while ($d_article = $articles->fetch()) {
            ?>
            <div class="cadre article">
                <h2 class="nom">Direction : <?= $d_article['name'] ?></h2>
                <img src="<?= $d_article['image'] ?>" alt="<?= $d_article['name'] ?>">
                <p class="price">Pour seulement : <?= $d_article['price'] ?>
                    <span class="price_text">(Transport compris)</span></p>
                <p class="price">Il reste encore : <?= $d_article['stock'] ?> place(s)</p>
                <p class="description"><?= $d_article['description'] ?></p>
                <p class="price_text">Poids du bagage strictement inférieur à <?= $d_article['weight'] ?></p>
                <input type="checkbox" name="article[]" value="<?=$d_article['id'] ?>">
            </div>
            <?php
        }?>
    <input class="input_float" type="submit" value="Envoyer">
    </form>

<?php include("include/footer.php") ?>