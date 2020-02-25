<?php
session_start();
require 'include/functionsSQL.php';
require 'include/class.php';
require 'include/functions.php';
include("include/head.php");


$list_users = displayLsUsers($bdd);
?>
    <div class=" boite_User">
        <?php
        foreach ($list_users as $users) {
            displayUser($users);
        }
        ?>
    </div>
<?php

include("include/footer.php");