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

function displayArticle(Article $article, $isPagePanier = false)
{
    ?>
    <div class="card col-4 cadre">
        <img class="card-img-top" src="<?= $article->getImg() ?>" alt="<?= $article->getName() ?>">
        <h2 class="nom card-title">Direction : <?= $article->getName() ?></h2>
        <p class="price">Pour seulement : <?= $article->getPrice() ?>
            <span class="price_text">(Transport compris)</span></p>
        <p class="price">Il reste encore : <?= $article->getStock() ?> place(s)</p>
        <p class="description"><?= $article->getDescription() ?></p>
        <p class="price_text">Poids du bagage strictement inférieur à <?= $article->getWeight() ?></p>
        <?php
        if (is_a($article, 'Shoes')) {
            echo(' <p class="price">Nous vous conseillons une paire de : <br/>' . $article->getStyleShoe() . '.</p>');
        } elseif (method_exists($article, 'getStyleCloth')) {
            echo(' <p class="price">Nous vous conseillons : <br/>' . $article->getStyleCloth() . '.</p>');
        }
        ?>
        <input type="hidden" name="cacher" value="1">
        <p class="price"><input type="<?= $isPagePanier ? 'hidden' : 'checkbox' ?>" name="<?= $isPagePanier ? 'removeArticle[]' : 'article[]' ?>"
                                value="<?= $article->getId() ?>"></p>
        <?php
        if ($isPagePanier) {
            ?>
            <input class="b_quantity" type="number" min="0" max="20" name="quantity[<?= $article->getId() ?>]"
                   value="<?= $_SESSION['quantity'][$article->getId()] ?>">

            <input type="submit" name="delete_<?=$article->getId() ?>" value="Suppr MOi">
            <?php
        }
        ?>
    </div>
    <?php
}

function displayPanier(Basket $panier, $bdd)
{
    foreach ($panier->getPanier() as $articles_id => $value) {
        foreach (makeArticle(getAll_article_byIds($bdd, $articles_id)) as $objectArticle) {
            displayArticle($objectArticle, true);
        }
    }
//    foreach ($panier->getPanier() as $articles_id => $value) {
//        $list_article_byIDs = getAll_article_byIds($bdd, $articles_id);
//        $list_article = makeArticle($list_article_byIDs);
//        foreach ($list_article as $objectArticle) {
//            displayArticle($objectArticle, true);
//        }
//    }
}


function displayCatalogue(Catalogue $catalogue)
{
    foreach ($catalogue->getCat() as $article) {
        displayArticle($article, false);
    }
}

function makeArticle($all_articles)
{
    $cat = [];
    foreach ($all_articles as $article_inf) {

        if ($article_inf['style_cloth'] != NULL) {

            $article = new Cloth($article_inf['id'], $article_inf['name'], $article_inf['description'], $article_inf['price'],
                $article_inf['image'], $article_inf['weight'], $article_inf['stock'], $article_inf['for_sale'],
                $article_inf['Categories_id'], $article_inf['style_cloth']);
            $cat[] = $article;

        } elseif ($article_inf['style_shoe'] != NULL) {
            $article = new Shoes($article_inf['id'], $article_inf['name'], $article_inf['description'], $article_inf['price'],
                $article_inf['image'], $article_inf['weight'], $article_inf['stock'], $article_inf['for_sale'],
                $article_inf['Categories_id'], $article_inf['style_shoe']);
            $cat[] = $article;
        } else {
            $article = new Article($article_inf['id'], $article_inf['name'], $article_inf['description'], $article_inf['price'],
                $article_inf['image'], $article_inf['weight'], $article_inf['stock'], $article_inf['for_sale'],
                $article_inf['Categories_id']);
            $cat[] = $article;
        }
    }
    return $cat;
}

function displayUser(CLient $user)
{
    ?>
    <div class="card " style="width: 18rem;">
        <div class="card-header">
            Client
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Client : <?= $user->getName() ?></li>
            <li class="list-group-item">Email : <?= $user->getEmail() ?></li>
            <li class="list-group-item">Adresse : <?= $user->getAdress() ?></li>
            <li class="list-group-item">Code Postal : <?= $user->getPostalCode() ?></li>
            <li class="list-group-item">Ville : <?= $user->getCity() ?></li>
        </ul>
    </div>
    <?php
}

function displayLsUsers(ListeClient $listeClient)
{
    foreach ($listeClient->getLs_users() as $ls_user) {
        displayUser($ls_user);
    }
}


function totalPanier($bdd, $id, $quantity)
{
    $price_article = getPrice_article_byIds($bdd, $id);
    $somme = $price_article[0]['price'] * $quantity;
    return $somme;

}