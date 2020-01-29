<!--Init variables-->
<?php
$name= "Chiang Mai";
$price = 1500;
$image = "img/chiang_mai.jpg"


?>
<?php include("include/head.php") ?>
<!-- on remplace le nom, la source de l'image et le prix par les variables php. -->
    <div class="cadre article">
        <h2 class="nom"> Adresse <?php echo $name?></h2>
        <img src="<?php echo $image?>" alt="Photo de <?php echo $image?>">
        <p class="price"> Pour seulement : <?php echo $price?> € <span class="price_text">(Transport compris)</span> </p>
    </div>
<?php include("include/footer.php") ?>