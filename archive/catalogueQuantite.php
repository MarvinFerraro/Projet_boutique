<?php
// Init array multy
require 'include/functionQuantite.php';
include("include/preset/head.php") ?>

<?php
    $cats = listCats();
    
    ?>
    <form action="../panierQuantite.php" method="post">
        <?php
        catArticle($cats);
        ?>
        <input type="submit" value="Envoyer">
    </form>
<?php include("include/preset/footer.php") ?>