<?php
session_start();
require 'include/functionsSQL.php';
include('include/head.php');
$somme = 0;

// Traitement php du session / de l'ajout d'une quantité / de la suppression d'article...

//Si le post n'est pas vide.
if (!empty($_POST['article'])) {
//    il stock les valeurs d'article dans la session Panier
    $_SESSION['panier'] = $_POST['article'];
}
if (!empty($_POST['quantity'])) {
    $_SESSION['quantity'] = $_POST['quantity'];
}else{
    $_SESSION['quantity'] = 1;
}


//Si le panier en session n'est pas vide et si la modif
if (!empty($_SESSION['panier']) AND empty($_POST['remove_article'])) {
    ?>
    <form action="panierSQL.php" method="post">
        <?php
        foreach ($_SESSION['panier'] as $id_chose) {
            $select_article = select_article($bdd, $id_chose);
            while ($d_article_chose = $select_article->fetch()){
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
                    <input class="b_quantity" type="number" min="0" max="20" name="quantity[<?=$d_article_chose['id']?>]">
                </div>
                <?php
            }
            $prix = $bdd->query("SELECT articles.price FROM articles WHERE articles.id = '$id_chose ' ");
            while($d_prix = $prix->fetch())
            {
                    var_dump($d_prix['price']);
                    if (!empty($_SESSION['quantity'])) {
                        $price_total = $_SESSION['quantity'] * $d_prix['price'] ;
                        ?>
                        <p class="nb_quantity">Quantité voulu : <?= $_SESSION['quantity'] ?> <br/>
                            Pour un total de : <?= $price_total ?></p>
                        <?php
                    } else {
                        $price_total = $d_prix;
                        ?>
                        <p class="nb_quantity">Quantité voulu : 1 <br/>
                            Pour un total de : <?= $price_total ?></p>
                        <?php
                }
                $somme = $price_total + $somme;
            }
        }
        ?>
        <input type="submit" value="Modifier panier">
    </form>
    <p class="priceSomme"> Le total du panier est de <?= $somme ?> euros</p>
    <?php


    //Sinon si le panier en session est pas vide et la valeur de la modif non plus
} elseif ((!empty($_POST['remove_article']) AND !empty($_SESSION['panier'])) OR (count($_POST['remove_article']) == 1) AND count($_SESSION['panier']) == 1) {
    ?>
    <form action="panierSQL.php" method="post">
    <?php
    if (count($_SESSION['panier']) > 1) {
        foreach ($_SESSION['panier'] as $id) {
            if (!in_array($id, $_POST['remove_article'])) {
                $select_article = select_article($bdd, $id);
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
                        <input class="b_quantity" type="number" min="0" max="20" name="quantity">
                    </div>
                    <?php
                    $somme = $d_article_chose['price'] + $somme;
                }
            }
        }
        ?>
        <input type="submit" value="Modifier panier">
        </form>
        <p class="priceSomme"> Le total du panier est de <?= $somme ?> euros</p>
        <?php
    }
    $_SESSION['panier'] = array_diff($_SESSION['panier'], $_POST['remove_article']);
}

if (empty($_SESSION['panier'])) {

    ?>
    <div class="emptyPanier">
        <p class="price">Votre panier est vide</p>
        <p class="returnCat">Aller au <a href="catalogueSQL.php">Catalogue</a></p>
    </div>
    <?php
}
?>
<?php
include('include/footer.php');