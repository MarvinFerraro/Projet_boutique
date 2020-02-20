<?php
session_start();
require 'include/functionsSQL.php';
include('include/head.php');
$somme = 0;
//todo
// Traitement php du session / de l'ajout d'une quantité / de la suppression d'article...


//Si le post n'est pas vide.
//    il stock les valeurs d'article dans la session Panier

if (empty($_SESSION['panier'])) {
    ?>
    <div class="emptyPanier">
        <p class="price">Votre panier est vide</p>
        <p class="returnCat">Aller au <a href="catalogueSQL.php">Catalogue</a></p>
    </div>
    <?php
}


//Si le panier en session n'est pas vide et si la modif
if (!empty($_SESSION['panier']) AND empty($_POST['remove_article'])) {
    ?>
    <form action="panierSQL.php" method="post">
        <?php
        foreach ($_SESSION['panier'] as $id_chose) {
            $select_article = select_article_panier($bdd, $id_chose);
            while ($d_article_chose = $select_article->fetch()) {
                ?>
                <div class="cadre article">
                    <h2 class="nom">Direction : <?= $d_article_chose['name'] ?></h2>
                    <img src="<?= $d_article_chose['image'] ?>" alt="<?= $d_article_chose['name'] ?>">
                    <p class="price">Pour seulement : <?= $d_article_chose['price'] ?>
                        <span class="price_text">(Transport compris)</span></p>
                    <p class="price">Il reste encore : <?= $d_article_chose['stock'] ?> place(s)</p>
                    <p class="description"><?= $d_article_chose['description'] ?></p>
                    <p class="price_text">Poids du bagage strictement inférieur à <?= $d_article_chose['weight'] ?></p>
                    <p>Cocher pour supprimer l'aticle<input type="checkbox" name="remove_article[]"
                                                            value="<?= $d_article_chose['id'] ?>"></p>
                </div>
                <?php
                $somme = $d_article_chose['price'] + $somme;

            }
        }
        ?>
        <input type="submit" value="Modifier panier">
    </form>
    <form action="order_validate.php" method="post">

        <input type="submit" value="Valider la commande">
    </form>
    <p class="priceSomme"> Le total du panier est de <?= $somme ?> euros</p>
    <?php


    //Sinon si le panier en session est pas vide et la valeur de la modif non plus
} elseif (isset($_POST['remove_article'])) {
    if (!empty($_POST['remove_article']) AND (count($_POST['remove_article']) >= 1)) {
        ?>
        <form action="panierSQL.php" method="post">
        <?php
        if (count($_SESSION['panier']) > 1) {
            foreach ($_SESSION['panier'] as $id) {
                if (!in_array($id, $_POST['remove_article'])) {
                    $select_article = select_article_panier($bdd, $id);
                    while ($d_article_chose = $select_article->fetch()) {
                        ?>
                        <div class="cadre article">
                            <h2 class="nom">Direction : <?= $d_article_chose['name'] ?></h2>
                            <img src="<?= $d_article_chose['image'] ?>" alt="<?= $d_article_chose['name'] ?>">
                            <p class="price">Pour seulement : <?= $d_article_chose['price'] ?>
                                <span class="price_text">(Transport compris)</span></p>
                            <p class="price">Il reste encore : <?= $d_article_chose['stock'] ?> place(s)</p>
                            <p class="description"><?= $d_article_chose['description'] ?></p>
                            <p class="price_text">Poids du bagage strictement inférieur
                                à <?= $d_article_chose['weight'] ?></p>
                            <input type="checkbox" name="remove_article[]" value="<?= $d_article_chose['id'] ?>">
                        </div>
                        <?php
                        $somme = $d_article_chose['price'] + $somme;
                    }
                }
            }
            ?>
            <input type="submit" value="Modifier panier">
            </form>
            <form action="order_validate.php" method="post">
                <input type="submit" value="Valider la commande">
            </form>
            <p class="priceSomme"> Le total du panier est de <?= $somme ?> euros</p>
            <?php
        }
        $_SESSION['panier'] = array_diff($_SESSION['panier'], $_POST['remove_article']);
    }
    if (empty($_SESSION['panier']) AND (count($_POST['remove_article']) >= 1)) {
        ?>
        <div class="emptyPanier">
            <p class="price">Votre panier est vide</p>
            <p class="returnCat">Aller au <a href="catalogueSQL.php">Catalogue</a></p>
        </div>
        <?php
    }
}
?>
<?php
include('include/footer.php');