<?php
include ("include/head.php")
?>

<form method="post" action="displayArticle.php" enctype="multipart/form-data">

    <div class="boiteForm">
        <label class="locationFrom" for="yourLocation">Ta destination</label>
        <input type="text" id="yourLocation" name="yourLocation" placeholder="Destination"/>
    </div>

    <div class="boiteForm">
        <label class="pictForm" for="YourPict">Ton image</label>
        <input type="file" id="YourPict" name="yourPict"/>
    </div>

    <div class="boiteForm">
        <label class="priceFrom" for="yourPrice">Le prix</label>
        <input type="text" id="yourPrice" name="yourPrice" placeholder="Prix"/>
    </div>
    <input type="submit" value="Envoyer ! ">
</form>

<?php
include ("include/footer.php")
?>

