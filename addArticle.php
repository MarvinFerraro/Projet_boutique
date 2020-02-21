<?php
include("include/head.php");
$messageLoc = '';
$messagePrice = '';
$messagePict = '';
$error = false;
if (!empty($_POST)) {
    $yourPrice = $_POST['yourPrice'];
    $yourLocation = $_POST['yourLocation'];

    if (empty($yourLocation)) {
        $messageLoc = 'Veuilliez remplir le champ';
        $error = true;

    } elseif (empty($yourPrice)) {
        $error = true;
        $messagePrice = 'Veuilliez remplir le champ';

    } elseif ($yourPrice < 0) {
        $error = true;
        $messagePrice = 'Le prix doit être superieur à 0 ! (On déconne pas quand même)';
    } elseif (!is_numeric($yourPrice)) {
        $error = true;
        $messagePrice = 'On ta dit un prix sans virgule...';
    }
}
if (!empty($_FILES)) {
    $yourFiles= $_FILES['yourPict'];
    if (isset($_FILES['yourPict']) AND $_FILES['yourPict']['error'] == 0) {
        if ($_FILES['yourPict']['size'] <= 1000000) {

            $infosfichier = pathinfo($_FILES['yourPict']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                move_uploaded_file($_FILES['yourPict']['tmp_name'], 'img/imgtmp/' . basename($_FILES['yourPict']['name']));

            }
        }
    } else {
        $error = true;
        $messagePict = 'Photo non valide';
    }
}

if (($error == false) AND (!empty($_POST))) {?>

    <div class="cadre article">
        <h2 class="nom"> Adresse <?= $_POST['yourLocation'] ?></h2>
        <img src="img/imgtmp/<?= basename($_FILES['yourPict']['name']) ?>" alt="Photo de <?= $_POST['yourLocation'] ?>">
        <p class="price"> Pour seulement : <?= $_POST['yourPrice'] ?> €
            <span class="price_text">(Transport compris)</span>
        </p>
    </div>
<?php } else { ?>

    <form method="POST" action="addArticle.php" enctype="multipart/form-data">

        <div class="boiteForm">
            <label class="locationFrom" for="yourLocation">Ta destination</label>
            <input type="text" id="yourLocation" name="yourLocation" placeholder="Destination" value=""/>
            <?php if (!empty($messageLoc)) : ?>
                <p class="errorForm"><?php echo $messageLoc; ?></p>
            <?php endif; ?>
        </div>

        <div class="boiteForm">
            <label class="pictForm" for="YourPict">Ton image</label>
            <input type="file" id="YourPict" name="yourPict" />
            <?php if (!empty($messagePict)) : ?>
                <p class="errorForm"><?php echo $messagePict; ?></p>
            <?php endif; ?>
        </div>

        <div class="boiteForm">
            <label class="priceFrom" for="yourPrice">Le prix</label>
            <input type="text" id="yourPrice" name="yourPrice" placeholder="Prix" value=""/>
            <?php if (!empty($messagePrice)) : ?>
                <p class="errorForm"><?php echo $messagePrice; ?></p>
            <?php endif; ?>
        </div>
        <input type="submit" value="Envoyer ! ">
    </form>
    <?php
}; ?>

<?php
include("include/footer.php")
?>

