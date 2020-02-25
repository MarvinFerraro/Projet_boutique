<?php
session_start();
require 'include/functionsSQL.php';
include("include/head.php");

if (isset($_POST['users_info']) AND !empty($_POST['users_info'])) {
    $_SESSION['user_info'] = $_POST['users_info'];
    if (!empty($_SESSION['user_info'])) {
        $user_info = $_SESSION['user_info'];
        add_user($bdd, $user_info);
    }
}

if (isset($_POST['user_delete']) AND !empty($_POST['user_delete'])) {
    $_SESSION['user_delete'] = $_POST['user_delete'];
    if (!empty($_SESSION['user_delete'])) {
        $user_delete = $_SESSION['user_delete'];
        delete_user($bdd, $user_delete);
    }
}

?>
<form method="POST" action="add_users.php"">

<div class="boiteForm">
    <label class="locationFrom" for="name_user">Prenom NOM</label>
    <input type="text" id="name_user" name="users_info[]" placeholder="Prenom Nom" value=""/>
    <?php if (!empty($messageLoc)) : ?>
        <p class="errorForm"><?php echo $messageLoc; ?></p>
    <?php endif; ?>
</div>

<div class="boiteForm">
    <label class="pictForm" for="user_email">Ton email</label>
    <input type="email" id="user_email" name="users_info[]" placeholder="Ton email"/>
    <?php if (!empty($messagePict)) : ?>
        <p class="errorForm"><?php echo $messagePict; ?></p>
    <?php endif; ?>
</div>

<div class="boiteForm">
    <label class="priceFrom" for="adress">Votre adresse</label>
    <input type="text" id="adress" name="users_info[]" placeholder="Votre adresse" value=""/>
    <?php if (!empty($messagePrice)) : ?>
        <p class="errorForm"><?php echo $messagePrice; ?></p>
    <?php endif; ?>
</div>

<div class="boiteForm">
    <label class="priceFrom" for="postal_code">Code postal</label>
    <input type="text" id="postal_code" name="users_info[]" placeholder="Code postal" value=""/>
    <?php if (!empty($messagePrice)) : ?>
        <p class="errorForm"><?php echo $messagePrice; ?></p>
    <?php endif; ?>
</div>
<div class="boiteForm">
    <label class="priceFrom" for="city">Votre ville</label>
    <input type="text" id="city" name="users_info[]" placeholder="Votre ville" value=""/>
    <?php if (!empty($messagePrice)) : ?>
        <p class="errorForm"><?php echo $messagePrice; ?></p>
    <?php endif; ?>
</div>

<input type="submit" value="Envoyer ! ">
</form>

<form method="POST" action="add_users.php"">
<hr>
<div class="boiteForm">
    <label class="priceFrom" for="user_delete">Suppression</label>
    <input type="text" id="user_delete" name="user_delete" placeholder="Prenom du User" value=""/>
    <?php if (!empty($messagePrice)) : ?>
        <p class="errorForm"><?php echo $messagePrice; ?></p>
    <?php endif; ?>
</div>
<input type="submit" value="Supprimer ">
</form>
<?php
include("include/footer.php")
?>

