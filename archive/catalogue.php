<!--Init variables -->
<?php
$name = ["Chiang Mai","Bangkok","Lampang"];
$price = [1500,1200,1800];
$image_url = ["img/chiang_mai.jpg","img/bangkok.jpg","img/lampang.jpg"];

?>

<?php include("include/head.php") ?>
<!--Créations de ma boucle for pour tout mes divs de contenu-->
<?php
for($i=0 ; $i< count($name); $i++) {?>
    <div class="cadre article">
        <h2 class="nom"> Adresse <?php echo $name[$i]?></h2>
        <img src="<?php echo $image_url[$i]?>" alt="Photo de <?php echo $image_url[$i]?>">
        <p class="price"> Pour seulement : <?php echo $price[$i]?> € <span class="price_text">(Transport compris)</span> </p>
    </div>
    <!--fin du for-->
<?php };?>

<?php include("include/footer.php") ?>