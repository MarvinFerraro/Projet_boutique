
<?php include("include/head.php") ?>
<!-- on remplace le nom, la source de l'image et le prix par les variables php. -->
<div class="cadre article">
    <h2 class="nom"> Adresse <?= $_POST['yourLocation'] ?></h2>
    <img src="img/imgtmp/<?= basename($_FILES['yourPict']['name']) ?>" alt="Photo de <?=  $_POST['yourLocation']?>">
    <p class="price"> Pour seulement : <?=  $_POST['yourPrice']?> € <span class="price_text">(Transport compris)</span> </p>
</div>
<?php include("include/footer.php") ?>

