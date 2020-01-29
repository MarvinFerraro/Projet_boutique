<?php
if (isset($_FILES['yourPict']) AND $_FILES['yourPict']['error']==0){
    if ($_FILES['yourPict']['size'] <= 1000000){

        $infosfichier = pathinfo($_FILES['yourPict']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            move_uploaded_file($_FILES['yourPict']['tmp_name'], 'img/imgtmp/' . basename($_FILES['yourPict']['name']));
            echo "L'envoi a bien été effectué !";
        }
    }
}
$photoEnvoyer = $_FILES['yourPict']['name'];
?>

<p> Ta destination <?= $_POST['yourLocation'] ?></p>


<div> <img src="<?= 'img/imgtmp/'. $photoEnvoyer ?>"></div>
<p>Ton prix : <?= $_POST['yourPrice']?> </p>
