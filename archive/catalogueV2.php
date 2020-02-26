<?php
// Init array multy
$cat = [
   ["Chiang Mai","img/chiang_mai.jpg",1500],
   ["Bangkok","img/bangkok.jpg",1200],
   ["Lampang","img/lampang.jpg",1800]
    ];

?>

<?php include("include/preset/head.php") ?>
<!--Double for pour parcourir le tableau; le i parcours les indices $cat et le j parcours les valeurs de $cat-->
<?php

for ($i = 0; $i < count($cat); $i++) { ?>
    <div class="cadre article">
        <h2 class="nom">Adresse <?= $cat[$i][0]; ?></h2>
        <img src="<?= $cat[$i][1]; ?>" alt="Photo de <?= $cat[$i][0]; ?>">
        <p class="price">Pour seulement : <?= $cat[$i][2]; ?> € <span class="price_text">(Transport compris)</span></p>
    </div>
    <?php
};
?>

<?php include("include/preset/footer.php") ?>