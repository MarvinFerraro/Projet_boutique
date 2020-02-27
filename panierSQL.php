<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require 'include/functionsSQL.php';
require 'include/functions.php';
require 'include/class/Article.php';
require 'include/class/Basket.php';
include('include/preset/head.php');
//todo
// Traitement php du session / de l'ajout d'une quantité / de la suppression d'article...
$somme = 0;

if (!isset($_SESSION['quantity'])) {
    $_SESSION['quantity'] = [];
}

if (isset($_POST['quantity']) AND !empty($_POST['quantity'])) {
    $_SESSION['quantity'] = $_POST['quantity'];
}

foreach ($_SESSION['panier'] as $key => $article_id) {
    if (!isset($_SESSION['quantity'][$article_id])) {
        $_SESSION['quantity'][$article_id] = 1;
    }
}

if (!isset($_POST['remove_article']) AND empty($_SESSION['panier'])) {
    ?>
    <div class="emptyPanier">
        <p class="price">Votre panier est vide</p>
        <p class="returnCat">Aller au <a href="catalogueSQL.php">Catalogue</a></p>
    </div>
    <?php
}


$panierTest = new Basket();
$panierTest->addArticles($_SESSION['panier'],$_SESSION['quantity']);


?>
 <form action="panierSQL.php" method="post">
        <div class="row d-flex jutify-content-around">
            <?php
            displayPanier($panierTest, $bdd);
            ?>
        </div>
        <input class="input_float" type="submit" value="Envoyer">
    </form>
<?php

//Si le panier en session n'est pas vide et si la modif
if (!empty($_SESSION['panier']) AND empty($_POST['remove_article'])) {
    ?>
    <form action="panierSQL.php" method="post">
        <?php
        foreach ($_SESSION['panier'] as $id_chose) {
            $select_article = select_article_panier($bdd, $id_chose);
            foreach ($select_article as $key) {
                ?>
                <div class="cadre article">
                    <h2 class="nom">Direction : <?= $key['name'] ?></h2>
                    <img src="<?= $key['image'] ?>" alt="<?= $key['name'] ?>">
                    <p class="price">Pour seulement : <?= $key['price'] ?>
                        <span class="price_text">(Transport compris)</span></p>
                    <p class="price">Il reste encore : <?= $key['stock'] ?> place(s)</p>
                    <p class="description"><?= $key['description'] ?></p>
                    <p class="price_text">Poids du bagage strictement inférieur à <?= $key['weight'] ?></p>
                    <p>Cocher pour supprimer l'aticle<input type="checkbox" name="remove_article[]"
                                                            value="<?= $key['id'] ?>"></p>
                    <input class="b_quantity" type="number" min="0" max="20" name="quantity[<?= $key['id'] ?>]"
                           value="<?= $_SESSION['quantity'][$key['id']] ?>">
                </div>
                <?php
                $somme = ($key['price'] * intval($_SESSION['quantity'][$key['id']])) + $somme;
            }
        }
        $_SESSION['somme'] = $somme;
        ?>
        <input type="submit" value="Modifier panier">
    </form>
    <form action="order_validate.php" method="post">

        <input type="submit" value="Valider la commande">
    </form>
    <p class="priceSomme"> Le total du panier est de <?= $somme ?> euros</p>
    <?php


    //Sinon si le panier en session est pas vide et la valeur de la modif non plus
} elseif (!empty($_POST['remove_article']) AND (count($_POST['remove_article']) >= 1)) {
    ?>
    <form action="panierSQL.php" method="post">
    <?php
    if (count($_SESSION['panier']) > 1) {
        foreach ($_SESSION['panier'] as $id) {
            if (!in_array($id, $_POST['remove_article'])) {
                $select_article = select_article_panier($bdd, $id);
                foreach ($select_article as $key) {
                    ?>
                    <div class="cadre article">
                        <h2 class="nom">Direction : <?= $key['name'] ?></h2>
                        <img src="<?= $key['image'] ?>" alt="<?= $key['name'] ?>">
                        <p class="price">Pour seulement : <?= $key['price'] ?>
                            <span class="price_text">(Transport compris)</span></p>
                        <p class="price">Il reste encore : <?= $key['stock'] ?> place(s)</p>
                        <p class="description"><?= $key['description'] ?></p>
                        <p class="price_text">Poids du bagage strictement inférieur à <?= $key['weight'] ?></p>
                        <p>Cocher pour supprimer l'aticle<input type="checkbox" name="remove_article[]"
                                                                value="<?= $key['id'] ?>"></p>
                        <input class="b_quantity" type="number" min="0" max="20" name="quantity[<?= $key['id'] ?>]"
                               value="<?= $_SESSION['quantity'][$key['id']] ?>">
                        <p class="price_text"> Quantité choisi : </p>
                    </div>
                    <?php
                    $somme = ($key['price'] * intval($_SESSION['quantity'][$key['id']])) + $somme;
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
        $_SESSION['somme'] = $somme;
    }
    $_SESSION['panier'] = array_diff($_SESSION['panier'], $_POST['remove_article']);
    $new_quantities = [];

    foreach ($_SESSION['quantity'] as $key => $quantity) {
        if (in_array($key, $_SESSION['panier'])) {
            $new_quantities[$key] = $quantity;
        }
    }
    $_SESSION['quantity'] = $new_quantities;
}

?>
<?php
include('include/preset/footer.php');