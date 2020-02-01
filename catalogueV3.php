<?php
// Init array multy
require 'include/functions.php';
 include("include/head.php") ?>
<!---->
<!--<form action="panier.php" method="post">-->
<!--    --><?php
//    afficheArticle($cats);
//    ?>
<!--    <input type="submit" value="Envoyer">-->
<!--</form>-->
<?php
    $cats = listCats();
    $i=0;
    ?>

    <form action="panier.php" method="post">
        <?php

        foreach ($cats as $cat => $value) { ?>
            <div class="cadre article">
                <h2 class="nom">Adresse <?= $value[0]?></h2>
                <img src='<?=$value[1]?>' alt="Photo de '<?=$value[0]?>'' ">
                <p class="price">Pour seulement : <?=$value[2]?> € <span class="price_text">(Transport compris)</span></p>
                <input type="checkbox" name="article[]" value ="<?=$i?>" id="">
            </div>
            <?php
            $i++;
        }
        ?>
        <input type="submit" value="Envoyer">
    </form>
<?php include("include/footer.php") ?>