<?php
session_start();
require 'include/functionsSQL.php';
require 'include/functions.php';
require 'include/class/ListeClient.php';
include("include/preset/head.php");


?>
    <div class=" boite_User">
        <?php
        displayLsUsers(new ListeClient($bdd));
        ?>
    </div>
<?php

include("include/preset/footer.php");