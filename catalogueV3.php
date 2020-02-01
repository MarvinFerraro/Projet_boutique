<?php
// Init array multy
include("include/functions.php");
 include("include/head.php") ?>

<form action="panier.php" method="post">
    <?php
    afficheArticle($cats);
    ?>
    <input type="submit" value="Envoyer">
</form>
<?php include("include/footer.php") ?>